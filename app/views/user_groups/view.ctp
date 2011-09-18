<div class="userGroups view">
<h2><?php  __('UserGroup');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userGroup['UserGroup']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userGroup['UserGroup']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit UserGroup', true), array('action' => 'edit', $userGroup['UserGroup']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete UserGroup', true), array('action' => 'delete', $userGroup['UserGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $userGroup['UserGroup']['id'])); ?> </li>
		<li><?php echo $html->link(__('List UserGroups', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New UserGroup', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List User Groups', true), array('controller' => 'user_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Parent User Group', true), array('controller' => 'user_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List User Group Memberships', true), array('controller' => 'user_group_memberships', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User Group Membership', true), array('controller' => 'user_group_memberships', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related User Groups');?></h3>
	<?php if (!empty($userGroup['ChildUserGroup'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($userGroup['ChildUserGroup'] as $childUserGroup):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $childUserGroup['id'];?></td>
			<td><?php echo $childUserGroup['name'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'user_groups', 'action' => 'view', $childUserGroup['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'user_groups', 'action' => 'edit', $childUserGroup['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'user_groups', 'action' => 'delete', $childUserGroup['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $childUserGroup['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Child User Group', true), array('controller' => 'user_groups', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related User Group Memberships');?></h3>
	<?php if (!empty($userGroup['UserGroupMembership'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('User Group Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($userGroup['UserGroupMembership'] as $userGroupMembership):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $userGroupMembership['id'];?></td>
			<td><?php echo $userGroupMembership['user_id'];?></td>
			<td><?php echo $userGroupMembership['user_group_id'];?></td>
			<td><?php echo $userGroupMembership['created'];?></td>
			<td><?php echo $userGroupMembership['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'user_group_memberships', 'action' => 'view', $userGroupMembership['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'user_group_memberships', 'action' => 'edit', $userGroupMembership['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'user_group_memberships', 'action' => 'delete', $userGroupMembership['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $userGroupMembership['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New User Group Membership', true), array('controller' => 'user_group_memberships', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Users');?></h3>
	<?php if (!empty($userGroup['User'])):?>
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
		<th><?php __('Last Login'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($userGroup['User'] as $user):
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
			<td><?php echo $user['last_login'];?></td>
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
