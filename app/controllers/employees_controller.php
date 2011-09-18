<?php
class EmployeesController extends AppController {

	var $name = 'Employees';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Employee->recursive = 0;
		$this->set('employees', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Employee.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('employee', $this->Employee->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Employee->create();
			if ($this->Employee->save($this->data)) {
				$this->Session->setFlash(__('The Employee has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Employee could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Employee->User->find('list');
		$departments = $this->Employee->Department->find('list');
		$this->set(compact('users', 'departments'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Employee', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Employee->save($this->data)) {
				$this->Session->setFlash(__('The Employee has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Employee could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Employee->read(null, $id);
		}
		$users = $this->Employee->User->find('list');
		$departments = $this->Employee->Department->find('list');
		$this->set(compact('users','departments'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Employee', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Employee->del($id)) {
			$this->Session->setFlash(__('Employee deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>