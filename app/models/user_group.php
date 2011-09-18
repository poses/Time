<?php
class UserGroup extends AppModel {

	var $name = 'UserGroup';
	var $validate = array(
		'name' => array('notempty')
	);

}
?>
