<div class="page-header">
    <h1><?php echo __('User Login', true);?></h1>
</div>
<div class="row">
    <div class="span4 columns">
		<p>Don't have an account? Go to the <a href="/pro-plan/">Pro Plan</a> page to sign up.</p>
		<div id="trustAgents"> 
			<img src="/img/lock_closed.png">
			<br><br>
		</div> 
    </div>
    <div class="span12 columns login-form">
    <?php echo $form->create('User', array('url'=>/*'http://'.env('HTTP_HOST').*/'/users/login'));?>

	    <fieldset>
     		<legend><?php __('Login to your account',true);?></legend>
     		<?php if(!empty($organization)):?>
     		    <?php echo $form->input('organization_id', array('type' => 'hidden', 'value' => $organization['id']));?>
     		<?php endif;?>
     		<div class="clearfix">
     		    <label for="UserUsername"><?php echo __('Username', true);?></label>
     		    <?php echo $form->input('User.username', array('label'=>false));?>
     		</div>
     		<div class="clearfix">
     		    <label for="UserPassword"><?php echo __('Password', true);?></label>
     		    <?php echo $form->input('User.password', array('label'=>false));?>
     		</div>
     		<div class="clearfix">
     		    <label for="UserURememberMe"><?php echo __('Remember Me', true);?></label>
     		    <?php echo $form->input('User.remember_me', array('label'=>false, 'type'=>'checkbox'));?>
     		</div>
     		<div class="actions">
                <?php echo $form->end(array('div'=>false, 'label'=>'Login','name'=>'Login', 'class'=>'btn large primary'));?>
                <button type="reset" class="btn small">Cancel</button>
            </div>
	    </fieldset>
	    
    </div>
</div>

