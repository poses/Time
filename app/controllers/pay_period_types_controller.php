<?php
class PayPeriodTypesController extends AppController {

	var $name = 'PayPeriodTypes';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->PayPeriodType->recursive = 0;
		$this->set('payPeriodTypes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid PayPeriodType.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('payPeriodType', $this->PayPeriodType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PayPeriodType->create();
			if ($this->PayPeriodType->save($this->data)) {
				$this->Session->setFlash(__('The PayPeriodType has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The PayPeriodType could not be saved. Please, try again.', true));
			}
		}
		$organizations = $this->PayPeriodType->Organization->find('list');
		$this->set(compact('organizations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid PayPeriodType', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->PayPeriodType->save($this->data)) {
				$this->Session->setFlash(__('The PayPeriodType has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The PayPeriodType could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PayPeriodType->read(null, $id);
		}
		$organizations = $this->PayPeriodType->Organization->find('list');
		$this->set(compact('organizations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for PayPeriodType', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PayPeriodType->del($id)) {
			$this->Session->setFlash(__('PayPeriodType deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>