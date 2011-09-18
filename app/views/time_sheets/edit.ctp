<div class="timeSheets form">
<?php echo $form->create('TimeSheet');?>
	<fieldset>
 		<legend><?php __('Edit TimeSheet');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('organization_id');
		echo $form->input('pay_period_id');
		echo $form->input('user_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('TimeSheet.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('TimeSheet.id'))); ?></li>
		<li><?php echo $html->link(__('List TimeSheets', true), array('action' => 'index'));?></li>
	</ul>
</div>
