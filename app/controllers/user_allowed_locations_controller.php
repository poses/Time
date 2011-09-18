<?php
class UserAllowedLocationsController extends AppController {

	var $name = 'UserAllowedLocations';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->UserAllowedLocation->recursive = 0;
		$this->set('userAllowedLocations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid UserAllowedLocation.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('userAllowedLocation', $this->UserAllowedLocation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->UserAllowedLocation->create();
			if ($this->UserAllowedLocation->save($this->data)) {
				$this->Session->setFlash(__('The UserAllowedLocation has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The UserAllowedLocation could not be saved. Please, try again.', true));
			}
		}
		$allowedLocations = $this->UserAllowedLocation->AllowedLocation->find('list');
		$users = $this->UserAllowedLocation->User->find('list');
		$this->set(compact('allowedLocations', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid UserAllowedLocation', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->UserAllowedLocation->save($this->data)) {
				$this->Session->setFlash(__('The UserAllowedLocation has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The UserAllowedLocation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->UserAllowedLocation->read(null, $id);
		}
		$allowedLocations = $this->UserAllowedLocation->AllowedLocation->find('list');
		$users = $this->UserAllowedLocation->User->find('list');
		$this->set(compact('allowedLocations','users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for UserAllowedLocation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->UserAllowedLocation->del($id)) {
			$this->Session->setFlash(__('UserAllowedLocation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>