<?php 
/* SVN FILE: $Id$ */
/* DeniedLocation Test cases generated on: 2011-07-07 00:38:15 : 1310017095*/
App::import('Model', 'DeniedLocation');

class DeniedLocationTestCase extends CakeTestCase {
	var $DeniedLocation = null;
	var $fixtures = array('app.denied_location');

	function startTest() {
		$this->DeniedLocation =& ClassRegistry::init('DeniedLocation');
	}

	function testDeniedLocationInstance() {
		$this->assertTrue(is_a($this->DeniedLocation, 'DeniedLocation'));
	}

	function testDeniedLocationFind() {
		$this->DeniedLocation->recursive = -1;
		$results = $this->DeniedLocation->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('DeniedLocation' => array(
			'id'  => 1,
			'organization_id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type'  => 'Lorem ipsum d',
			'value'  => 'Lorem ipsum do',
			'active'  => 1,
			'created'  => '2011-07-07 00:38:14',
			'modified'  => '2011-07-07 00:38:14'
		));
		$this->assertEqual($results, $expected);
	}
}
?>