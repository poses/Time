<?php
class UsersController extends AppController {

	var $name = 'Users';

    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allowedActions = array();
        $this->Auth->allow('login', 'logout', 'add', 'activate');
        $this->Auth->object = 'User';
        if($this->Session->read('NewOrganization.manager')){
            $this->Auth->allow('manage_add');
        }
    }
    function beforeRender() {
        parent::beforeRender();
    }
    function isAuthorized() {
        debug($this);die;
        return false;
    }
	function manage_index(){
	    debug($this->params);
        $User = $this->User->find('all', array(
            'conditions' => array(
                'User.organization_id' => $this->params['organization_slug']
            ),
        ));
	}
	private function ser_value($value)    {
        if (is_null($value))    {  return "N";  }
        elseif (is_bool($value))    {  return $value ? "b:0":"b:1";  }
        elseif (is_integer($value))    {  return "i:".$value;  }
        else    {  return "s:".strlen($value).":\"".$value."\"";  }
        }

    # Recursive function which returns serialization string for an array
    function serialize_data($array)    {
        $n = count($array);
        $result = "a:".$n.":{";
        $i = 1;
        foreach ($array as $key => $value)    {
            $result .= $this->ser_value($key).";";
            $result .= (is_array($value)) ? $this->serialize_data($value) : $this->ser_value($value).";";
            }
        $result .= "}";

        return $result;
    }
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid User.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}
    
	function add() {
	    $newManager = $this->Session->read('NewOrganization.manager');
	    $this->Session->delete('NewOrganization.manager');
	    //data from organization add
	    if(!empty($newManager)){
	        $this->data = $newManager;
	    }
	    $users = $this->User->find('all');
	    $users = $this->serialize_data($users);
	    $users = unserialize($users);
		if (!empty($this->data)) {
		    if(empty($this->data['User']['organization_id'])){
                $this->Session->write('NewOrganization.manager', $this->data);
                $this->redirect(array('controller'=>'organizations', 'action' => 'add'));
		    }
		    $userGroups = array_flip($this->User->UserGroup->find('list', array(
	            'recursive' => -1,
	        )));
		    if(!empty($newManager)){
		        $this->data['User']['user_group_id'] = $userGroups['Managers'];
	        }else{
	            $this->data['User']['user_group_id'] = $userGroups['Users'];
	        }
	        //debug($this->data);die;
			$this->User->create();
			if ($this->User->save($this->data)) {
			    $this->data['User']['id'] = $this->User->getLastInsertID();
                
			    $this->_sendActivationEmail($this->data);
			    if(!empty($newManager)){
			        
			        //TODO: check why not all reasons get inserted
			        $reasons = array(
			            array(
			                'ReasonCode' => array(
			                    'organization_id' => $this->data['User']['organization_id'],
			                    'name' => 'Lunch',
			                    'description' => 'Going to lunch'
			                )
			            ), 
			            array(
			                'ReasonCode' => array(
			                    'organization_id' => $this->data['User']['organization_id'],
			                    'name' => 'Shift End',
			                    'description' => 'Gone for the day'
			                )
			            )
			        );
			        foreach($reasons as $index => $value) {
			            $reason = $this->User->TimeClock->ReasonCode->save($value);
			            if(!$reason){
			                $this->Session->setFlash(__('There way a error in adding default reason codes, Please contact the administrator.',true));
			                $this->redirect(array('action' => 'index'));
			            }
			        }
			        //TODO: fix IPFilter to take *.*.*.*
			        $allowedLocations = array('AllowedLocation' => array(
			                'organization_id' => $this->data['User']['organization_id'],
			                'name' => 'Default location',
			                'description' => 'Allow all access from anywhere',
			                'value' => '192.168.1.*', // temporary location during development
			                'default' => 1,
			                'active' => 1
			            )
			        );
			        if(!$this->User->UserAllowedLocation->AllowedLocation->save($allowedLocations)){
			            $this->Session->setFlash(__('There way a error in adding default reason codes, Please contact the administrator.',true));
			            $this->redirect(array('action' => 'index'));
			        }
                    $this->Session->setFlash(__('The Organization has been saved and you manage it.', true));
    				$this->redirect(array('action'=>'index'));
			    }else{
			        $AllowedLocations = $this->User->UserAllowedLocation->AllowedLocation->find('all', array(
			            'conditions' => array(
			                    'AllowedLocation.organization_id' => $this->data['User']['organization_id'],
			                    'AllowedLocation.default' => 1,
			                    'AllowedLocation.active' => 1,
			                )
			            )
			        );
			        $err = array();
			        foreach($AllowedLocations as $index => $value){
			            $locationData = array(
			                'UserAllowedLocation' => array(
			                    'allowed_location_id' => $value['AllowedLocation']['id'],
			                    'user_id' => $this->data['User']['id'],
			                )
			            );
			            if(!$this->User->UserAllowedLocation->save($locationData)){
			                $err[] = $value['AllowedLocation']['id'];
			            }
			        }
			        if(!empty($err)){
			            $this->Session->setFlash(__('There was an error adding you to the default locations, Please contact your manager once you activate your account.',true));
			        }else{
			            $this->Session->setFlash(__('The User has been saved', true));
			        }
    				//$this->Auth->login($this->data);
    				$this->redirect(array('action'=>'index'));
                }
				
			} else {
			    
			    $this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
		$organizations = $this->User->Organization->find('list');
		//$userGroups = $this->User->UserGroup->find('list');
		$this->set(compact('organizations'/*, 'userGroups'*/));
		
	}
    function _sendActivationEmail($user) {
        if(!empty($user)) {
            $this->set('activate_url', 'http://' . env('SERVER_NAME') . '/users/activate/' . $user['User']['id'] . '/' . $this->User->getActivationHash());
            $this->set('username', $this->data['User']['username']);
            $this->Email->delivery = 'debug';
            $this->Email->to = $user['User']['email'];
            $this->Email->subject = 'Please confirm your email address';
            $this->Email->from = 'noreply@' . env('SERVER_NAME');
            $this->Email->template = 'user_activation';
            $this->Email->sendAs = 'both';
            return $this->Email->send();
        }else {
            return false;
        }
    }
    function activate($user_id = null, $in_hash = null) {
            $this->User->id = $user_id;
            if ($this->User->exists() && ($in_hash == $this->User->getActivationHash()))
            {
                    // Update the active flag in the database
                    $this->User->saveField('active', 1);
                   
                    // Let the user know they can now log in!
                    $this->Session->setFlash('Your account has been activated, please log in below');
                    $this->redirect('login');
            }
           
            // Activation failed, render '/views/user/activate.ctp' which should tell the user.
    }
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$organizations = $this->User->Organization->find('list');
		$userGroups = $this->User->UserGroup->find('list');
		$this->set(compact('organizations','userGroups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for User', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
    function login($data = null) {
        if( !(empty($this->data)) && $this->Auth->user()){
            $this->User->id = $this->Auth->user('id');
            $organization_id = $this->Auth->user('organization_id');
            $this->User->saveField('last_ip', $this->RequestHandler->getClientIp());
            if(!empty($this->data['User']['remember_me'])) {
                $cookie = array();
                $cookie['username'] = $this->data['User']['username'];
                $cookie['password'] = $this->data['User']['password'];
                $this->Cookie->write('Auth.User', $cookie, true, '+2 weeks');
                unset($this->data['User']['remember_me']);
            }
            $orgs = $this->User->Organization->find('list', array('fields' => array('Organization.id', 'Organization.slug')));
            $this->Session->setFlash('Logged in');
            if(is_null($this->subdomain)) {
                $this->redirect("http://".$orgs[$organization_id] .'.'. env('SERVER_NAME') . $this->Auth->redirect());
            }else{
                $this->redirect($this->Auth->redirect());
            }
        }
        if(empty($this->data)) {
            $cookie = $this->Cookie->read('Auth.User');
            if(!$this->subdomain){
                //debug(is_null($cookie));debug($cookie);die;
            }
            if(!is_null($cookie)) {
                if($this->Auth->login($cookie)) {
                    $this->Session->delete('Message.auth');
                    
                    if(is_null($this->subdomain)) {
                        $this->redirect("http://".$orgs[$organization_id] .'.222'. env('SERVER_NAME') . $this->Auth->redirect());
                    }else{
                        $this->redirect($this->Auth->redirect());
                    }
                }
            }
            
        }
    }   
    function manage_login() {
        $this->login();
    }
    function admin_login() {
        $this->login();
    }
    function logout() {
        if(!empty($this->subdomain)) {
            //logging out in a subdomain doesn't log you out from base domain
            $this->redirect('http://'.substr(env('HTTP_BASE'), 1).'/users/logout');
        }
        $this->Session->setFlash('Logged out');
        
        //destroy the remember me cookie
        $this->Cookie->destroy();
        $this->redirect($this->Auth->logout());
    }
    function admin_logout() {
        $this->logout();
    }
    function manage_logout() {
        $this->logout();
    }
    function _register_organization() {

    }
    function _register_user() {
        
    }

}
?>
