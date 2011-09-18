<?php 
/* SVN FILE: $Id$ */
/* PayPeriodsController Test cases generated on: 2011-07-07 00:34:47 : 1310016887*/
App::import('Controller', 'PayPeriods');

class TestPayPeriods extends PayPeriodsController {
	var $autoRender = false;
}

class PayPeriodsControllerTest extends CakeTestCase {
	var $PayPeriods = null;

	function startTest() {
		$this->PayPeriods = new TestPayPeriods();
		$this->PayPeriods->constructClasses();
	}

	function testPayPeriodsControllerInstance() {
		$this->assertTrue(is_a($this->PayPeriods, 'PayPeriodsController'));
	}

	function endTest() {
		unset($this->PayPeriods);
	}
}
?>