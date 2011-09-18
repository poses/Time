<?php
class PayPeriodsController extends AppController {

	var $name = 'PayPeriods';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->PayPeriod->recursive = 0;
		$this->set('payPeriods', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid PayPeriod.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('payPeriod', $this->PayPeriod->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PayPeriod->create();
			if ($this->PayPeriod->save($this->data)) {
				$this->Session->setFlash(__('The PayPeriod has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The PayPeriod could not be saved. Please, try again.', true));
			}
		}
		$organizations = $this->PayPeriod->Organization->find('list');
		$payPeriodTypes = $this->PayPeriod->PayPeriodType->find('list');
		$this->set(compact('organizations', 'payPeriodTypes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid PayPeriod', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->PayPeriod->save($this->data)) {
				$this->Session->setFlash(__('The PayPeriod has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The PayPeriod could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PayPeriod->read(null, $id);
		}
		$organizations = $this->PayPeriod->Organization->find('list');
		$payPeriodTypes = $this->PayPeriod->PayPeriodType->find('list');
		$this->set(compact('organizations','payPeriodTypes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for PayPeriod', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PayPeriod->del($id)) {
			$this->Session->setFlash(__('PayPeriod deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>