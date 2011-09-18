<?php
class AllowedLocation extends AppModel {

	var $name = 'AllowedLocation';
	var $validate = array(
		'organization_id' => array('notempty'),
		'name' => array('notempty'),
		'value' => array('notempty'),
		'default' => array('numeric'),
		'active' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>
