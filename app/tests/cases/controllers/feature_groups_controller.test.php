<?php 
/* SVN FILE: $Id$ */
/* FeatureGroupsController Test cases generated on: 2011-07-07 00:38:55 : 1310017135*/
App::import('Controller', 'FeatureGroups');

class TestFeatureGroups extends FeatureGroupsController {
	var $autoRender = false;
}

class FeatureGroupsControllerTest extends CakeTestCase {
	var $FeatureGroups = null;

	function startTest() {
		$this->FeatureGroups = new TestFeatureGroups();
		$this->FeatureGroups->constructClasses();
	}

	function testFeatureGroupsControllerInstance() {
		$this->assertTrue(is_a($this->FeatureGroups, 'FeatureGroupsController'));
	}

	function endTest() {
		unset($this->FeatureGroups);
	}
}
?>