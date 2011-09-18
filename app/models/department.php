<?php
class Department extends AppModel {

	var $name = 'Department';
	var $validate = array(
		'organization_id' => array('numeric'),
		'name' => array('notempty'),
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

	var $hasMany = array(
		'Employee' => array(
			'className' => 'Employee',
			'foreignKey' => 'department_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>