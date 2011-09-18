<?php 
/* SVN FILE: $Id$ */
/* PayPeriodType Test cases generated on: 2011-07-07 00:34:34 : 1310016874*/
App::import('Model', 'PayPeriodType');

class PayPeriodTypeTestCase extends CakeTestCase {
	var $PayPeriodType = null;
	var $fixtures = array('app.pay_period_type');

	function startTest() {
		$this->PayPeriodType =& ClassRegistry::init('PayPeriodType');
	}

	function testPayPeriodTypeInstance() {
		$this->assertTrue(is_a($this->PayPeriodType, 'PayPeriodType'));
	}

	function testPayPeriodTypeFind() {
		$this->PayPeriodType->recursive = -1;
		$results = $this->PayPeriodType->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('PayPeriodType' => array(
			'id'  => 1,
			'organization_id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => '2011-07-07 00:34:33',
			'modified'  => '2011-07-07 00:34:33'
		));
		$this->assertEqual($results, $expected);
	}
}
?>