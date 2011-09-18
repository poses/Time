<?php
class UserAllowedLocation extends AppModel {

	var $name = 'UserAllowedLocation';
	var $validate = array(
		'allowed_location_id' => array('notempty'),
		'user_id' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'AllowedLocation' => array(
			'className' => 'AllowedLocation',
			'foreignKey' => 'allowed_location_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>