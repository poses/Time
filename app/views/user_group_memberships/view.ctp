<div class="userGroupMemberships view">
<h2><?php  __('UserGroupMembership');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userGroupMembership['UserGroupMembership']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($userGroupMembership['User']['name'], array('controller' => 'users', 'action' => 'view', $userGroupMembership['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User Group'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($userGroupMembership['UserGroup']['name'], array('controller' => 'user_groups', 'action' => 'view', $userGroupMembership['UserGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userGroupMembership['UserGroupMembership']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userGroupMembership['UserGroupMembership']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit UserGroupMembership', true), array('action' => 'edit', $userGroupMembership['UserGroupMembership']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete UserGroupMembership', true), array('action' => 'delete', $userGroupMembership['UserGroupMembership']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $userGroupMembership['UserGroupMembership']['id'])); ?> </li>
		<li><?php echo $html->link(__('List UserGroupMemberships', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New UserGroupMembership', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List User Groups', true), array('controller' => 'user_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User Group', true), array('controller' => 'user_groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
