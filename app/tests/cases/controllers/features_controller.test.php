<?php 
/* SVN FILE: $Id$ */
/* FeaturesController Test cases generated on: 2011-07-07 00:39:08 : 1310017148*/
App::import('Controller', 'Features');

class TestFeatures extends FeaturesController {
	var $autoRender = false;
}

class FeaturesControllerTest extends CakeTestCase {
	var $Features = null;

	function startTest() {
		$this->Features = new TestFeatures();
		$this->Features->constructClasses();
	}

	function testFeaturesControllerInstance() {
		$this->assertTrue(is_a($this->Features, 'FeaturesController'));
	}

	function endTest() {
		unset($this->Features);
	}
}
?>