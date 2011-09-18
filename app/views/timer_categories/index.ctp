<div class="timerCategories index">
<h2><?php __('TimerCategories');?></h2>
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
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($timerCategories as $timerCategory):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $timerCategory['TimerCategory']['id']; ?>
		</td>
		<td>
			<?php echo $timerCategory['TimerCategory']['organization_id']; ?>
		</td>
		<td>
			<?php echo $timerCategory['TimerCategory']['name']; ?>
		</td>
		<td>
			<?php echo $timerCategory['TimerCategory']['description']; ?>
		</td>
		<td>
			<?php echo $timerCategory['TimerCategory']['created']; ?>
		</td>
		<td>
			<?php echo $timerCategory['TimerCategory']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $timerCategory['TimerCategory']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $timerCategory['TimerCategory']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $timerCategory['TimerCategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timerCategory['TimerCategory']['id'])); ?>
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
		<li><?php echo $html->link(__('New TimerCategory', true), array('action' => 'add')); ?></li>
	</ul>
</div>
