<div class="timers index">
<h2><?php __('Timers');?></h2>
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
	<th><?php echo $paginator->sort('timer_category_id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('start');?></th>
	<th><?php echo $paginator->sort('end');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($timers as $timer):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $timer['Timer']['id']; ?>
		</td>
		<td>
			<?php echo $timer['Timer']['organization_id']; ?>
		</td>
		<td>
			<?php echo $timer['Timer']['timer_category_id']; ?>
		</td>
		<td>
			<?php echo $timer['Timer']['name']; ?>
		</td>
		<td>
			<?php echo $timer['Timer']['description']; ?>
		</td>
		<td>
			<?php echo $timer['Timer']['start']; ?>
		</td>
		<td>
			<?php echo $timer['Timer']['end']; ?>
		</td>
		<td>
			<?php echo $timer['Timer']['created']; ?>
		</td>
		<td>
			<?php echo $timer['Timer']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $timer['Timer']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $timer['Timer']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $timer['Timer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timer['Timer']['id'])); ?>
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
		<li><?php echo $html->link(__('New Timer', true), array('action' => 'add')); ?></li>
	</ul>
</div>
