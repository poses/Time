<?php 
/* SVN FILE: $Id$ */
/* UserAllowedLocation Test cases generated on: 2011-07-09 03:47:50 : 1310201270*/
App::import('Model', 'UserAllowedLocation');

class UserAllowedLocationTestCase extends CakeTestCase {
	var $UserAllowedLocation = null;
	var $fixtures = array('app.user_allowed_location');

	function startTest() {
		$this->UserAllowedLocation =& ClassRegistry::init('UserAllowedLocation');
	}

	function testUserAllowedLocationInstance() {
		$this->assertTrue(is_a($this->UserAllowedLocation, 'UserAllowedLocation'));
	}

	function testUserAllowedLocationFind() {
		$this->UserAllowedLocation->recursive = -1;
		$results = $this->UserAllowedLocation->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('UserAllowedLocation' => array(
			'id'  => 'Lorem ipsum dolor sit amet',
			'allowed_location_id'  => 'Lorem ipsum dolor sit amet',
			'user_id'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2011-07-09 03:47:50',
			'modified'  => '2011-07-09 03:47:50'
		));
		$this->assertEqual($results, $expected);
	}
}
?>