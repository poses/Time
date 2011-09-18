<?php 
/* SVN FILE: $Id$ */
/* TimerCategory Test cases generated on: 2011-07-06 23:37:11 : 1310013431*/
App::import('Model', 'TimerCategory');

class TimerCategoryTestCase extends CakeTestCase {
	var $TimerCategory = null;
	var $fixtures = array('app.timer_category');

	function startTest() {
		$this->TimerCategory =& ClassRegistry::init('TimerCategory');
	}

	function testTimerCategoryInstance() {
		$this->assertTrue(is_a($this->TimerCategory, 'TimerCategory'));
	}

	function testTimerCategoryFind() {
		$this->TimerCategory->recursive = -1;
		$results = $this->TimerCategory->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('TimerCategory' => array(
			'id'  => 1,
			'organization_id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => '2011-07-06 23:37:11',
			'modified'  => '2011-07-06 23:37:11'
		));
		$this->assertEqual($results, $expected);
	}
}
?>