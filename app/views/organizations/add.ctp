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
    <?php echo $form->create('Organization', array('url'=>/*'http://'.env('HTTP_HOST').*/'/organizations/add'));?>

	    <fieldset>
     		<legend><?php __('Account Information',true);?></legend>
     		<div class="clearfix">
     		    <label for="OrganizationName"><?php echo __('Organization Name', true);?></label>
     		    <div class="input text">
     		        <?php echo $form->input('Organization.name', array('label'=>false, 'div'=>false));?>
     		        <span class="help-inline">What is your organizations name?</span>
     		    </div>
     		</div>
     		<div class="clearfix">
     		    <label for="OrganizationSlug"><?php echo __('Organization Slug', true);?></label>
     		    <div class="input text">
     		        <?php echo $form->input('Organization.slug', array('label'=>false, 'div'=>false));?>
     		        <span class="help-inline">This is used in the url.</span>
     		    </div>
     		</div>
     		<!--<div class="clearfix">
     		    <label for="OrganizationTheme"><?php echo __('Organization Theme', true);?></label>
     		    <div class="input text">
     		        <?php echo $form->input('Organization.theme', array('label'=>false, 'div'=>false));?>
     		        <span class="help-inline"></span>
     		    </div>
     		</div>-->
     		<div class="clearfix">
     		    <label for="OrganizationDescription"><?php echo __('Organization Description', true);?></label>
     		    <div class="input text">
     		        <?php echo $form->input('Organization.description', array('label'=>false, 'div'=>false));?>
     		        <span class="help-inline">What does your organization do?</span>
     		    </div>
     		</div>
     		<div class="actions">
                <?php echo $form->end(array('div'=>false, 'label'=>'Create','name'=>'Create', 'class'=>'btn large primary'));?>
                <button type="reset" class="btn small">Cancel</button>
            </div>
	    </fieldset>
	    
    </div>
</div>
