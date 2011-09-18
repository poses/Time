<div class="featureGroups index">
<h2><?php __('FeatureGroups');?></h2>
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
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('value');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($featureGroups as $featureGroup):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $featureGroup['FeatureGroup']['id']; ?>
		</td>
		<td>
			<?php echo $featureGroup['FeatureGroup']['name']; ?>
		</td>
		<td>
			<?php echo $featureGroup['FeatureGroup']['description']; ?>
		</td>
		<td>
			<?php echo $featureGroup['FeatureGroup']['value']; ?>
		</td>
		<td>
			<?php echo $featureGroup['FeatureGroup']['created']; ?>
		</td>
		<td>
			<?php echo $featureGroup['FeatureGroup']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $featureGroup['FeatureGroup']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $featureGroup['FeatureGroup']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $featureGroup['FeatureGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $featureGroup['FeatureGroup']['id'])); ?>
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
		<li><?php echo $html->link(__('New FeatureGroup', true), array('action' => 'add')); ?></li>
	</ul>
</div>
