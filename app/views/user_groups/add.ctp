<div class="userGroups form">
<?php echo $form->create('UserGroup');?>
	<fieldset>
 		<legend><?php __('Add UserGroup');?></legend>
	<?php
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List UserGroups', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List User Groups', true), array('controller' => 'user_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Parent User Group', true), array('controller' => 'user_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List User Group Memberships', true), array('controller' => 'user_group_memberships', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User Group Membership', true), array('controller' => 'user_group_memberships', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
