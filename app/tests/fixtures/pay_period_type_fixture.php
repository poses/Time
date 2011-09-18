<?php 
/* SVN FILE: $Id$ */
/* PayPeriodType Fixture generated on: 2011-07-07 00:34:33 : 1310016873*/

class PayPeriodTypeFixture extends CakeTestFixture {
	var $name = 'PayPeriodType';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'organization_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'name' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 32),
		'description' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'created' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'organization_id'  => 1,
		'name'  => 'Lorem ipsum dolor sit amet',
		'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'created'  => '2011-07-07 00:34:33',
		'modified'  => '2011-07-07 00:34:33'
	));
}
?>