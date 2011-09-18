<div class="timeClocks form">
<?php echo $form->create('TimeClock');?>
	<fieldset>
 		<legend><?php __('Add TimeClock');?></legend>
	<?php
		echo $form->input('user_id');
		echo $form->input('in');
		echo $form->input('out');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List TimeClocks', true), array('action' => 'index'));?></li>
	</ul>
</div>
