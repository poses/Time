<div class="allowedLocations view">
<h2><?php  __('AllowedLocation');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $allowedLocation['AllowedLocation']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Organization'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($allowedLocation['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $allowedLocation['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $allowedLocation['AllowedLocation']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $allowedLocation['AllowedLocation']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Value'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $allowedLocation['AllowedLocation']['value']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Default'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $allowedLocation['AllowedLocation']['default']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Active'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $allowedLocation['AllowedLocation']['active']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $allowedLocation['AllowedLocation']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $allowedLocation['AllowedLocation']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit AllowedLocation', true), array('action' => 'edit', $allowedLocation['AllowedLocation']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete AllowedLocation', true), array('action' => 'delete', $allowedLocation['AllowedLocation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $allowedLocation['AllowedLocation']['id'])); ?> </li>
		<li><?php echo $html->link(__('List AllowedLocations', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New AllowedLocation', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
