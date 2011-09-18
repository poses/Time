<?php 
/* SVN FILE: $Id$ */
/* User Test cases generated on: 2011-07-07 00:23:31 : 1310016211*/
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
	var $User = null;
	var $fixtures = array('app.user');

	function startTest() {
		$this->User =& ClassRegistry::init('User');
	}

	function testUserInstance() {
		$this->assertTrue(is_a($this->User, 'User'));
	}

	function testUserFind() {
		$this->User->recursive = -1;
		$results = $this->User->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('User' => array(
			'id'  => 1,
			'organization_id'  => 1,
			'user_group_id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'username'  => 'Lorem ipsum dolor sit amet',
			'email'  => 'Lorem ipsum dolor sit amet',
			'password'  => 'Lorem ipsum dolor sit amet',
			'active'  => 1,
			'created'  => '2011-07-07 00:23:28',
			'modified'  => '2011-07-07 00:23:28'
		));
		$this->assertEqual($results, $expected);
	}
}
?>