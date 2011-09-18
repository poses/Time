<div class="departments view">
<h2><?php  __('Department');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $department['Department']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Organization'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($department['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $department['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $department['Department']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Active'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $department['Department']['active']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $department['Department']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $department['Department']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Department', true), array('action' => 'edit', $department['Department']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Department', true), array('action' => 'delete', $department['Department']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $department['Department']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Departments', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Department', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Employees', true), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Employee', true), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Employees');?></h3>
	<?php if (!empty($department['Employee'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Department Id'); ?></th>
		<th><?php __('Badge Number'); ?></th>
		<th><?php __('Pay Type'); ?></th>
		<th><?php __('Pay Frequency'); ?></th>
		<th><?php __('Pay Rate'); ?></th>
		<th><?php __('Time Type'); ?></th>
		<th><?php __('Federal Filing Status'); ?></th>
		<th><?php __('Federal Exemptions'); ?></th>
		<th><?php __('Withhold Additional Amount'); ?></th>
		<th><?php __('Withhold Additional Percent'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($department['Employee'] as $employee):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $employee['id'];?></td>
			<td><?php echo $employee['user_id'];?></td>
			<td><?php echo $employee['department_id'];?></td>
			<td><?php echo $employee['badge_number'];?></td>
			<td><?php echo $employee['pay_type'];?></td>
			<td><?php echo $employee['pay_frequency'];?></td>
			<td><?php echo $employee['pay_rate'];?></td>
			<td><?php echo $employee['time_type'];?></td>
			<td><?php echo $employee['federal_filing_status'];?></td>
			<td><?php echo $employee['federal_exemptions'];?></td>
			<td><?php echo $employee['withhold_additional_amount'];?></td>
			<td><?php echo $employee['withhold_additional_percent'];?></td>
			<td><?php echo $employee['created'];?></td>
			<td><?php echo $employee['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'employees', 'action' => 'view', $employee['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'employees', 'action' => 'edit', $employee['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'employees', 'action' => 'delete', $employee['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $employee['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Employee', true), array('controller' => 'employees', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
