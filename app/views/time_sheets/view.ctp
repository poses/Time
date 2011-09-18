<div class="timeSheets view">
<h2><?php  __('TimeSheet');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timeSheet['TimeSheet']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Organization Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timeSheet['TimeSheet']['organization_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pay Period Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timeSheet['TimeSheet']['pay_period_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timeSheet['TimeSheet']['user_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timeSheet['TimeSheet']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timeSheet['TimeSheet']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit TimeSheet', true), array('action' => 'edit', $timeSheet['TimeSheet']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete TimeSheet', true), array('action' => 'delete', $timeSheet['TimeSheet']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timeSheet['TimeSheet']['id'])); ?> </li>
		<li><?php echo $html->link(__('List TimeSheets', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New TimeSheet', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
