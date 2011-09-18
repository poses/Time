<?php 
/* SVN FILE: $Id$ */
/* UserAllowedLocation Fixture generated on: 2011-07-09 03:47:50 : 1310201270*/

class UserAllowedLocationFixture extends CakeTestFixture {
	var $name = 'UserAllowedLocation';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'allowed_location_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'user_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array()
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'allowed_location_id'  => 'Lorem ipsum dolor sit amet',
		'user_id'  => 'Lorem ipsum dolor sit amet',
		'created'  => '2011-07-09 03:47:50',
		'modified'  => '2011-07-09 03:47:50'
	));
}
?>