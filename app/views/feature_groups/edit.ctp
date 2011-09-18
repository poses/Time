<div class="featureGroups form">
<?php echo $form->create('FeatureGroup');?>
	<fieldset>
 		<legend><?php __('Edit FeatureGroup');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('value');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('FeatureGroup.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('FeatureGroup.id'))); ?></li>
		<li><?php echo $html->link(__('List FeatureGroups', true), array('action' => 'index'));?></li>
	</ul>
</div>
