<?php
class FeaturesController extends AppController {

	var $name = 'Features';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Feature->recursive = 0;
		$this->set('features', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Feature.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('feature', $this->Feature->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Feature->create();
			if ($this->Feature->save($this->data)) {
				$this->Session->setFlash(__('The Feature has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Feature could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Feature', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Feature->save($this->data)) {
				$this->Session->setFlash(__('The Feature has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Feature could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Feature->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Feature', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Feature->del($id)) {
			$this->Session->setFlash(__('Feature deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>