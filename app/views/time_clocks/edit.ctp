<div class="timeClocks form">
<?php echo $form->create('TimeClock');?>
	<fieldset>
 		<legend><?php __('Edit TimeClock');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('user_id');
		echo $form->input('in');
		echo $form->input('out');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('TimeClock.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('TimeClock.id'))); ?></li>
		<li><?php echo $html->link(__('List TimeClocks', true), array('action' => 'index'));?></li>
	</ul>
</div>
