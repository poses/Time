<?php 
/* SVN FILE: $Id$ */
/* FeatureGroup Test cases generated on: 2011-07-07 00:38:54 : 1310017134*/
App::import('Model', 'FeatureGroup');

class FeatureGroupTestCase extends CakeTestCase {
	var $FeatureGroup = null;
	var $fixtures = array('app.feature_group');

	function startTest() {
		$this->FeatureGroup =& ClassRegistry::init('FeatureGroup');
	}

	function testFeatureGroupInstance() {
		$this->assertTrue(is_a($this->FeatureGroup, 'FeatureGroup'));
	}

	function testFeatureGroupFind() {
		$this->FeatureGroup->recursive = -1;
		$results = $this->FeatureGroup->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('FeatureGroup' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'value'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => '2011-07-07 00:38:54',
			'modified'  => '2011-07-07 00:38:54'
		));
		$this->assertEqual($results, $expected);
	}
}
?>