<?php
class Feature extends AppModel {

	var $name = 'Feature';
	var $validate = array(
		'name' => array('numeric'),
		'active' => array('numeric')
	);

}
?>