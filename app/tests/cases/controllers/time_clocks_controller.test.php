<?php 
/* SVN FILE: $Id$ */
/* TimeClocksController Test cases generated on: 2011-07-06 23:37:23 : 1310013443*/
App::import('Controller', 'TimeClocks');

class TestTimeClocks extends TimeClocksController {
	var $autoRender = false;
}

class TimeClocksControllerTest extends CakeTestCase {
	var $TimeClocks = null;

	function startTest() {
		$this->TimeClocks = new TestTimeClocks();
		$this->TimeClocks->constructClasses();
	}

	function testTimeClocksControllerInstance() {
		$this->assertTrue(is_a($this->TimeClocks, 'TimeClocksController'));
	}

	function endTest() {
		unset($this->TimeClocks);
	}
}
?>