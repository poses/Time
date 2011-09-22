<?php
class OrganizationsController extends AppController {

	var $name = 'Organizations';
    function beforeFilter() {
        parent::beforeFilter();
        //if($this->Session->read('NewOrganization.manager')){
            $this->Auth->allow('add');
        //}
    }
	function index() {
		$this->Organization->recursive = 0;
		$this->set('organizations', $this->paginate());
	}
	function manage_index() {
		$this->Organization->recursive = 0;
		$this->set('organizations', $this->paginate());
	}
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Organization.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('organization', $this->Organization->read(null, $id));
	}

	function add() {
	    $newManager = $this->Session->read('NewOrganization.manager');
	    
	    if(empty($newManager)){
	        $this->Session->setFlash('You are not authorized to add a new organization.');
            $this->redirect(array('controller' => 'users', 'action' => 'add', 'prefix'=>null));
	    }
		if (!empty($this->data)) {
		    $existing_organization_slug = $this->Organization->find('first', array(
		        'conditions'=> array(
		            'Organization.slug'=>$this->data['Organization']['slug'],
		        )
		    ));
		
		
		    if($existing_organization_slug){
		        $this->Session->setFlash(__('That organization slug is already in use',true), 'flash_failure');
		        $this->redirect($this->referer);
		        return;
		    }
		    App::import('Controller', 'Users');
			$Users = new UsersController();
			$Users->constructClasses();
			$this->Session->delete('NewOrganization.manager');
			$Users->User->set($newManager);
			if($Users->User->validates()){
			    
                $this->Organization->create();
			    if ($this->Organization->save($this->data)) {
			        $newManager['User']['organization_id'] = $this->Organization->id;
			        $newManager['Organization']['id'] = $this->Organization->id;
			        $newManager['Organization']['name'] = $this->Organization->name;
				    $this->Session->write('NewOrganization.manager', $newManager);
				    $Users->add();
                    $this->Session->setFlash(__('The Organization has been saved', true));
				    //$this->redirect(array('controller' => 'organizations', 'action' => 'index', 'prefix'=>'manage', 'manage'=>true));
			    } else {
			        debug($this->Organization->validationErrors);
				    $this->Session->setFlash(__('The Organization could not be saved. Please, try again.', true));
			    }
			}else{
			    $this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			    $this->redirect(array('controller' => 'users', 'action' => 'add'));
			}
			
			
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Organization', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Organization->save($this->data)) {
				$this->Session->setFlash(__('The Organization has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Organization could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Organization->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Organization', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Organization->del($id)) {
			$this->Session->setFlash(__('Organization deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>
