<?php 
/* SVN FILE: $Id$ */
/* AllowedLocation Test cases generated on: 2011-07-07 00:38:01 : 1310017081*/
App::import('Model', 'AllowedLocation');

class AllowedLocationTestCase extends CakeTestCase {
	var $AllowedLocation = null;
	var $fixtures = array('app.allowed_location');

	function startTest() {
		$this->AllowedLocation =& ClassRegistry::init('AllowedLocation');
	}

	function testAllowedLocationInstance() {
		$this->assertTrue(is_a($this->AllowedLocation, 'AllowedLocation'));
	}

	function testAllowedLocationFind() {
		$this->AllowedLocation->recursive = -1;
		$results = $this->AllowedLocation->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('AllowedLocation' => array(
			'id'  => 1,
			'organization_id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type'  => 'Lorem ipsum d',
			'value'  => 'Lorem ipsum do',
			'active'  => 1,
			'created'  => '2011-07-07 00:38:01',
			'modified'  => '2011-07-07 00:38:01'
		));
		$this->assertEqual($results, $expected);
	}
}
?>