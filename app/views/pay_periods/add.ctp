<div class="payPeriods form">
<?php echo $form->create('PayPeriod');?>
	<fieldset>
 		<legend><?php __('Add PayPeriod');?></legend>
	<?php
		echo $form->input('organization_id');
		echo $form->input('pay_period_type_id');
		echo $form->input('day');
		echo $form->input('week');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List PayPeriods', true), array('action' => 'index'));?></li>
	</ul>
</div>
