<?php 
/* SVN FILE: $Id$ */
/* ReasonCode Fixture generated on: 2011-07-09 13:42:40 : 1310236960*/

class ReasonCodeFixture extends CakeTestFixture {
	var $name = 'ReasonCode';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary'),
		'organization_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 36),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 32),
		'description' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array()
	);
	var $records = array(array(
		'id'  => 'Lorem ipsum dolor sit amet',
		'organization_id'  => 'Lorem ipsum dolor sit amet',
		'name'  => 'Lorem ipsum dolor sit amet',
		'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'created'  => '2011-07-09 13:42:40',
		'modified'  => '2011-07-09 13:42:40'
	));
}
?>