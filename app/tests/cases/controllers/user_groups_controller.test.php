<?php 
/* SVN FILE: $Id$ */
/* UserGroupsController Test cases generated on: 2011-07-10 14:49:51 : 1310327391*/
App::import('Controller', 'UserGroups');

class TestUserGroups extends UserGroupsController {
	var $autoRender = false;
}

class UserGroupsControllerTest extends CakeTestCase {
	var $UserGroups = null;

	function startTest() {
		$this->UserGroups = new TestUserGroups();
		$this->UserGroups->constructClasses();
	}

	function testUserGroupsControllerInstance() {
		$this->assertTrue(is_a($this->UserGroups, 'UserGroupsController'));
	}

	function endTest() {
		unset($this->UserGroups);
	}
}
?>