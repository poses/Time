<div class="users form">
<?php echo $form->create('User', array('action' => 'login'));?>
	<fieldset>
 		<legend><?php __(ucwords($organization['name']) . ' User Login');?></legend>
	<?php
	    echo $session->flash('auth');
	    echo $session->flash();
    	echo $form->input('organization_id', array('type' => 'hidden', 'value' => $organization['id']));
		echo $form->input('username');
		echo $form->input('password');
		echo $form->input('remember_me', array('label' => 'Remember Me', 'type' => 'checkbox'));
	?>
	</fieldset>
<?php echo $form->end('Login');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Users', true), array('action' => 'index'));?></li>
	</ul>
</div>
