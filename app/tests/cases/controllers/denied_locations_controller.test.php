<?php 
/* SVN FILE: $Id$ */
/* DeniedLocationsController Test cases generated on: 2011-07-07 00:38:16 : 1310017096*/
App::import('Controller', 'DeniedLocations');

class TestDeniedLocations extends DeniedLocationsController {
	var $autoRender = false;
}

class DeniedLocationsControllerTest extends CakeTestCase {
	var $DeniedLocations = null;

	function startTest() {
		$this->DeniedLocations = new TestDeniedLocations();
		$this->DeniedLocations->constructClasses();
	}

	function testDeniedLocationsControllerInstance() {
		$this->assertTrue(is_a($this->DeniedLocations, 'DeniedLocationsController'));
	}

	function endTest() {
		unset($this->DeniedLocations);
	}
}
?>