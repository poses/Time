<div class="departments index">
<h2><?php __('Departments');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('organization_id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('active');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($departments as $department):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $department['Department']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($department['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $department['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $department['Department']['name']; ?>
		</td>
		<td>
			<?php echo $department['Department']['active']; ?>
		</td>
		<td>
			<?php echo $department['Department']['created']; ?>
		</td>
		<td>
			<?php echo $department['Department']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $department['Department']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $department['Department']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $department['Department']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $department['Department']['id'])); ?>
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
		<li><?php echo $html->link(__('New Department', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Employees', true), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Employee', true), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
