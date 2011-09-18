<div class="userAllowedLocations view">
<h2><?php  __('UserAllowedLocation');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAllowedLocation['UserAllowedLocation']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Allowed Location'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($userAllowedLocation['AllowedLocation']['name'], array('controller' => 'allowed_locations', 'action' => 'view', $userAllowedLocation['AllowedLocation']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($userAllowedLocation['User']['name'], array('controller' => 'users', 'action' => 'view', $userAllowedLocation['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAllowedLocation['UserAllowedLocation']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userAllowedLocation['UserAllowedLocation']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit UserAllowedLocation', true), array('action' => 'edit', $userAllowedLocation['UserAllowedLocation']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete UserAllowedLocation', true), array('action' => 'delete', $userAllowedLocation['UserAllowedLocation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $userAllowedLocation['UserAllowedLocation']['id'])); ?> </li>
		<li><?php echo $html->link(__('List UserAllowedLocations', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New UserAllowedLocation', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Allowed Locations', true), array('controller' => 'allowed_locations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Allowed Location', true), array('controller' => 'allowed_locations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
