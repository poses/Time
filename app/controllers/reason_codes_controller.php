<?php
class ReasonCodesController extends AppController {

	var $name = 'ReasonCodes';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->ReasonCode->recursive = 0;
		$this->set('reasonCodes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ReasonCode.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('reasonCode', $this->ReasonCode->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ReasonCode->create();
			if ($this->ReasonCode->save($this->data)) {
				$this->Session->setFlash(__('The ReasonCode has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The ReasonCode could not be saved. Please, try again.', true));
			}
		}
		$organizations = $this->ReasonCode->Organization->find('list');
		$this->set(compact('organizations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ReasonCode', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->ReasonCode->save($this->data)) {
				$this->Session->setFlash(__('The ReasonCode has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The ReasonCode could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ReasonCode->read(null, $id);
		}
		$organizations = $this->ReasonCode->Organization->find('list');
		$this->set(compact('organizations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ReasonCode', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ReasonCode->del($id)) {
			$this->Session->setFlash(__('ReasonCode deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>