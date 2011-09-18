<?php
class FeatureGroup extends AppModel {

	var $name = 'FeatureGroup';
	var $validate = array(
		'name' => array('notempty')
	);

}
?>