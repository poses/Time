<?php 
/* SVN FILE: $Id$ */
/* Timer Test cases generated on: 2011-07-06 23:37:03 : 1310013423*/
App::import('Model', 'Timer');

class TimerTestCase extends CakeTestCase {
	var $Timer = null;
	var $fixtures = array('app.timer');

	function startTest() {
		$this->Timer =& ClassRegistry::init('Timer');
	}

	function testTimerInstance() {
		$this->assertTrue(is_a($this->Timer, 'Timer'));
	}

	function testTimerFind() {
		$this->Timer->recursive = -1;
		$results = $this->Timer->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Timer' => array(
			'id'  => 1,
			'organization_id'  => 1,
			'timer_category_id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'start'  => '2011-07-06 23:37:03',
			'end'  => '2011-07-06 23:37:03',
			'created'  => '2011-07-06 23:37:03',
			'modified'  => '2011-07-06 23:37:03'
		));
		$this->assertEqual($results, $expected);
	}
}
?>