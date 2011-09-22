<style>
a.brand {
    text-decoration:none;
}
</style>
<div class="topbar" data-scrollspy="scrollspy" data-dropdown="dropdown">
    <div class="topbar-inner">
        <div class="container">
            <h3>
                <a class="brand" href="<?php if(isset($domain)):?>http://<?php echo $domain;?>/<?php else:?>/<?php endif;?>">
                    <img src="/img/clock-squared.png" width="16px" height="16px"/>
                    <?php echo __('Clock',true);?>&sup2;
                </a>
            </h3>
            
            <ul>
                <?php if($this->Session->check('Auth.User')):?>
                    <li class="dropdown" data-dropdown="time_clocks-dropdown" <?php if($this->params['controller']=='time_clocks'):?>class="active"<?php endif;?>>
                        <a href="/time_clocks" class="dropdown-toggle"><?php echo __('Time Clocks', true);?></a>
                        <ul class="dropdown-menu">
                            <li><a href="/time_clocks"><?php echo __('Today', true);?></a></li>
                            <li><a href="/time_sheets"><?php echo __('Time Sheets', true);?></a></li>
                            <li><a href="/schedules"><?php echo __('My Schedule', true);?></a></li>
                            <li class="divider"></li>
                            <li><a href="/requests/absence"><?php echo __('Absence Request', true);?></a></li>
                        </ul>
                    </li>
                    <li <?php if($this->params['controller']=='pay_periods'):?>class="active"<?php endif;?>><a href="/pay_periods"><?php echo __('PayPeriods', true);?></a></li>
                    <li class="dropdown" data-dropdown="timers-dropdown" <?php if($this->params['controller']=='timers'):?>class="active"<?php endif;?>>
                        <a href="/timers" class="dropdown-toggle"><?php echo __('Timers', true);?></a>
                        <ul class="dropdown-menu">
                            <li><a href="/timers/started"><?php echo __('Started Timers', true);?></a></li>
                            <li><a href="/timers/paused"><?php echo __('Paused Timers', true);?></a></li>
                            <li><a href="/timers/completed"><?php echo __('Completed Timers', true);?></a></li>
                        </ul>
                    </li>

                    <li class="dropdown" data-dropdown="tasks-dropdown" <?php if($this->params['controller']=='tasks'):?>class="active"<?php endif;?>>
                        <a href="/tasks" class="dropdown-toggle"><?php echo __('Tasks', true);?></a>
                        <ul class="dropdown-menu">
                            <li><a href="/tasks/create"><?php echo __('Create New Task', true);?></a></li>
                            <li><a href="/tasks/view"><?php echo __('View All Tasks', true);?></a></li>
                            <li><a href="/timers/completed"><?php echo __('Completed Timers', true);?></a></li>
                        </ul>
                    </li>
                    
                    <li <?php if($this->params['controller']=='tasks'):?>class="active"<?php endif;?>><a href="/tasks"><?php echo __('Tasks', true);?></a></li>
                    <li <?php if($this->params['controller']=='messagels'):?>class="active"<?php endif;?>><a href="/messages"><?php echo __('Messages', true);?></a></li>
                <?php else:?>
                    <!--<li><a href="/page/display/organization-account"><?php echo __('Organizations', true);?></a></li>
                    <li><a href="/page/display/about"><?php echo __('About', true);?></a></li>
                    <li><a href="/page/display/contact"><?php echo __('Contact', true);?></a></li>-->
                <?php endif;?>

                <?php echo $this->element('user_bar', array('user' => $user));?>
                
            </ul>
            
            
        </div>
    </div>
</div>
<!--
<div class="topbar-wrapper">
            <div id="topbar-example" class="topbar" data-dropdown="dropdown">
              <div class="topbar-inner">
                <div class="container">
                  <h3><a href="#">Project Name</a></h3>
                  <ul>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                  </ul>
                  <form action="">
                    <input type="text" placeholder="Search">
                  </form>
                  <ul class="nav secondary-nav">
                    <li class="menu open">
                      <a href="#" class="menu">Dropdown 1</a>
                      <ul class="menu-dropdown">
                        <li><a href="#">Secondary link</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Another link</a></li>
                      </ul>
                    </li>
                    <li class="menu">
                      <a href="#" class="menu">Dropdown 2</a>
                      <ul class="menu-dropdown">
                        <li><a href="#">Secondary link</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Another link</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          -->
          
<script>
    $(document).ready(function(){
        $('#topbar').dropdown();
    });
</script>
