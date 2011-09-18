<div class="featureGroups form">
<?php echo $form->create('FeatureGroup');?>
	<fieldset>
 		<legend><?php __('Add FeatureGroup');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('value');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List FeatureGroups', true), array('action' => 'index'));?></li>
	</ul>
</div>
