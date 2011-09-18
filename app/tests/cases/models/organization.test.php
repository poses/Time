<?php 
/* SVN FILE: $Id$ */
/* Organization Test cases generated on: 2011-07-07 00:34:22 : 1310016862*/
App::import('Model', 'Organization');

class OrganizationTestCase extends CakeTestCase {
	var $Organization = null;
	var $fixtures = array('app.organization');

	function startTest() {
		$this->Organization =& ClassRegistry::init('Organization');
	}

	function testOrganizationInstance() {
		$this->assertTrue(is_a($this->Organization, 'Organization'));
	}

	function testOrganizationFind() {
		$this->Organization->recursive = -1;
		$results = $this->Organization->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Organization' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'slug'  => 'Lorem ipsum dolor sit amet',
			'theme'  => 'Lorem ipsum dolor sit amet',
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'active'  => 1,
			'created'  => '2011-07-07 00:34:22',
			'modified'  => '2011-07-07 00:34:22'
		));
		$this->assertEqual($results, $expected);
	}
}
?>