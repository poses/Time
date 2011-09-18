<?php
class DeniedLocationsController extends AppController {

	var $name = 'DeniedLocations';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->DeniedLocation->recursive = 0;
		$this->set('deniedLocations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid DeniedLocation.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('deniedLocation', $this->DeniedLocation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->DeniedLocation->create();
			if ($this->DeniedLocation->save($this->data)) {
				$this->Session->setFlash(__('The DeniedLocation has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The DeniedLocation could not be saved. Please, try again.', true));
			}
		}
		$organizations = $this->DeniedLocation->Organization->find('list');
		$this->set(compact('organizations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid DeniedLocation', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->DeniedLocation->save($this->data)) {
				$this->Session->setFlash(__('The DeniedLocation has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The DeniedLocation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->DeniedLocation->read(null, $id);
		}
		$organizations = $this->DeniedLocation->Organization->find('list');
		$this->set(compact('organizations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for DeniedLocation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->DeniedLocation->del($id)) {
			$this->Session->setFlash(__('DeniedLocation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>