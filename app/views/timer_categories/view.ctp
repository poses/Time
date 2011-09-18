<div class="timerCategories view">
<h2><?php  __('TimerCategory');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timerCategory['TimerCategory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Organization Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timerCategory['TimerCategory']['organization_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timerCategory['TimerCategory']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timerCategory['TimerCategory']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timerCategory['TimerCategory']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timerCategory['TimerCategory']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit TimerCategory', true), array('action' => 'edit', $timerCategory['TimerCategory']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete TimerCategory', true), array('action' => 'delete', $timerCategory['TimerCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timerCategory['TimerCategory']['id'])); ?> </li>
		<li><?php echo $html->link(__('List TimerCategories', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New TimerCategory', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
