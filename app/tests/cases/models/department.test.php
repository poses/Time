<?php 
/* SVN FILE: $Id$ */
/* Department Test cases generated on: 2011-07-07 00:34:10 : 1310016850*/
App::import('Model', 'Department');

class DepartmentTestCase extends CakeTestCase {
	var $Department = null;
	var $fixtures = array('app.department');

	function startTest() {
		$this->Department =& ClassRegistry::init('Department');
	}

	function testDepartmentInstance() {
		$this->assertTrue(is_a($this->Department, 'Department'));
	}

	function testDepartmentFind() {
		$this->Department->recursive = -1;
		$results = $this->Department->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Department' => array(
			'id'  => 1,
			'organization_id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'level'  => 1,
			'created'  => '2011-07-07 00:34:09',
			'modified'  => '2011-07-07 00:34:09'
		));
		$this->assertEqual($results, $expected);
	}
}
?>