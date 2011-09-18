<div class="organizations index">
<h2><?php __('Organizations');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('slug');?></th>
	<th><?php echo $paginator->sort('theme');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('active');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($organizations as $organization):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $organization['Organization']['id']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['name']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['slug']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['theme']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['description']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['active']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['created']; ?>
		</td>
		<td>
			<?php echo $organization['Organization']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $organization['Organization']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $organization['Organization']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $organization['Organization']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $organization['Organization']['id'])); ?>
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
		<li><?php echo $html->link(__('New Organization', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Allowed Locations', true), array('controller' => 'allowed_locations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Allowed Location', true), array('controller' => 'allowed_locations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Denied Locations', true), array('controller' => 'denied_locations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Denied Location', true), array('controller' => 'denied_locations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Departments', true), array('controller' => 'departments', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Department', true), array('controller' => 'departments', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Pay Period Types', true), array('controller' => 'pay_period_types', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Pay Period Type', true), array('controller' => 'pay_period_types', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Pay Periods', true), array('controller' => 'pay_periods', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Pay Period', true), array('controller' => 'pay_periods', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Time Sheets', true), array('controller' => 'time_sheets', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Time Sheet', true), array('controller' => 'time_sheets', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Timer Categories', true), array('controller' => 'timer_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Timer Category', true), array('controller' => 'timer_categories', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Timers', true), array('controller' => 'timers', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Timer', true), array('controller' => 'timers', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List User Groups', true), array('controller' => 'user_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User Group', true), array('controller' => 'user_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
