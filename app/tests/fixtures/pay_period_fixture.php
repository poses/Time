<?php 
/* SVN FILE: $Id$ */
/* PayPeriod Fixture generated on: 2011-07-07 00:34:46 : 1310016886*/

class PayPeriodFixture extends CakeTestFixture {
	var $name = 'PayPeriod';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'organization_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'pay_period_type_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'day' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'week' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'organization_id'  => 1,
		'pay_period_type_id'  => 1,
		'day'  => 1,
		'week'  => 1,
		'created'  => '2011-07-07 00:34:46',
		'modified'  => '2011-07-07 00:34:46'
	));
}
?>