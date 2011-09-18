<div class="employees index">
<h2><?php __('Employees');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('department_id');?></th>
	<th><?php echo $paginator->sort('badge_number');?></th>
	<th><?php echo $paginator->sort('pay_type');?></th>
	<th><?php echo $paginator->sort('pay_frequency');?></th>
	<th><?php echo $paginator->sort('pay_rate');?></th>
	<th><?php echo $paginator->sort('time_type');?></th>
	<th><?php echo $paginator->sort('federal_filing_status');?></th>
	<th><?php echo $paginator->sort('federal_exemptions');?></th>
	<th><?php echo $paginator->sort('withhold_additional_amount');?></th>
	<th><?php echo $paginator->sort('withhold_additional_percent');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($employees as $employee):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $employee['Employee']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($employee['User']['name'], array('controller' => 'users', 'action' => 'view', $employee['User']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($employee['Department']['name'], array('controller' => 'departments', 'action' => 'view', $employee['Department']['id'])); ?>
		</td>
		<td>
			<?php echo $employee['Employee']['badge_number']; ?>
		</td>
		<td>
			<?php echo $employee['Employee']['pay_type']; ?>
		</td>
		<td>
			<?php echo $employee['Employee']['pay_frequency']; ?>
		</td>
		<td>
			<?php echo $employee['Employee']['pay_rate']; ?>
		</td>
		<td>
			<?php echo $employee['Employee']['time_type']; ?>
		</td>
		<td>
			<?php echo $employee['Employee']['federal_filing_status']; ?>
		</td>
		<td>
			<?php echo $employee['Employee']['federal_exemptions']; ?>
		</td>
		<td>
			<?php echo $employee['Employee']['withhold_additional_amount']; ?>
		</td>
		<td>
			<?php echo $employee['Employee']['withhold_additional_percent']; ?>
		</td>
		<td>
			<?php echo $employee['Employee']['created']; ?>
		</td>
		<td>
			<?php echo $employee['Employee']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $employee['Employee']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $employee['Employee']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $employee['Employee']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $employee['Employee']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Employee', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Departments', true), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Department', true), array('controller' => 'departments', 'action' => 'add')); ?> </li>
	</ul>
</div>
