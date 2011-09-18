<?php 
/* SVN FILE: $Id$ */
/* Feature Test cases generated on: 2011-07-07 00:39:07 : 1310017147*/
App::import('Model', 'Feature');

class FeatureTestCase extends CakeTestCase {
	var $Feature = null;
	var $fixtures = array('app.feature');

	function startTest() {
		$this->Feature =& ClassRegistry::init('Feature');
	}

	function testFeatureInstance() {
		$this->assertTrue(is_a($this->Feature, 'Feature'));
	}

	function testFeatureFind() {
		$this->Feature->recursive = -1;
		$results = $this->Feature->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Feature' => array(
			'id'  => 1,
			'name'  => 1,
			'active'  => 1,
			'created'  => '2011-07-07 00:39:07',
			'modified'  => '2011-07-07 00:39:07'
		));
		$this->assertEqual($results, $expected);
	}
}
?>