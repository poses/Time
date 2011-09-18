<?php
class User extends AppModel {

	var $name = 'User';
	var $displayField = 'name';
	
	var $validate = array(
		'user_group_id' => array('notEmpty'),
		'name' => array(
		    'Please enter your name.' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter your name.',
		    ),
		    'Your name can only contain letters found in the alphabet.'=>array(
		        'rule' => array('custom', '/^[a-z]*$/i'),
		    ),
		    'between_2_32' => array(
                'rule' => array('between', 2, 32),
                'message' => 'The name must be between 2 and 32 characters.'
		    ),
		),
		'username' => array(
		    'between_4_32' => array(
                'rule' => array('between', 4, 32),
                'message' => 'The username must be between 4 and 32 characters.'
		    ),
		    'unique' => array(
                'rule' => 'isUnique',
                'message' => 'That username is already taken.'
		    ),
		    'alphanumeric'=>array(
		        'rule' => array('custom', '/^[a-z0-9]*$/i'),
		    )
		),
		'email' => array(
		    'Please enter a valid email.' => array(
                'rule' => 'email',
                'message' => 'Please enter a valid email.',
		    )
		),
		'password' => array(
            'The password must not be empty' => array(
                'rule' => 'notEmpty',
                'message' => 'The password must not be empty.',
            ),
            'The passwords do not match.' => array(
                'rule' => 'matchPasswords',
                'message' => 'The passwords do not match.',
            ),
		),
		
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
		'UserGroup' => array(
			'className' => 'UserGroup',
			'foreignKey' => 'user_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
    var $hasOne = array(
        'UserActivation' => array(
			'className' => 'UserActivation',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
    );
	var $hasMany = array(
		'Employee' => array(
			'className' => 'Employee',
			'foreignKey' => 'user_id',
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
		'TimeClock' => array(
			'className' => 'TimeClock',
			'foreignKey' => 'user_id',
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
		'TimeSheet' => array(
			'className' => 'TimeSheet',
			'foreignKey' => 'user_id',
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
		'UserAllowedLocation' => array(
			'className' => 'UserAllowedLocation',
			'foreignKey' => 'user_id',
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
	);
	function notEmpty($data){debug($this);
	    foreach($data as $key => $value){
	        $_data = trim($data[$key]);
	        if(empty($_data)){
	            return FALSE;
	        }
	    }
	    return TRUE;
	}
	function matchPasswords($data) {
        if($data['password'] == Security::hash($this->data['User']['password_confirmation'], 'sha256', TRUE)){
            unset($this->data['User']['password_confirmation']);
            return TRUE;
        }
        $this->invalidate('password_confirmation', 'The passwords do not match.');
        return FALSE;
	}
    function hashPasswords($data) {
        if(isset($data['User']['password'])) {
            $data['User']['password'] = Security::hash($data['User']['password'], 'sha256', TRUE);
            return $data;
        }
        return $data;
    }
    function beforeSave() {
        $this->hashPasswords(NULL, TRUE);
        return TRUE;
    }
    function getActivationHash() {
        if(!isset($this->id)) {
            return false;
        }
        return Security::hash(Configure::read('Security.salt') . $this->field('created').date('Ymd')); //hash good for one day
    }
}
?>
