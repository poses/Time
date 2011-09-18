<div class="timers form">
<?php echo $form->create('Timer');?>
	<fieldset>
 		<legend><?php __('Edit Timer');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('organization_id');
		echo $form->input('timer_category_id');
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('start');
		echo $form->input('end');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Timer.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Timer.id'))); ?></li>
		<li><?php echo $html->link(__('List Timers', true), array('action' => 'index'));?></li>
	</ul>
</div>
