<div class="timerCategories form">
<?php echo $form->create('TimerCategory');?>
	<fieldset>
 		<legend><?php __('Add TimerCategory');?></legend>
	<?php
		echo $form->input('organization_id');
		echo $form->input('name');
		echo $form->input('description');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List TimerCategories', true), array('action' => 'index'));?></li>
	</ul>
</div>
