<div class="organizations form">
<?php echo $form->create('Organization');?>
	<fieldset>
 		<legend><?php __('Add Organization');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('slug');
		echo $form->input('theme');
		echo $form->input('description');
	?>
	</fieldset>
<?php echo $form->end('Create');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Organizations', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Allowed Locations', true), array('controller' => 'allowed_locations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Allowed Location', true), array('controller' => 'allowed_locations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Denied Locations', true), array('controller' => 'denied_locations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Denied Location', true), array('controller' => 'denied_locations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Departments', true), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Department', true), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Pay Period Types', true), array('controller' => 'pay_period_types', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Pay Period Type', true), array('controller' => 'pay_period_types', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Pay Periods', true), array('controller' => 'pay_periods', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Pay Period', true), array('controller' => 'pay_periods', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Time Sheets', true), array('controller' => 'time_sheets', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Time Sheet', true), array('controller' => 'time_sheets', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Timer Categories', true), array('controller' => 'timer_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Timer Category', true), array('controller' => 'timer_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Timers', true), array('controller' => 'timers', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Timer', true), array('controller' => 'timers', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List User Groups', true), array('controller' => 'user_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User Group', true), array('controller' => 'user_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
