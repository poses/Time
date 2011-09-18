<?php 
/* SVN FILE: $Id$ */
/* Department Fixture generated on: 2011-07-07 00:34:09 : 1310016849*/

class DepartmentFixture extends CakeTestFixture {
	var $name = 'Department';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'organization_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 64),
		'level' => array('type'=>'boolean', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'organization_id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet',
		'level'  => 1,
		'created'  => '2011-07-07 00:34:09',
		'modified'  => '2011-07-07 00:34:09'
	));
}
?>