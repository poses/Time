<?php 
/* SVN FILE: $Id$ */
/* AllowedLocationsController Test cases generated on: 2011-07-10 23:07:41 : 1310357261*/
App::import('Controller', 'AllowedLocations');

class TestAllowedLocations extends AllowedLocationsController {
	var $autoRender = false;
}

class AllowedLocationsControllerTest extends CakeTestCase {
	var $AllowedLocations = null;

	function startTest() {
		$this->AllowedLocations = new TestAllowedLocations();
		$this->AllowedLocations->constructClasses();
	}

	function testAllowedLocationsControllerInstance() {
		$this->assertTrue(is_a($this->AllowedLocations, 'AllowedLocationsController'));
	}

	function endTest() {
		unset($this->AllowedLocations);
	}
}
?>