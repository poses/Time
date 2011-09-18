<?php 
/* SVN FILE: $Id$ */
/* ReasonCodesController Test cases generated on: 2011-07-09 13:42:40 : 1310236960*/
App::import('Controller', 'ReasonCodes');

class TestReasonCodes extends ReasonCodesController {
	var $autoRender = false;
}

class ReasonCodesControllerTest extends CakeTestCase {
	var $ReasonCodes = null;

	function startTest() {
		$this->ReasonCodes = new TestReasonCodes();
		$this->ReasonCodes->constructClasses();
	}

	function testReasonCodesControllerInstance() {
		$this->assertTrue(is_a($this->ReasonCodes, 'ReasonCodesController'));
	}

	function endTest() {
		unset($this->ReasonCodes);
	}
}
?>