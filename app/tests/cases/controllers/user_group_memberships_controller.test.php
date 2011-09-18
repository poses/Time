<?php 
/* SVN FILE: $Id$ */
/* UserGroupMembershipsController Test cases generated on: 2011-07-10 14:53:44 : 1310327624*/
App::import('Controller', 'UserGroupMemberships');

class TestUserGroupMemberships extends UserGroupMembershipsController {
	var $autoRender = false;
}

class UserGroupMembershipsControllerTest extends CakeTestCase {
	var $UserGroupMemberships = null;

	function startTest() {
		$this->UserGroupMemberships = new TestUserGroupMemberships();
		$this->UserGroupMemberships->constructClasses();
	}

	function testUserGroupMembershipsControllerInstance() {
		$this->assertTrue(is_a($this->UserGroupMemberships, 'UserGroupMembershipsController'));
	}

	function endTest() {
		unset($this->UserGroupMemberships);
	}
}
?>