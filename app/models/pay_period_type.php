<?php
class PayPeriodType extends AppModel {

	var $name = 'PayPeriodType';
	var $validate = array(
		'organization_id' => array('numeric'),
		'name' => array('notempty')
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
		'PayPeriod' => array(
			'className' => 'PayPeriod',
			'foreignKey' => 'pay_period_type_id',
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