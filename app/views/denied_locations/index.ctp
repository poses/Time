<div class="deniedLocations index">
<h2><?php __('DeniedLocations');?></h2>
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
	<th><?php echo $paginator->sort('type');?></th>
	<th><?php echo $paginator->sort('value');?></th>
	<th><?php echo $paginator->sort('active');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($deniedLocations as $deniedLocation):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $deniedLocation['DeniedLocation']['id']; ?>
		</td>
		<td>
			<?php echo $deniedLocation['DeniedLocation']['organization_id']; ?>
		</td>
		<td>
			<?php echo $deniedLocation['DeniedLocation']['name']; ?>
		</td>
		<td>
			<?php echo $deniedLocation['DeniedLocation']['description']; ?>
		</td>
		<td>
			<?php echo $deniedLocation['DeniedLocation']['type']; ?>
		</td>
		<td>
			<?php echo $deniedLocation['DeniedLocation']['value']; ?>
		</td>
		<td>
			<?php echo $deniedLocation['DeniedLocation']['active']; ?>
		</td>
		<td>
			<?php echo $deniedLocation['DeniedLocation']['created']; ?>
		</td>
		<td>
			<?php echo $deniedLocation['DeniedLocation']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $deniedLocation['DeniedLocation']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $deniedLocation['DeniedLocation']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $deniedLocation['DeniedLocation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $deniedLocation['DeniedLocation']['id'])); ?>
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
		<li><?php echo $html->link(__('New DeniedLocation', true), array('action' => 'add')); ?></li>
	</ul>
</div>
