<?php 
/* SVN FILE: $Id$ */
/* PayPeriod Test cases generated on: 2011-07-07 00:34:46 : 1310016886*/
App::import('Model', 'PayPeriod');

class PayPeriodTestCase extends CakeTestCase {
	var $PayPeriod = null;
	var $fixtures = array('app.pay_period');

	function startTest() {
		$this->PayPeriod =& ClassRegistry::init('PayPeriod');
	}

	function testPayPeriodInstance() {
		$this->assertTrue(is_a($this->PayPeriod, 'PayPeriod'));
	}

	function testPayPeriodFind() {
		$this->PayPeriod->recursive = -1;
		$results = $this->PayPeriod->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('PayPeriod' => array(
			'id'  => 1,
			'organization_id'  => 1,
			'pay_period_type_id'  => 1,
			'day'  => 1,
			'week'  => 1,
			'created'  => '2011-07-07 00:34:46',
			'modified'  => '2011-07-07 00:34:46'
		));
		$this->assertEqual($results, $expected);
	}
}
?>