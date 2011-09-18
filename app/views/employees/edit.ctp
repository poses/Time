<div class="employees form">
<?php echo $form->create('Employee');?>
	<fieldset>
 		<legend><?php __('Edit Employee');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('user_id');
		echo $form->input('department_id');
		echo $form->input('badge_number');
		echo $form->input('pay_type');
		echo $form->input('pay_frequency');
		echo $form->input('pay_rate');
		echo $form->input('time_type');
		echo $form->input('federal_filing_status');
		echo $form->input('federal_exemptions');
		echo $form->input('withhold_additional_amount');
		echo $form->input('withhold_additional_percent');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Employee.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Employee.id'))); ?></li>
		<li><?php echo $html->link(__('List Employees', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Departments', true), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Department', true), array('controller' => 'departments', 'action' => 'add')); ?> </li>
	</ul>
</div>
