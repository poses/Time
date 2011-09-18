<?php
class TimersController extends AppController {

	var $name = 'Timers';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Timer->recursive = 0;
		$this->set('timers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Timer.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('timer', $this->Timer->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Timer->create();
			if ($this->Timer->save($this->data)) {
				$this->Session->setFlash(__('The Timer has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Timer could not be saved. Please, try again.', true));
			}
		}
		$organizations = $this->Timer->Organization->find('list');
		$timerCategories = $this->Timer->TimerCategory->find('list');
		$this->set(compact('organizations', 'timerCategories'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Timer', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Timer->save($this->data)) {
				$this->Session->setFlash(__('The Timer has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Timer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Timer->read(null, $id);
		}
		$organizations = $this->Timer->Organization->find('list');
		$timerCategories = $this->Timer->TimerCategory->find('list');
		$this->set(compact('organizations','timerCategories'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Timer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Timer->del($id)) {
			$this->Session->setFlash(__('Timer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>