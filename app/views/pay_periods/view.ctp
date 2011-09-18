<div class="payPeriods view">
<h2><?php  __('PayPeriod');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $payPeriod['PayPeriod']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Organization Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $payPeriod['PayPeriod']['organization_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pay Period Type Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $payPeriod['PayPeriod']['pay_period_type_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Day'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $payPeriod['PayPeriod']['day']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Week'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $payPeriod['PayPeriod']['week']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $payPeriod['PayPeriod']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $payPeriod['PayPeriod']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit PayPeriod', true), array('action' => 'edit', $payPeriod['PayPeriod']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete PayPeriod', true), array('action' => 'delete', $payPeriod['PayPeriod']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $payPeriod['PayPeriod']['id'])); ?> </li>
		<li><?php echo $html->link(__('List PayPeriods', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New PayPeriod', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
