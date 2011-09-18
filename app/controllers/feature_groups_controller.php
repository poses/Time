<?php
class FeatureGroupsController extends AppController {

	var $name = 'FeatureGroups';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->FeatureGroup->recursive = 0;
		$this->set('featureGroups', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid FeatureGroup.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('featureGroup', $this->FeatureGroup->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->FeatureGroup->create();
			if ($this->FeatureGroup->save($this->data)) {
				$this->Session->setFlash(__('The FeatureGroup has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The FeatureGroup could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid FeatureGroup', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->FeatureGroup->save($this->data)) {
				$this->Session->setFlash(__('The FeatureGroup has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The FeatureGroup could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FeatureGroup->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for FeatureGroup', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FeatureGroup->del($id)) {
			$this->Session->setFlash(__('FeatureGroup deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>