<?php if($this->Session->read('Auth.User.isAdmin')):?>
    <ul class="tabs">
        <li class="active"><a href="/time_sheets">Timesheet</a></li>
        <li><a href="/reports">Reports</a></li>
        <li><a href="/users">Users</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="#">Contact</a></li>
        <li class="dropdown" data-dropdown="dropdown">
            <a href="#" class="dropdown-toggle">Dropdown</a>
            <ul class="dropdown-menu">
                <li><a href="#">Secondary link</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Another link</a></li>
            </ul>
        </li>
    </ul>
<?php elseif($this->Session->read('Auth.User')):?>
    <ul class="tabs">
        <li <?php if($this->params['controller'] == 'time_clocks'):?>class="active"<?php endif;?>><a href="/time_clocks"><?php __('Time Clock')?></a></li>
        <li <?php if($this->params['controller'] == 'payrolls'):?>class="active"<?php endif;?>><a href="/payrolls"><?php __('Payroll')?></a></li>
        <li <?php if($this->params['controller'] == 'timers'):?>class="active"<?php endif;?>><a href="/timers"><?php __('Timers')?></a></li>
        <li <?php if($this->params['controller'] == 'tasks'):?>class="active"<?php endif;?>><a href="/tasks"><?php __('Tasks')?></a></li>
        <li <?php if($this->params['controller'] == 'messages'):?>class="active"<?php endif;?>><a href="/messages"><?php __('Messages')?></a></li>
        <li class="dropdown" data-dropdown="dropdown">
            <a href="#" class="dropdown-toggle">Dropdown</a>
            <ul class="dropdown-menu">
                <li><a href="#">Secondary link</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Another link</a></li>
            </ul>
        </li>
    </ul>
<?php endif;?>
