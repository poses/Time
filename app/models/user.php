<?php
class User extends AppModel {

	var $name = 'User';
	var $displayField = 'name';
	
	var $validate = array(
		'first_name' => array(
		    'Please enter your first name.' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter your first name.',
                'required' => true,

		    ),
		    'Your first name can only contain letters found in the alphabet.'=>array(
		        'rule' => array('custom', '/^[a-z]*$/i'),
		        'message'=>'Your first name can only contain letters found in the alphabet.',
		        'required'=> true,
		        'on'=>'create',
		    ),
		    'between_2_32' => array(
                'rule' => array('between', 2, 32),
                'message' => 'The name must be between 2 and 32 characters.',
                'required'=> true,

		    ),
		),
		'last_name' => array(
		    'Please enter your last name.' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter your last name.',
                'required'=> true,

		    ),
		    'Your last name can only contain letters found in the alphabet.'=>array(
		        'rule' => array('custom', '/^[a-z]*$/i'),
		        'required'=> true,

		    ),
		    'between_2_32' => array(
                'rule' => array('between', 2, 32),
                'message' => 'The name must be between 2 and 32 characters.',
                'required'=> true,

		    ),
		),
		'username' => array(
		    'between_4_32' => array(
                'rule' => array('between', 4, 32),
                'message' => 'The username must be between 4 and 32 characters.',
                'required'=> true,

		    ),
		    'unique' => array(
                'rule' => 'isUnique',
                'message' => 'That username is already taken.',
                'required'=> true,

		    ),
		    'alphanumeric'=>array(
		        'rule' => array('custom', '/^[a-z0-9]*$/i'),
		        'message'=>'The username can only contain letters and numbers, it must also start with a letter.',
		        'required'=> true,

		    )
		),
		'email' => array(
		    'Please enter a valid email.' => array(
                'rule' => 'email',
                'message' => 'Please enter a valid email.',
                'required'=> true,

		    ),
		    'The emails do not match.' => array(
			    'rule' => 'matchEmails',
			    'message' => 'The emails do not match.',
			    'on'=>'create',

			),
		),
		'password' => array(
		    'The password must be at least 8 characters.' => array(
                'rule' => 'notEmpty',
                'message' => 'The can not be empty.',
                'on' => 'create',
            ),
            'The passwords do not match.' => array(
                'rule' => 'matchPasswords',
                'message' => 'The passwords do not match.',
                'on'=>'create'
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
		/*'Employee' => array(
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
		),*/
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
		'UserGroupMembership' => array(
			'className' => 'UserGroupMembership',
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
	function notEmpty($data){
	    foreach($data as $key => $value){
	        $_data = trim($data[$key]);
	        if(empty($_data)){
	            return FALSE;
	        }
	    }
	    return TRUE;
	}

	function beforeValidate(){
	    //trim spaces from data before validation occurs
	    foreach($this->data[$this->name] as $key => $value){
	        if(!is_array($value)){
	            $this->data[$this->name][$key] = trim($value);
	        }	        
	    }
	    return true;
	}
	function matchPasswords($data) {
        if(!empty($this->data['User']['password_confirmation'])){
            if($data['password'] == Security::hash($this->data['User']['password_confirmation'], null, TRUE)){
                unset($this->data['User']['password_confirmation']);
                return TRUE;
            }
        }
        unset($this->data['User']['password_confirmation']);
        $this->invalidate('password_confirmation', 'The passwords do not match.');
        return FALSE;
	}

    function hashPasswords($data) {
        if(isset($data['User']['password'])) {
            $data['User']['password'] = Security::hash($data['User']['password'], null, TRUE);
            return $data;
        }
        return $data;
    }
    
    function matchEmails($data) {
        if($data['email'] == $this->data['User']['email_confirmation']){
            unset($this->data['User']['email_confirmation']);
            return TRUE;
        }
        unset($this->data['User']['email_confirmation']);
        $this->invalidate('email_confirmation', 'The emails do not match.');
        return FALSE;
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
