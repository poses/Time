<div class="features form">
<?php echo $form->create('Feature');?>
	<fieldset>
 		<legend><?php __('Add Feature');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('active');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Features', true), array('action' => 'index'));?></li>
	</ul>
</div>
