<div class="allowedLocations form">
<?php echo $form->create('AllowedLocation');?>
	<fieldset>
 		<legend><?php __('Add AllowedLocation');?></legend>
	<?php
		echo $form->input('organization_id');
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('value');
		echo $form->input('default');
		echo $form->input('active');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List AllowedLocations', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
