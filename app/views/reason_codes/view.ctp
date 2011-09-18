<div class="reasonCodes view">
<h2><?php  __('ReasonCode');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reasonCode['ReasonCode']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Organization Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reasonCode['ReasonCode']['organization_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reasonCode['ReasonCode']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reasonCode['ReasonCode']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reasonCode['ReasonCode']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $reasonCode['ReasonCode']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit ReasonCode', true), array('action' => 'edit', $reasonCode['ReasonCode']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete ReasonCode', true), array('action' => 'delete', $reasonCode['ReasonCode']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $reasonCode['ReasonCode']['id'])); ?> </li>
		<li><?php echo $html->link(__('List ReasonCodes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New ReasonCode', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
