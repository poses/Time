<?php
class UserGroupMembershipsController extends AppController {

	var $name = 'UserGroupMemberships';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->UserGroupMembership->recursive = 0;
		$this->set('userGroupMemberships', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid UserGroupMembership.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('userGroupMembership', $this->UserGroupMembership->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->UserGroupMembership->create();
			if ($this->UserGroupMembership->save($this->data)) {
				$this->Session->setFlash(__('The UserGroupMembership has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The UserGroupMembership could not be saved. Please, try again.', true));
			}
		}
		$users = $this->UserGroupMembership->User->find('list');
		$userGroups = $this->UserGroupMembership->UserGroup->find('list');
		$this->set(compact('users', 'userGroups'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid UserGroupMembership', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->UserGroupMembership->save($this->data)) {
				$this->Session->setFlash(__('The UserGroupMembership has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The UserGroupMembership could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->UserGroupMembership->read(null, $id);
		}
		$users = $this->UserGroupMembership->User->find('list');
		$userGroups = $this->UserGroupMembership->UserGroup->find('list');
		$this->set(compact('users','userGroups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for UserGroupMembership', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->UserGroupMembership->del($id)) {
			$this->Session->setFlash(__('UserGroupMembership deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>