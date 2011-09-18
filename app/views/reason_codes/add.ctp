<div class="reasonCodes form">
<?php echo $form->create('ReasonCode');?>
	<fieldset>
 		<legend><?php __('Add ReasonCode');?></legend>
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
		<li><?php echo $html->link(__('List ReasonCodes', true), array('action' => 'index'));?></li>
	</ul>
</div>
