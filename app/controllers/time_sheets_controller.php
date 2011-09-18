<?php
class TimeSheetsController extends AppController {

	var $name = 'TimeSheets';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->TimeSheet->recursive = 0;
		$this->set('timeSheets', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid TimeSheet.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('timeSheet', $this->TimeSheet->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->TimeSheet->create();
			if ($this->TimeSheet->save($this->data)) {
				$this->Session->setFlash(__('The TimeSheet has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TimeSheet could not be saved. Please, try again.', true));
			}
		}
		$organizations = $this->TimeSheet->Organization->find('list');
		$payPeriods = $this->TimeSheet->PayPeriod->find('list');
		$users = $this->TimeSheet->User->find('list');
		$this->set(compact('organizations', 'payPeriods', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid TimeSheet', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->TimeSheet->save($this->data)) {
				$this->Session->setFlash(__('The TimeSheet has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TimeSheet could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TimeSheet->read(null, $id);
		}
		$organizations = $this->TimeSheet->Organization->find('list');
		$payPeriods = $this->TimeSheet->PayPeriod->find('list');
		$users = $this->TimeSheet->User->find('list');
		$this->set(compact('organizations','payPeriods','users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for TimeSheet', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TimeSheet->del($id)) {
			$this->Session->setFlash(__('TimeSheet deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>