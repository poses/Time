<div class="deniedLocations form">
<?php echo $form->create('DeniedLocation');?>
	<fieldset>
 		<legend><?php __('Edit DeniedLocation');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('organization_id');
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('type');
		echo $form->input('value');
		echo $form->input('active');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('DeniedLocation.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('DeniedLocation.id'))); ?></li>
		<li><?php echo $html->link(__('List DeniedLocations', true), array('action' => 'index'));?></li>
	</ul>
</div>
