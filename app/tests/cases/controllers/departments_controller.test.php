<?php 
/* SVN FILE: $Id$ */
/* DepartmentsController Test cases generated on: 2011-07-07 00:38:29 : 1310017109*/
App::import('Controller', 'Departments');

class TestDepartments extends DepartmentsController {
	var $autoRender = false;
}

class DepartmentsControllerTest extends CakeTestCase {
	var $Departments = null;

	function startTest() {
		$this->Departments = new TestDepartments();
		$this->Departments->constructClasses();
	}

	function testDepartmentsControllerInstance() {
		$this->assertTrue(is_a($this->Departments, 'DepartmentsController'));
	}

	function endTest() {
		unset($this->Departments);
	}
}
?>