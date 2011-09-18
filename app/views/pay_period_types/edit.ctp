<div class="payPeriodTypes form">
<?php echo $form->create('PayPeriodType');?>
	<fieldset>
 		<legend><?php __('Edit PayPeriodType');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('organization_id');
		echo $form->input('name');
		echo $form->input('description');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('PayPeriodType.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('PayPeriodType.id'))); ?></li>
		<li><?php echo $html->link(__('List PayPeriodTypes', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Pay Periods', true), array('controller' => 'pay_periods', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Pay Period', true), array('controller' => 'pay_periods', 'action' => 'add')); ?> </li>
	</ul>
</div>
