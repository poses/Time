<div class="users form">
<?php echo $form->create('User');?>
	<fieldset>
 		<legend><?php __(ucwords($organization['name']) . ' User Registration');?></legend>
	<?php
	    echo $session->flash('auth');

	    if(empty($organization)){
            echo $form->select('organization_id', $organizations, null, array('empty'=>'New Organization'));
	    }else{
    	    echo $form->input('organization_id', array('type' => 'hidden', 'value' => $organization['id']));
        }
		echo $form->input('name');
		echo $form->input('username');
		echo $form->input('email');
		echo $form->input('password');
		echo $form->input('password_confirmation', array('type' => 'password'));
		if($admin || $manager) {
		    echo $form->input('user_group');
            echo $form->input('active');
		}
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Users', true), array('action' => 'index'));?></li>
	</ul>
</div>
