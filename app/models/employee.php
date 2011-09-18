<?php
class Employee extends AppModel {

	var $name = 'Employee';
	var $validate = array(
		'user_id' => array('numeric'),
		'department_id' => array('numeric'),
		'badge_number' => array('notempty'),
		'pay_type' => array('notempty'),
		'pay_frequency' => array('notempty'),
		'time_type' => array('notempty'),
		'federal_filing_status' => array('notempty'),
		'federal_exemptions' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'department_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>