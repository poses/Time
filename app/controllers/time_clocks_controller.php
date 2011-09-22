<?php
class TimeClocksController extends AppController {

	var $name = 'TimeClocks';
    var $autoRender = false;
    
    function beforeFilter() {
        parent::beforeFilter();
        if(in_array('Security', $this->components)){
            $this->Security->requireAuth();
        }
        
        if($this->Session->check('Auth.User')){
            $this->Auth->allow = array('*');
        }else{
            $this->Auth->allow = array();
        }
        
        $this->IpFilter->allow('127.0.0.1');
    }
    
	function index() {
	    $user_id = $this->Auth->user('id');
		$timeclock = $this->TimeClock->find('first', array(
		    'conditions' => array(
		        'TimeClock.user_id' => $user_id,
		        'TimeClock.out' => '0000-00-00 00:00:00',
		    ),
		    
		    'recursive' => -1
		));
		$timeclocks = $this->TimeClock->find('all', array(
		    'conditions' => array(
		        'TimeClock.user_id' => $user_id,
		        
		    ),
		    'order' => 'TimeClock.in ASC',
		    'contain' => array(
		        'ReasonCode',
		    ),
		));
	    $reasons = $this->TimeClock->ReasonCode->find('list', array(
		    'conditions' => array(
		        'ReasonCode.organization_id' => $this->currentOrganization['id'],
		        
		    ),
		));

		$this->set('reasons', $reasons);
		$this->set('timeclock', $timeclock);
		$this->set('timeclocks', $timeclocks);
		$this->render();
	}
	function manage_index() {
	    $user_id = $this->Auth->user('id');
		$timeclock = $this->TimeClock->find('first', array(
		    'conditions' => array(
		        'TimeClock.user_id' => $user_id,
		        'TimeClock.out' => '0000-00-00 00:00:00',
		    ),
		    
		    'recursive' => -1
		));
		$timeclocks = $this->TimeClock->find('all', array(
		    'conditions' => array(
		        'TimeClock.organization_id' => $this->currentOrganization['id'],
		        
		    ),
		    'order' => 'TimeClock.in ASC',
		    'recursive' => -1,
		));
		$this->set('timeclock', $timeclock);
		$this->set('timeclocks', $timeclocks);
		$this->render();
	}
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid TimeClock.', true), 'flash_failure');
			$this->redirect(array('action'=>'index'));
			exit();
		}
		$this->set('timeClock', $this->TimeClock->read(null, $id));
		$this->render();
	}
    function in() {
        if(in_array('Security', $this->components)){
            $this->Security->requirePost(__FUNCTION__);
        }
        $ClockedIn = $this->TimeClock->find('first', array(
            'conditions' => array(
                //Leave organiation_id unchecked so that a user can be logged in
                // to multiple organizations at once
                'TimeClock.user_id' => $this->Session->read('Auth.User.id'),
                'TimeClock.out' => '0000-00-00 00:00:00',
            )
        ));
        if(!empty($ClockedIn)){
            $this->Session->setFlash(__('You are already clocked in.', true), 'flash_info');
            $this->redirect('/time_clocks/index');
        }
        $UserAllowedLocation = ClassRegistry::init('UserAllowedLocation');
        $UserAllowedLocation->Behaviors->attach('Containable',array('autoFields' => false));
        $_allowed_ips = $UserAllowedLocation->find('all', array( //list didn't work properly with contain value
            'conditions' => array(
                'UserAllowedLocation.user_id' => $this->Auth->user('id'),
                
            ),
            'fields' => 'AllowedLocation.value',
            'contain' => array(
                'AllowedLocation' => array(
                    'conditions' => array(
                        'AllowedLocation.organization_id' => $this->currentOrganization['id'],
                    ),
                    'fields' => array(
                        'AllowedLocation.value',
                    ),
                ),
            )
        ));

        $allowed_ips = array();
        foreach($_allowed_ips as $index => $value){
            $allowed_ips[] = $value['AllowedLocation']['value'];
        }
        
        unset($_allowed_ips);
        $this->IpFilter->allow(array_values($allowed_ips));
        
        //only let user clock in from allowed locations
        if($this->IpFilter->check()){
            $TimeIn = array(
                'TimeClock' => array(
                    'user_id' => $this->Session->read('Auth.User.id'),
                    'organization_id' => $this->Session->read('Auth.User.organization_id'),
                    'in' => date(DATETIME_SQL),
                    
                )
            );
            $this->TimeClock->create();
            if($this->TimeClock->save($TimeIn)){
                $this->Session->setFlash(__('Clocked In',true), 'flash_success');
            }else{
                CakeLog::write('site_user_error', $this->TimeClock->validationErrors);
                $this->Session->setFlash(__('Unable to Clock In. Please try again.', true), 'flash_failure');
            }
            
            /*if(!empty($this->data)) {
                $this->data['TimeClock']['in'] = date(DATETIME);

                $this->TimeClock->create();
                if($this->TimeClock->save($this->data)) {
                    $this->Session->setFlash(__('Clocked In',true));
                    
                }else{
                    $this->Session->setFlash(__('Unable to Clock In. Please try again.', true));
                }
            }else{
                $this->Session->setFlash(__('No data supplied.',true));
            }*/
            $this->redirect(array('action' => 'index'));
        }else{
            $this->cakeError('cannotClockInFromIp');
        }
    }
    function out() {
        if(in_array('Security', $this->components)){
            $this->Security->requirePost(__FUNCTION__);
        }
        
        //let user clock out from any location in case they forgot to do it from allowed locations
        if(!empty($this->data)) {

            $reason_code = $this->data['TimeClock']['reason_code_id'];
            $timeclock = $this->TimeClock->find('first', array(
                'conditions' => array(
                    'TimeClock.user_id' => $this->Auth->user('id'),
                    'TimeClock.out' => '0000-00-00 00:00:00',
                ),
                'recursive' => -1
            ));
            $this->data = $timeclock;
            $this->data['TimeClock']['out'] = date('Y-m-d H:i:s');
            $this->data['TimeClock']['modified'] = date('Y-m-d H:i:s');
            $this->data['TimeClock']['reason_code_id'] = $reason_code;
            $reason = $this->TimeClock->ReasonCode->find('first', array(
                'conditions' => array(
                    'ReasonCode.id' => $reason_code,
                ),
                'fields' => 'ReasonCode.name',
                'recursive' => -1,
            ));

            if(!empty($reason)) {
                if($this->TimeClock->save($this->data)) {
                    $this->Session->setFlash(__('Clocked Out for ' . $reason['ReasonCode']['name'] ,true), 'flash_success');            
                }else{
                    $this->Session->setFlash(__('Unable to Clock Out. Please try again.', true), 'flash_failure');
                }
            }else{
                $this->Session->setFlash(__('No good reason for you to clock out, get back to work!', true), 'flash_warning');
            }
            
        }else{
            $this->Session->setFlash(__('No data sent. Please try again!', true), 'flash_failure');
        }
        $this->redirect(array('action' => 'index'));
        exit();
    }
	function manage_add() {
	    $this->Security->requirePost(__FUNCTION__);
		if (!empty($this->data)) {
			$this->TimeClock->create();
			if ($this->TimeClock->save($this->data)) {
				$this->Session->setFlash(__('The TimeClock has been saved', true), 'flash_success');
				$this->redirect(array('action'=>'index'));
				exit();
			} else {
				$this->Session->setFlash(__('The TimeClock could not be saved. Please, try again.', true), 'flash_failure');
			}
		}
		$users = $this->TimeClock->User->find('list');
		$this->set(compact('users'));
	}

	function manage_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid TimeClock', true), 'flash_failure');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->TimeClock->save($this->data)) {
				$this->Session->setFlash(__('The TimeClock has been saved', true), 'flash_success');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TimeClock could not be saved. Please, try again.', true), 'flash_failure');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TimeClock->read(null, $id);
		}
		$users = $this->TimeClock->User->find('list');
		$this->set(compact('users'));
		$this->render();
	}

	function manage_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for TimeClock', true), 'flash_warning');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TimeClock->del($id)) {
			$this->Session->setFlash(__('TimeClock deleted', true), 'flash_success');
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
