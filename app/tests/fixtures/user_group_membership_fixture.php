<?php 
/* SVN FILE: $Id$ */
/* UserGroupMembership Fixture generated on: 2011-07-07 00:24:00 : 1310016240*/

class UserGroupMembershipFixture extends CakeTestFixture {
	var $name = 'UserGroupMembership';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'user_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'user_group_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'user_id'  => 1,
		'user_group_id'  => 1,
		'created'  => '2011-07-07 00:24:00',
		'modified'  => '2011-07-07 00:24:00'
	));
}
?>