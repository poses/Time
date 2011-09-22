<?php
class UserGroup extends AppModel {
	var $name = 'UserGroup';
	var $displayField = 'name';
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'ParentUserGroup' => array(
			'className' => 'UserGroup',
			'foreignKey' => 'parent_user_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	var $hasMany = array(
		'ChildUserGroup' => array(
			'className' => 'UserGroup',
			'foreignKey' => 'parent_user_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'UserGroupMembership' => array(
			'className' => 'UserGroupMembership',
			'foreignKey' => 'user_group_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'user_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
}
?>
