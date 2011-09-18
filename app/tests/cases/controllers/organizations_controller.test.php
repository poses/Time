<?php 
/* SVN FILE: $Id$ */
/* OrganizationsController Test cases generated on: 2011-07-07 00:58:44 : 1310018324*/
App::import('Controller', 'Organizations');

class TestOrganizations extends OrganizationsController {
	var $autoRender = false;
}

class OrganizationsControllerTest extends CakeTestCase {
	var $Organizations = null;

	function startTest() {
		$this->Organizations = new TestOrganizations();
		$this->Organizations->constructClasses();
	}

	function testOrganizationsControllerInstance() {
		$this->assertTrue(is_a($this->Organizations, 'OrganizationsController'));
	}

	function endTest() {
		unset($this->Organizations);
	}
}
?>