<script>
    $(document).ready(function(){
        $(".welcome-user").hover(function(){
            var welcome = this;
            $('a', this).hover(function(){
                $('.label', welcome).addClass('important');
            }, function(){
                $('.label', welcome).removeClass('important');
            });
            $('.label', this).hover(function(){
                $(this).addClass('success').css('cursor', 'pointer');
                $(this).click(function(){
                    window.location = '/users/profile';
                })
            },function(){$(this).removeClass('success');});
        },function(){
        
        });
        
    })
</script>
<?php
    if($this->Session->check('Auth.User')){

        echo "<li class='welcome-user span6'><span class='label username' title='".$this->Session->read('Auth.User.client_ip')."'>" . $this->Session->read('Auth.User.username') . '</span>' . $html->link('logout', 
            array(
                'controller' => 'users',
                'action' => 'logout',            
            ),
            array(
                'div' => false, 
                'style'=>'display:inline-block'
            )
        );
        echo "</li>";
    }else{
        if($this->params['url']['url'] != 'users/add'){
            echo '<li><a href="/users/add">Register</a></li>';
            echo '<li>';
            echo $this->Form->create('User', array(
                'url'=>'/users/login',
                'inputDefaults' => array(
                    'label' => false,
                    'div'   => false,
                    # define error defaults for the form
                    'error' => array(
                        'wrap'  => 'span', 
                        'class' => 'my-error-class'
                    )
                )
            ));
            if(isset($organization)){
                echo $form->input('organization_id', array('type' => 'hidden', 'value' => $organization['id']));
            }
            
            echo $form->input('username', array('class'=>'input-small', 'div'=>false, 'label' => false, 'placeholder'=>'Username'));
            echo $form->input('password', array('class'=>'input-small', 'div'=>false, 'label' => false, 'placeholder' => 'Password'));
            echo $form->input('remember_me', array('label' => 'Remember Me', 'type' => 'checkbox', 'div'=> false, 'label' => false));
            echo $form->end(array('div'=>false, 'label'=>'Login','name'=>'Login', 'class'=>'btn success'));
            echo "</li>";
        }
        
    }
?>
<script>
    $(document).ready(function(){
        //$('.welcome-user').twipsy();
    });
</script>
