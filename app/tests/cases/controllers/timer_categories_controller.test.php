<?php 
/* SVN FILE: $Id$ */
/* TimerCategoriesController Test cases generated on: 2011-07-06 23:37:12 : 1310013432*/
App::import('Controller', 'TimerCategories');

class TestTimerCategories extends TimerCategoriesController {
	var $autoRender = false;
}

class TimerCategoriesControllerTest extends CakeTestCase {
	var $TimerCategories = null;

	function startTest() {
		$this->TimerCategories = new TestTimerCategories();
		$this->TimerCategories->constructClasses();
	}

	function testTimerCategoriesControllerInstance() {
		$this->assertTrue(is_a($this->TimerCategories, 'TimerCategoriesController'));
	}

	function endTest() {
		unset($this->TimerCategories);
	}
}
?>