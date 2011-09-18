<?php 
/* SVN FILE: $Id$ */
/* TimeClock Test cases generated on: 2011-07-08 13:21:15 : 1310149275*/
App::import('Model', 'TimeClock');

class TimeClockTestCase extends CakeTestCase {
	var $TimeClock = null;
	var $fixtures = array('app.time_clock');

	function startTest() {
		$this->TimeClock =& ClassRegistry::init('TimeClock');
	}

	function testTimeClockInstance() {
		$this->assertTrue(is_a($this->TimeClock, 'TimeClock'));
	}

	function testTimeClockFind() {
		$this->TimeClock->recursive = -1;
		$results = $this->TimeClock->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('TimeClock' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'user_id'  => 'Lorem ipsum dolor sit amet',
			'in'  => '2011-07-08 13:21:02',
			'out'  => '2011-07-08 13:21:02',
			'created'  => '2011-07-08 13:21:02',
			'modified'  => '2011-07-08 13:21:02'
		));
		$this->assertEqual($results, $expected);
	}
}
?>