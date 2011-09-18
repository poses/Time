<div class="payPeriodTypes view">
<h2><?php  __('PayPeriodType');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $payPeriodType['PayPeriodType']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Organization'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($payPeriodType['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $payPeriodType['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $payPeriodType['PayPeriodType']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $payPeriodType['PayPeriodType']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $payPeriodType['PayPeriodType']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $payPeriodType['PayPeriodType']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit PayPeriodType', true), array('action' => 'edit', $payPeriodType['PayPeriodType']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete PayPeriodType', true), array('action' => 'delete', $payPeriodType['PayPeriodType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $payPeriodType['PayPeriodType']['id'])); ?> </li>
		<li><?php echo $html->link(__('List PayPeriodTypes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New PayPeriodType', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Pay Periods', true), array('controller' => 'pay_periods', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Pay Period', true), array('controller' => 'pay_periods', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Pay Periods');?></h3>
	<?php if (!empty($payPeriodType['PayPeriod'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Organization Id'); ?></th>
		<th><?php __('Pay Period Type Id'); ?></th>
		<th><?php __('Day'); ?></th>
		<th><?php __('Week'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($payPeriodType['PayPeriod'] as $payPeriod):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $payPeriod['id'];?></td>
			<td><?php echo $payPeriod['organization_id'];?></td>
			<td><?php echo $payPeriod['pay_period_type_id'];?></td>
			<td><?php echo $payPeriod['day'];?></td>
			<td><?php echo $payPeriod['week'];?></td>
			<td><?php echo $payPeriod['created'];?></td>
			<td><?php echo $payPeriod['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'pay_periods', 'action' => 'view', $payPeriod['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'pay_periods', 'action' => 'edit', $payPeriod['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'pay_periods', 'action' => 'delete', $payPeriod['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $payPeriod['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Pay Period', true), array('controller' => 'pay_periods', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
