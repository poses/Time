<div class="timeSheets index">
<h2><?php __('TimeSheets');?></h2>
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
	<th><?php echo $paginator->sort('pay_period_id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($timeSheets as $timeSheet):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $timeSheet['TimeSheet']['id']; ?>
		</td>
		<td>
			<?php echo $timeSheet['TimeSheet']['organization_id']; ?>
		</td>
		<td>
			<?php echo $timeSheet['TimeSheet']['pay_period_id']; ?>
		</td>
		<td>
			<?php echo $timeSheet['TimeSheet']['user_id']; ?>
		</td>
		<td>
			<?php echo $timeSheet['TimeSheet']['created']; ?>
		</td>
		<td>
			<?php echo $timeSheet['TimeSheet']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $timeSheet['TimeSheet']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $timeSheet['TimeSheet']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $timeSheet['TimeSheet']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timeSheet['TimeSheet']['id'])); ?>
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
		<li><?php echo $html->link(__('New TimeSheet', true), array('action' => 'add')); ?></li>
	</ul>
</div>
