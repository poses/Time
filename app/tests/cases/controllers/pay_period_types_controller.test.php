<?php 
/* SVN FILE: $Id$ */
/* PayPeriodTypesController Test cases generated on: 2011-07-07 00:39:32 : 1310017172*/
App::import('Controller', 'PayPeriodTypes');

class TestPayPeriodTypes extends PayPeriodTypesController {
	var $autoRender = false;
}

class PayPeriodTypesControllerTest extends CakeTestCase {
	var $PayPeriodTypes = null;

	function startTest() {
		$this->PayPeriodTypes = new TestPayPeriodTypes();
		$this->PayPeriodTypes->constructClasses();
	}

	function testPayPeriodTypesControllerInstance() {
		$this->assertTrue(is_a($this->PayPeriodTypes, 'PayPeriodTypesController'));
	}

	function endTest() {
		unset($this->PayPeriodTypes);
	}
}
?>