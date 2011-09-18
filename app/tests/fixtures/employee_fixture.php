<?php 
/* SVN FILE: $Id$ */
/* Employee Fixture generated on: 2011-07-07 00:32:30 : 1310016750*/

class EmployeeFixture extends CakeTestFixture {
	var $name = 'Employee';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'user_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'department_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'badge_number' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 32),
		'pay_type' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 6),
		'pay_frequency' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 10),
		'pay_rate' => array('type'=>'float', 'null' => false, 'default' => NULL),
		'time_type' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 9),
		'federal_filing_status' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 16),
		'federal_exemptions' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 2),
		'withhold_additional_amount' => array('type'=>'float', 'null' => false, 'default' => NULL),
		'withhold_additional_percent' => array('type'=>'float', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
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
}
?>