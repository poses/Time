<div id="user_nav">
                <?php
                    if($user){
                        echo "Welcome, <p style=\"display:inline-block;\" title=\"".$user['client_ip']."\">" . $user['username'] . '</p>. ' . $html->link('logout', array(
                            'controller' => 'users',
                            'action' => 'logout',
                        ));
                    }else{
                        echo $html->link('Register', array('controller'=>'users', 'action' => 'add'));
                        echo ' or ';
                        echo $html->link('Login', array('controller'=>'users', 'action' => 'login'));
                    }
                ?>
            </div>
