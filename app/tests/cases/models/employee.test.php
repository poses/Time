<?php 
/* SVN FILE: $Id$ */
/* Employee Test cases generated on: 2011-07-07 00:32:31 : 1310016751*/
App::import('Model', 'Employee');

class EmployeeTestCase extends CakeTestCase {
	var $Employee = null;
	var $fixtures = array('app.employee');

	function startTest() {
		$this->Employee =& ClassRegistry::init('Employee');
	}

	function testEmployeeInstance() {
		$this->assertTrue(is_a($this->Employee, 'Employee'));
	}

	function testEmployeeFind() {
		$this->Employee->recursive = -1;
		$results = $this->Employee->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Employee' => array(
			'id'  => 1,
			'user_id'  => 1,
			'department_id'  => 1,
			'badge_number'  => 'Lorem ipsum dolor sit amet',
			'pay_type'  => 'Lore',
			'pay_frequency'  => 'Lorem ip',
			'pay_rate'  => 'Lorem ip',
			'time_type'  => 'Lorem i',
			'federal_filing_status'  => 'Lorem ipsum do',
			'federal_exemptions'  => 1,
			'withhold_additional_amount'  => 1,
			'withhold_additional_percent'  => 1,
			'created'  => '2011-07-07 00:32:30',
			'modified'  => '2011-07-07 00:32:30'
		));
		$this->assertEqual($results, $expected);
	}
}
?>