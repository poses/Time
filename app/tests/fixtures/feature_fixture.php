<?php 
/* SVN FILE: $Id$ */
/* Feature Fixture generated on: 2011-07-07 00:39:07 : 1310017147*/

class FeatureFixture extends CakeTestFixture {
	var $name = 'Feature';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'active' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'name'  => 1,
		'active'  => 1,
		'created'  => '2011-07-07 00:39:07',
		'modified'  => '2011-07-07 00:39:07'
	));
}
?>