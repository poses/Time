<?php 
/* SVN FILE: $Id$ */
/* TimeSheetsController Test cases generated on: 2011-07-06 23:37:19 : 1310013439*/
App::import('Controller', 'TimeSheets');

class TestTimeSheets extends TimeSheetsController {
	var $autoRender = false;
}

class TimeSheetsControllerTest extends CakeTestCase {
	var $TimeSheets = null;

	function startTest() {
		$this->TimeSheets = new TestTimeSheets();
		$this->TimeSheets->constructClasses();
	}

	function testTimeSheetsControllerInstance() {
		$this->assertTrue(is_a($this->TimeSheets, 'TimeSheetsController'));
	}

	function endTest() {
		unset($this->TimeSheets);
	}
}
?>