<div class="userAllowedLocations form">
<?php echo $form->create('UserAllowedLocation');?>
	<fieldset>
 		<legend><?php __('Edit UserAllowedLocation');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('allowed_location_id');
		echo $form->input('user_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('UserAllowedLocation.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('UserAllowedLocation.id'))); ?></li>
		<li><?php echo $html->link(__('List UserAllowedLocations', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Allowed Locations', true), array('controller' => 'allowed_locations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Allowed Location', true), array('controller' => 'allowed_locations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
