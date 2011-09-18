<div class="userGroupMemberships form">
<?php echo $form->create('UserGroupMembership');?>
	<fieldset>
 		<legend><?php __('Edit UserGroupMembership');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('user_id');
		echo $form->input('user_group_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('UserGroupMembership.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('UserGroupMembership.id'))); ?></li>
		<li><?php echo $html->link(__('List UserGroupMemberships', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List User Groups', true), array('controller' => 'user_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User Group', true), array('controller' => 'user_groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
