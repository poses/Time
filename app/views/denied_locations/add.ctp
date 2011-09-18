<div class="deniedLocations form">
<?php echo $form->create('DeniedLocation');?>
	<fieldset>
 		<legend><?php __('Add DeniedLocation');?></legend>
	<?php
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
		<li><?php echo $html->link(__('List DeniedLocations', true), array('action' => 'index'));?></li>
	</ul>
</div>
