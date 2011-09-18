<?php
class DepartmentsController extends AppController {

	var $name = 'Departments';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Department->recursive = 0;
		$this->set('departments', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Department.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('department', $this->Department->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Department->create();
			if ($this->Department->save($this->data)) {
				$this->Session->setFlash(__('The Department has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Department could not be saved. Please, try again.', true));
			}
		}
		$organizations = $this->Department->Organization->find('list');
		$this->set(compact('organizations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Department', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Department->save($this->data)) {
				$this->Session->setFlash(__('The Department has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Department could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Department->read(null, $id);
		}
		$organizations = $this->Department->Organization->find('list');
		$this->set(compact('organizations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Department', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Department->del($id)) {
			$this->Session->setFlash(__('Department deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>