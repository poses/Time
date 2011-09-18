<?php 
/* SVN FILE: $Id$ */
/* EmployeesController Test cases generated on: 2011-07-07 00:38:43 : 1310017123*/
App::import('Controller', 'Employees');

class TestEmployees extends EmployeesController {
	var $autoRender = false;
}

class EmployeesControllerTest extends CakeTestCase {
	var $Employees = null;

	function startTest() {
		$this->Employees = new TestEmployees();
		$this->Employees->constructClasses();
	}

	function testEmployeesControllerInstance() {
		$this->assertTrue(is_a($this->Employees, 'EmployeesController'));
	}

	function endTest() {
		unset($this->Employees);
	}
}
?>