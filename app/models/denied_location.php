<?php
class DeniedLocation extends AppModel {

	var $name = 'DeniedLocation';
	var $validate = array(
		'organization_id' => array('numeric'),
		'name' => array('notempty'),
		'type' => array('notempty'),
		'value' => array('notempty'),
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