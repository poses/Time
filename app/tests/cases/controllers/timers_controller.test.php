<?php 
/* SVN FILE: $Id$ */
/* TimersController Test cases generated on: 2011-07-06 23:37:03 : 1310013423*/
App::import('Controller', 'Timers');

class TestTimers extends TimersController {
	var $autoRender = false;
}

class TimersControllerTest extends CakeTestCase {
	var $Timers = null;

	function startTest() {
		$this->Timers = new TestTimers();
		$this->Timers->constructClasses();
	}

	function testTimersControllerInstance() {
		$this->assertTrue(is_a($this->Timers, 'TimersController'));
	}

	function endTest() {
		unset($this->Timers);
	}
}
?>