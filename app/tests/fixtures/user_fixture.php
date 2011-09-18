<?php 
/* SVN FILE: $Id$ */
/* User Fixture generated on: 2011-07-07 00:23:28 : 1310016208*/

class UserFixture extends CakeTestFixture {
	var $name = 'User';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'organization_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'user_group_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 128),
		'username' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),
		'email' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 256),
		'password' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 40),
		'active' => array('type'=>'boolean', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'organization_id'  => 1,
		'user_group_id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet',
		'username'  => 'Lorem ipsum dolor sit amet',
		'email'  => 'Lorem ipsum dolor sit amet',
		'password'  => 'Lorem ipsum dolor sit amet',
		'active'  => 1,
		'created'  => '2011-07-07 00:23:28',
		'modified'  => '2011-07-07 00:23:28'
	));
}
?>