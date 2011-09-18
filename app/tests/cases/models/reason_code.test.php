<?php 
/* SVN FILE: $Id$ */
/* ReasonCode Test cases generated on: 2011-07-09 13:42:40 : 1310236960*/
App::import('Model', 'ReasonCode');

class ReasonCodeTestCase extends CakeTestCase {
	var $ReasonCode = null;
	var $fixtures = array('app.reason_code');

	function startTest() {
		$this->ReasonCode =& ClassRegistry::init('ReasonCode');
	}

	function testReasonCodeInstance() {
		$this->assertTrue(is_a($this->ReasonCode, 'ReasonCode'));
	}

	function testReasonCodeFind() {
		$this->ReasonCode->recursive = -1;
		$results = $this->ReasonCode->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('ReasonCode' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'organization_id'  => 'Lorem ipsum dolor sit amet',
			'name'  => 'Lorem ipsum dolor sit amet',
			'description'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created'  => '2011-07-09 13:42:40',
			'modified'  => '2011-07-09 13:42:40'
		));
		$this->assertEqual($results, $expected);
	}
}
?>