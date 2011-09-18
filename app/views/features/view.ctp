<div class="features view">
<h2><?php  __('Feature');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $feature['Feature']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $feature['Feature']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Active'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $feature['Feature']['active']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $feature['Feature']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $feature['Feature']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Feature', true), array('action' => 'edit', $feature['Feature']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Feature', true), array('action' => 'delete', $feature['Feature']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $feature['Feature']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Features', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Feature', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
