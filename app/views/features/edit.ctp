<div class="features form">
<?php echo $form->create('Feature');?>
	<fieldset>
 		<legend><?php __('Edit Feature');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('active');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Feature.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Feature.id'))); ?></li>
		<li><?php echo $html->link(__('List Features', true), array('action' => 'index'));?></li>
	</ul>
</div>
