<?php
class AllowedLocationsController extends AppController {

	var $name = 'AllowedLocations';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->AllowedLocation->recursive = 0;
		$this->set('allowedLocations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid AllowedLocation.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('allowedLocation', $this->AllowedLocation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->AllowedLocation->create();
			if ($this->AllowedLocation->save($this->data)) {
				$this->Session->setFlash(__('The AllowedLocation has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The AllowedLocation could not be saved. Please, try again.', true));
			}
		}
		$organizations = $this->AllowedLocation->Organization->find('list');
		$this->set(compact('organizations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid AllowedLocation', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->AllowedLocation->save($this->data)) {
				$this->Session->setFlash(__('The AllowedLocation has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The AllowedLocation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AllowedLocation->read(null, $id);
		}
		$organizations = $this->AllowedLocation->Organization->find('list');
		$this->set(compact('organizations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for AllowedLocation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->AllowedLocation->del($id)) {
			$this->Session->setFlash(__('AllowedLocation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>