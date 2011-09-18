<?php
class TimeClock extends AppModel {

	var $name = 'TimeClock';
	var $actsAs = 'Containable';
	var $validate = array(
		'user_id' => array(
		    'The user_id must not be empty.' => array(
                'rule' => 'notEmpty',
                'message' => 'The user_id must not be empty.'
		    ),
		),
		'organization_id' => array(
		    'The organization_id must not be empty.' => array(
                'rule' => 'notEmpty',
                'message' => 'The organization_id must not be empty.'
		    ),
		),
		'reason_code_id' => array(
		    'The reason_code_id must not be empty.' => array(
                'rule' => 'notEmpty',
                'message' => 'The reason_code_id must not be empty.'
		    ),
		),
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
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ReasonCode' => array(
			'className' => 'ReasonCode',
			'foreignKey' => 'reason_code_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>
