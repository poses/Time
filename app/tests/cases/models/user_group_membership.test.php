<?php 
/* SVN FILE: $Id$ */
/* UserGroupMembership Test cases generated on: 2011-07-07 00:24:00 : 1310016240*/
App::import('Model', 'UserGroupMembership');

class UserGroupMembershipTestCase extends CakeTestCase {
	var $UserGroupMembership = null;
	var $fixtures = array('app.user_group_membership');

	function startTest() {
		$this->UserGroupMembership =& ClassRegistry::init('UserGroupMembership');
	}

	function testUserGroupMembershipInstance() {
		$this->assertTrue(is_a($this->UserGroupMembership, 'UserGroupMembership'));
	}

	function testUserGroupMembershipFind() {
		$this->UserGroupMembership->recursive = -1;
		$results = $this->UserGroupMembership->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('UserGroupMembership' => array(
			'id'  => 1,
			'user_id'  => 1,
			'user_group_id'  => 1,
			'created'  => '2011-07-07 00:24:00',
			'modified'  => '2011-07-07 00:24:00'
		));
		$this->assertEqual($results, $expected);
	}
}
?>