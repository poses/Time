<div class="userGroupMemberships form">
<?php echo $form->create('UserGroupMembership');?>
	<fieldset>
 		<legend><?php __('Add UserGroupMembership');?></legend>
	<?php
		echo $form->input('user_id');
		echo $form->input('user_group_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List UserGroupMemberships', true), array('action' => 'index'));?></li>
	</ul>
</div>
