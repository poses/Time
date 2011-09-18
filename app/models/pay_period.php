<?php
class PayPeriod extends AppModel {

	var $name = 'PayPeriod';
	var $validate = array(
		'organization_id' => array('numeric'),
		'pay_period_type_id' => array('numeric'),
		'day' => array('numeric'),
		'week' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PayPeriodType' => array(
			'className' => 'PayPeriodType',
			'foreignKey' => 'pay_period_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'TimeSheet' => array(
			'className' => 'TimeSheet',
			'foreignKey' => 'pay_period_id',
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