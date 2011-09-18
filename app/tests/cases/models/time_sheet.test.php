<?php 
/* SVN FILE: $Id$ */
/* TimeSheet Test cases generated on: 2011-07-06 23:37:18 : 1310013438*/
App::import('Model', 'TimeSheet');

class TimeSheetTestCase extends CakeTestCase {
	var $TimeSheet = null;
	var $fixtures = array('app.time_sheet');

	function startTest() {
		$this->TimeSheet =& ClassRegistry::init('TimeSheet');
	}

	function testTimeSheetInstance() {
		$this->assertTrue(is_a($this->TimeSheet, 'TimeSheet'));
	}

	function testTimeSheetFind() {
		$this->TimeSheet->recursive = -1;
		$results = $this->TimeSheet->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('TimeSheet' => array(
			'id'  => 1,
			'organization_id'  => 1,
			'pay_period_id'  => 1,
			'user_id'  => 1,
			'created'  => '2011-07-06 23:37:18',
			'modified'  => '2011-07-06 23:37:18'
		));
		$this->assertEqual($results, $expected);
	}
}
?>