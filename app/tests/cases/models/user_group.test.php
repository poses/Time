<?php 
/* SVN FILE: $Id$ */
/* UserGroup Test cases generated on: 2011-07-07 00:23:48 : 1310016228*/
App::import('Model', 'UserGroup');

class UserGroupTestCase extends CakeTestCase {
	var $UserGroup = null;
	var $fixtures = array('app.user_group');

	function startTest() {
		$this->UserGroup =& ClassRegistry::init('UserGroup');
	}

	function testUserGroupInstance() {
		$this->assertTrue(is_a($this->UserGroup, 'UserGroup'));
	}

	function testUserGroupFind() {
		$this->UserGroup->recursive = -1;
		$results = $this->UserGroup->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('UserGroup' => array(
			'id'  => 1,
			'organization_id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'active'  => 1,
			'created'  => '2011-07-07 00:23:48',
			'modified'  => '2011-07-07 00:23:48'
		));
		$this->assertEqual($results, $expected);
	}
}
?>