<?php 
/* SVN FILE: $Id$ */
/* TimeClock Fixture generated on: 2011-07-08 13:21:02 : 1310149262*/

class TimeClockFixture extends CakeTestFixture {
	var $name = 'TimeClock';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'user_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'unique'),
		'in' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'out' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'user_id' => array('column' => 'user_id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'user_id'  => 'Lorem ipsum dolor sit amet',
		'in'  => '2011-07-08 13:21:02',
		'out'  => '2011-07-08 13:21:02',
		'created'  => '2011-07-08 13:21:02',
		'modified'  => '2011-07-08 13:21:02'
	));
}
?>