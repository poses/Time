<?php 
/* SVN FILE: $Id$ */
/* UserAllowedLocationsController Test cases generated on: 2011-07-10 23:09:56 : 1310357396*/
App::import('Controller', 'UserAllowedLocations');

class TestUserAllowedLocations extends UserAllowedLocationsController {
	var $autoRender = false;
}

class UserAllowedLocationsControllerTest extends CakeTestCase {
	var $UserAllowedLocations = null;

	function startTest() {
		$this->UserAllowedLocations = new TestUserAllowedLocations();
		$this->UserAllowedLocations->constructClasses();
	}

	function testUserAllowedLocationsControllerInstance() {
		$this->assertTrue(is_a($this->UserAllowedLocations, 'UserAllowedLocationsController'));
	}

	function endTest() {
		unset($this->UserAllowedLocations);
	}
}
?>