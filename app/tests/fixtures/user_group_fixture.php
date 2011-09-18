<?php 
/* SVN FILE: $Id$ */
/* UserGroup Fixture generated on: 2011-07-07 00:23:48 : 1310016228*/

class UserGroupFixture extends CakeTestFixture {
	var $name = 'UserGroup';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'organization_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 128),
		'active' => array('type'=>'boolean', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'organization_id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet',
		'active'  => 1,
		'created'  => '2011-07-07 00:23:48',
		'modified'  => '2011-07-07 00:23:48'
	));
}
?>