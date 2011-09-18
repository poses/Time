<div class="timeClocks view">
<h2><?php  __('TimeClock');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timeClock['TimeClock']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timeClock['TimeClock']['user_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('In'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timeClock['TimeClock']['in']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Out'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timeClock['TimeClock']['out']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timeClock['TimeClock']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timeClock['TimeClock']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit TimeClock', true), array('action' => 'edit', $timeClock['TimeClock']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete TimeClock', true), array('action' => 'delete', $timeClock['TimeClock']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timeClock['TimeClock']['id'])); ?> </li>
		<li><?php echo $html->link(__('List TimeClocks', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New TimeClock', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
