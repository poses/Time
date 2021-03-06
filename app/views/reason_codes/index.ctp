<div class="reasonCodes index">
<h2><?php __('ReasonCodes');?></h2>
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
foreach ($reasonCodes as $reasonCode):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $reasonCode['ReasonCode']['id']; ?>
		</td>
		<td>
			<?php echo $reasonCode['ReasonCode']['organization_id']; ?>
		</td>
		<td>
			<?php echo $reasonCode['ReasonCode']['name']; ?>
		</td>
		<td>
			<?php echo $reasonCode['ReasonCode']['description']; ?>
		</td>
		<td>
			<?php echo $reasonCode['ReasonCode']['created']; ?>
		</td>
		<td>
			<?php echo $reasonCode['ReasonCode']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $reasonCode['ReasonCode']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $reasonCode['ReasonCode']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $reasonCode['ReasonCode']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $reasonCode['ReasonCode']['id'])); ?>
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
		<li><?php echo $html->link(__('New ReasonCode', true), array('action' => 'add')); ?></li>
	</ul>
</div>
