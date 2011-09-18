<?php
class TimerCategoriesController extends AppController {

	var $name = 'TimerCategories';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->TimerCategory->recursive = 0;
		$this->set('timerCategories', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid TimerCategory.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('timerCategory', $this->TimerCategory->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->TimerCategory->create();
			if ($this->TimerCategory->save($this->data)) {
				$this->Session->setFlash(__('The TimerCategory has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TimerCategory could not be saved. Please, try again.', true));
			}
		}
		$organizations = $this->TimerCategory->Organization->find('list');
		$this->set(compact('organizations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid TimerCategory', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->TimerCategory->save($this->data)) {
				$this->Session->setFlash(__('The TimerCategory has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The TimerCategory could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TimerCategory->read(null, $id);
		}
		$organizations = $this->TimerCategory->Organization->find('list');
		$this->set(compact('organizations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for TimerCategory', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TimerCategory->del($id)) {
			$this->Session->setFlash(__('TimerCategory deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>