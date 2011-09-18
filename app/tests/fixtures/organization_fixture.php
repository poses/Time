<?php 
/* SVN FILE: $Id$ */
/* Organization Fixture generated on: 2011-07-07 00:34:22 : 1310016862*/

class OrganizationFixture extends CakeTestFixture {
	var $name = 'Organization';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 128),
		'slug' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 128),
		'theme' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 128),
		'description' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'active' => array('type'=>'boolean', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet',
		'slug'  => 'Lorem ipsum dolor sit amet',
		'theme'  => 'Lorem ipsum dolor sit amet',
		'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'active'  => 1,
		'created'  => '2011-07-07 00:34:22',
		'modified'  => '2011-07-07 00:34:22'
	));
}
?>