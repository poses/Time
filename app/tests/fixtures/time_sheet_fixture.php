<?php 
/* SVN FILE: $Id$ */
/* TimeSheet Fixture generated on: 2011-07-06 23:37:18 : 1310013438*/

class TimeSheetFixture extends CakeTestFixture {
	var $name = 'TimeSheet';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'organization_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'pay_period_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'user_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'organization_id'  => 1,
		'pay_period_id'  => 1,
		'user_id'  => 1,
		'created'  => '2011-07-06 23:37:18',
		'modified'  => '2011-07-06 23:37:18'
	));
}
?>