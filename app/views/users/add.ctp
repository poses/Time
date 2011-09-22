<div class="page-header">
	<h1><?php echo __('Create New Organization Account', true);?></h1>
</div>
<div class="row">
    <div class="span4 columns">
	    <h2>Plan Details</h2>
	    <p>Sign up for the <strong>Organization Plan</strong> ($20/mo).</p>

	    <br>
<!--
	    <div id="trustAgents"> 
		    <img src="/images/guarantee.png">
		    <br>
		    <span id="siteseal"><script type="text/javascript" src="https://seal.starfieldtech.com/getSeal?sealID=ap2lUzs3u4JFOCd4C1O9s5YbwUsGyOiwuko9EhPv8PhCFP6rhHj7Ix33gFyC"></script><img style="cursor:pointer;cursor:hand" width="132" height="31" src="https://seal.starfieldtech.com:443/images/3/siteseal_sf_3_h_l_m.gif" onclick="verifySeal();">
	    </span></div> 
-->

	    <h4>Guarantee</h4>
	    <p>We want you to be 100% satisfied with the service. There are no contracts and no obligations. If you are unhappy with the service for any reason, you may cancel your account at any time.</p>

    </div>
    <div class="span12 columns">
    <?php echo $form->create('User', array('action' => 'add'));?>
	    <fieldset>
	        <?php if(isset($organization['name'])):?>
     		    <legend><?php __(ucwords($organization['name']) . ' Account Information');?></legend>
     		<?php else:?>
     		    <legend><?php __('Account Information');?></legend>
     		<?php endif;?>
     		<div class="clearfix">
	            <?php
	                if(!isset($organization)){
                        echo $form->select('organization_id', $organizations, null, array('class'=>'input', 'empty'=>'New Organization'));
	                }else{
                	    echo $form->input('organization_id', array('type' => 'hidden', 'value' => $organization['id']));
                    }
                    echo $form->input('favorite_food', array('type' => 'hidden', 'value' => ''));
                ?>
            </div>
            <div class="clearfix">
     		    <label for="UserFirstName"><?php echo __('First Name', true);?></label>
     		    <div class="input text">
         		    <?php echo $form->input('User.first_name', array('label'=>false, 'div'=>false, 'placeholder'=>'John'));?>
         		    <span class="help-inline"></span>
     		    </div>
     		</div>
     		<div class="clearfix">
     		    <label for="UserLastName"><?php echo __('Last Name', true);?></label>
     		    <div class="input text">
     		        <?php echo $form->input('User.last_name', array('label'=>false,'div'=>false, 'placeholder'=>'Doe'));?>
     		        <span class="help-inline"></span>
     		    </div>
     		</div>
     		<div class="clearfix">
     		    <label for="UserUsername"><?php echo __('Username', true);?></label>
     		    <div class="input text">
     		        <?php echo $form->input('User.username', array('label'=>false,'div'=>false, 'placeholder'=>'JohnDoe'));?>
     		        <span class="help-inline"></span>
     		    </div>
     		</div>
     		<div class="clearfix">
     		    <label for="UserEmail"><?php echo __('Email', true);?></label>
     		    <div class="input text">
     		        <?php echo $form->input('User.email', array('label'=>false,'div'=>false, 'placeholder'=>'john@example.com'));?>
     		        <span class="help-inline"></span>
     		    </div>
     		</div>
     		<div class="clearfix">
     		    <label for="UserEmailConfirmation"><?php echo __('Confirm Email', true);?></label>
     		    <div class="input text">
     		        <?php echo $form->input('User.email_confirmation', array('label'=>false,'div'=>false, 'placeholder'=>'Match Email'));?>
     		        <span class="help-inline"></span>
     		    </div>
     		</div>
     		<div class="clearfix">
     		    <label for="UserPassword"><?php echo __('Password', true);?></label>
     		    <div class="input text">
     		        <?php echo $form->input('User.password', array('label'=>false,'div'=>false, 'placeholder'=>'no restrictions'));?>
     		        <span class="help-inline"></span>
     		    </div>
     		</div>
     		<div class="clearfix">
     		    <label for="UserPasswordConfirmation"><?php echo __('Confirm Pass', true);?></label>
     		    <div class="input text">
     		        <?php echo $form->input('User.password_confirmation', array('label'=>false, 'div'=>false, 'type'=>'password', 'placeholder'=>'Match Password'));?>
     		        <span class="help-inline"></span>
     		    </div>
     		</div>
     		<!--
            <?php if($admin || $manager):?>
		        <div class="clearfix">
         		    <label for="UserUserGroup"><?php echo __('User Group', true);?></label>
         		    <?php echo $form->input('User.user_group', array('label'=>false));?>
         		</div>
         		<div class="clearfix">
         		    <label for="UserActive"><?php echo __('Active', true);?></label>
         		    <?php echo $form->input('User.active', array('label'=>false));?>
         		</div>
		    <?php endif;?>
		    -->
		    <div class="actions">
                <?php echo $form->end(array('div'=>false, 'label'=>'Register','name'=>'Register', 'class'=>'btn large success'));?>
                <button type="reset" class="btn small">Cancel</button>
            </div>
	    </fieldset>
        
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.error-message').each(function(){           
            $('.help-inline', $(this).parent()).text($(this).text());
            $(this).parent().parent().addClass('error');
            $(this).remove();
        });
        var fields = {
                'UserFirstName':/^[a-z]{2,}$/i, 
                'UserLastName':/^[a-z]{2,}$/i, 
                'UserUsername':/^[a-z]{2,}$/i, 
                'UserEmail':/^([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+$/i, 
                'UserEmailConfirmation':'match', 
                'UserPassword':/^.*$/i, 
                'UserPasswordConfirmation':'match'
        };
        var preventDefault = true;
        $('input[name="Register"]').click(function(event){
            if(preventDefault){
                event.preventDefault();
            }
            
            var errors={};
            for(var i in fields){
                var j = $('#'+i),
                    k = i.replace(/confirmation/i, '');
                j.parent().parent().removeClass('error');
                $('.help-inline', j.parent()).text('looks good');
                
                if(!(j.val().length > 0 && fields[i] !== 'match' && fields[i].test(j.val()))){
                    errors[i] = true;
                    j.parent().parent().addClass('error');
                    
                    $('.help-inline', j.parent()).text('Error');
                }
                if(fields[i] === 'match'){
                    if(j.val().length > 0 && j.val() === $('#'+k).val()){
                        if(fields[k].test(j.val())){
                            j.parent().parent().removeClass('error');
                            $('.help-inline', j.parent()).text('looks good');
                            for(var err in errors){
                                if(err == i){
                                    delete errors[i];
                                }
                            }
                        }
                    }else{
                        j.parent().parent().addClass('error');
                        $('.help-inline', j.parent()).text(k.replace(/User/i, '') + 's do not match!');
                        errors[i] = true;
                    }
                    
                }
            }

            if(Object.keys(errors).length > 0){
                return false;
            }else{
                if(event.isDefaultPrevented != undefined){
                    if(event.isDefaultPrevented()){
                        preventDefault = false;
                    }
                }
            }
            return true;
        });
    });
</script>
