<div class="organizations view">
<h2><?php  __('Organization');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $organization['Organization']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $organization['Organization']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slug'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $organization['Organization']['slug']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Theme'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $organization['Organization']['theme']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $organization['Organization']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Active'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $organization['Organization']['active']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $organization['Organization']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $organization['Organization']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Organization', true), array('action' => 'edit', $organization['Organization']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Organization', true), array('action' => 'delete', $organization['Organization']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $organization['Organization']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Organizations', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Organization', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Allowed Locations', true), array('controller' => 'allowed_locations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Allowed Location', true), array('controller' => 'allowed_locations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Denied Locations', true), array('controller' => 'denied_locations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Denied Location', true), array('controller' => 'denied_locations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Departments', true), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Department', true), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Pay Period Types', true), array('controller' => 'pay_period_types', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Pay Period Type', true), array('controller' => 'pay_period_types', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Pay Periods', true), array('controller' => 'pay_periods', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Pay Period', true), array('controller' => 'pay_periods', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Time Sheets', true), array('controller' => 'time_sheets', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Time Sheet', true), array('controller' => 'time_sheets', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Timer Categories', true), array('controller' => 'timer_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Timer Category', true), array('controller' => 'timer_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Timers', true), array('controller' => 'timers', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Timer', true), array('controller' => 'timers', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List User Groups', true), array('controller' => 'user_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User Group', true), array('controller' => 'user_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Allowed Locations');?></h3>
	<?php if (!empty($organization['AllowedLocation'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Organization Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Value'); ?></th>
		<th><?php __('Active'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($organization['AllowedLocation'] as $allowedLocation):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $allowedLocation['id'];?></td>
			<td><?php echo $allowedLocation['organization_id'];?></td>
			<td><?php echo $allowedLocation['name'];?></td>
			<td><?php echo $allowedLocation['description'];?></td>
			<td><?php echo $allowedLocation['type'];?></td>
			<td><?php echo $allowedLocation['value'];?></td>
			<td><?php echo $allowedLocation['active'];?></td>
			<td><?php echo $allowedLocation['created'];?></td>
			<td><?php echo $allowedLocation['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'allowed_locations', 'action' => 'view', $allowedLocation['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'allowed_locations', 'action' => 'edit', $allowedLocation['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'allowed_locations', 'action' => 'delete', $allowedLocation['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $allowedLocation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Allowed Location', true), array('controller' => 'allowed_locations', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Denied Locations');?></h3>
	<?php if (!empty($organization['DeniedLocation'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Organization Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Value'); ?></th>
		<th><?php __('Active'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($organization['DeniedLocation'] as $deniedLocation):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $deniedLocation['id'];?></td>
			<td><?php echo $deniedLocation['organization_id'];?></td>
			<td><?php echo $deniedLocation['name'];?></td>
			<td><?php echo $deniedLocation['description'];?></td>
			<td><?php echo $deniedLocation['type'];?></td>
			<td><?php echo $deniedLocation['value'];?></td>
			<td><?php echo $deniedLocation['active'];?></td>
			<td><?php echo $deniedLocation['created'];?></td>
			<td><?php echo $deniedLocation['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'denied_locations', 'action' => 'view', $deniedLocation['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'denied_locations', 'action' => 'edit', $deniedLocation['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'denied_locations', 'action' => 'delete', $deniedLocation['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $deniedLocation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Denied Location', true), array('controller' => 'denied_locations', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Departments');?></h3>
	<?php if (!empty($organization['Department'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Organization Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Active'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($organization['Department'] as $department):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $department['id'];?></td>
			<td><?php echo $department['organization_id'];?></td>
			<td><?php echo $department['name'];?></td>
			<td><?php echo $department['active'];?></td>
			<td><?php echo $department['created'];?></td>
			<td><?php echo $department['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'departments', 'action' => 'view', $department['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'departments', 'action' => 'edit', $department['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'departments', 'action' => 'delete', $department['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $department['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Department', true), array('controller' => 'departments', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Pay Period Types');?></h3>
	<?php if (!empty($organization['PayPeriodType'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Organization Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($organization['PayPeriodType'] as $payPeriodType):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $payPeriodType['id'];?></td>
			<td><?php echo $payPeriodType['organization_id'];?></td>
			<td><?php echo $payPeriodType['name'];?></td>
			<td><?php echo $payPeriodType['description'];?></td>
			<td><?php echo $payPeriodType['created'];?></td>
			<td><?php echo $payPeriodType['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'pay_period_types', 'action' => 'view', $payPeriodType['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'pay_period_types', 'action' => 'edit', $payPeriodType['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'pay_period_types', 'action' => 'delete', $payPeriodType['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $payPeriodType['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Pay Period Type', true), array('controller' => 'pay_period_types', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Pay Periods');?></h3>
	<?php if (!empty($organization['PayPeriod'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Organization Id'); ?></th>
		<th><?php __('Pay Period Type Id'); ?></th>
		<th><?php __('Day'); ?></th>
		<th><?php __('Week'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($organization['PayPeriod'] as $payPeriod):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $payPeriod['id'];?></td>
			<td><?php echo $payPeriod['organization_id'];?></td>
			<td><?php echo $payPeriod['pay_period_type_id'];?></td>
			<td><?php echo $payPeriod['day'];?></td>
			<td><?php echo $payPeriod['week'];?></td>
			<td><?php echo $payPeriod['created'];?></td>
			<td><?php echo $payPeriod['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'pay_periods', 'action' => 'view', $payPeriod['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'pay_periods', 'action' => 'edit', $payPeriod['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'pay_periods', 'action' => 'delete', $payPeriod['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $payPeriod['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Pay Period', true), array('controller' => 'pay_periods', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Time Sheets');?></h3>
	<?php if (!empty($organization['TimeSheet'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Organization Id'); ?></th>
		<th><?php __('Pay Period Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($organization['TimeSheet'] as $timeSheet):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $timeSheet['id'];?></td>
			<td><?php echo $timeSheet['organization_id'];?></td>
			<td><?php echo $timeSheet['pay_period_id'];?></td>
			<td><?php echo $timeSheet['user_id'];?></td>
			<td><?php echo $timeSheet['created'];?></td>
			<td><?php echo $timeSheet['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'time_sheets', 'action' => 'view', $timeSheet['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'time_sheets', 'action' => 'edit', $timeSheet['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'time_sheets', 'action' => 'delete', $timeSheet['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timeSheet['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Time Sheet', true), array('controller' => 'time_sheets', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Timer Categories');?></h3>
	<?php if (!empty($organization['TimerCategory'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Organization Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($organization['TimerCategory'] as $timerCategory):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $timerCategory['id'];?></td>
			<td><?php echo $timerCategory['organization_id'];?></td>
			<td><?php echo $timerCategory['name'];?></td>
			<td><?php echo $timerCategory['description'];?></td>
			<td><?php echo $timerCategory['created'];?></td>
			<td><?php echo $timerCategory['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'timer_categories', 'action' => 'view', $timerCategory['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'timer_categories', 'action' => 'edit', $timerCategory['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'timer_categories', 'action' => 'delete', $timerCategory['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timerCategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Timer Category', true), array('controller' => 'timer_categories', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Timers');?></h3>
	<?php if (!empty($organization['Timer'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Organization Id'); ?></th>
		<th><?php __('Timer Category Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Start'); ?></th>
		<th><?php __('End'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($organization['Timer'] as $timer):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $timer['id'];?></td>
			<td><?php echo $timer['organization_id'];?></td>
			<td><?php echo $timer['timer_category_id'];?></td>
			<td><?php echo $timer['name'];?></td>
			<td><?php echo $timer['description'];?></td>
			<td><?php echo $timer['start'];?></td>
			<td><?php echo $timer['end'];?></td>
			<td><?php echo $timer['created'];?></td>
			<td><?php echo $timer['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'timers', 'action' => 'view', $timer['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'timers', 'action' => 'edit', $timer['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'timers', 'action' => 'delete', $timer['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Timer', true), array('controller' => 'timers', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related User Groups');?></h3>
	<?php if (!empty($organization['UserGroup'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Organization Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Active'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($organization['UserGroup'] as $userGroup):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $userGroup['id'];?></td>
			<td><?php echo $userGroup['organization_id'];?></td>
			<td><?php echo $userGroup['name'];?></td>
			<td><?php echo $userGroup['active'];?></td>
			<td><?php echo $userGroup['created'];?></td>
			<td><?php echo $userGroup['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'user_groups', 'action' => 'view', $userGroup['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'user_groups', 'action' => 'edit', $userGroup['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'user_groups', 'action' => 'delete', $userGroup['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $userGroup['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New User Group', true), array('controller' => 'user_groups', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Users');?></h3>
	<?php if (!empty($organization['User'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Organization Id'); ?></th>
		<th><?php __('User Group Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Username'); ?></th>
		<th><?php __('Email'); ?></th>
		<th><?php __('Password'); ?></th>
		<th><?php __('Active'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($organization['User'] as $user):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $user['id'];?></td>
			<td><?php echo $user['organization_id'];?></td>
			<td><?php echo $user['user_group_id'];?></td>
			<td><?php echo $user['name'];?></td>
			<td><?php echo $user['username'];?></td>
			<td><?php echo $user['email'];?></td>
			<td><?php echo $user['password'];?></td>
			<td><?php echo $user['active'];?></td>
			<td><?php echo $user['created'];?></td>
			<td><?php echo $user['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'users', 'action' => 'delete', $user['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
