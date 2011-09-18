<div class="allowedLocations index">
<h2><?php __('AllowedLocations');?></h2>
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
	<th><?php echo $paginator->sort('value');?></th>
	<th><?php echo $paginator->sort('default');?></th>
	<th><?php echo $paginator->sort('active');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($allowedLocations as $allowedLocation):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $allowedLocation['AllowedLocation']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($allowedLocation['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $allowedLocation['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $allowedLocation['AllowedLocation']['name']; ?>
		</td>
		<td>
			<?php echo $allowedLocation['AllowedLocation']['description']; ?>
		</td>
		<td>
			<?php echo $allowedLocation['AllowedLocation']['value']; ?>
		</td>
		<td>
			<?php echo $allowedLocation['AllowedLocation']['default']; ?>
		</td>
		<td>
			<?php echo $allowedLocation['AllowedLocation']['active']; ?>
		</td>
		<td>
			<?php echo $allowedLocation['AllowedLocation']['created']; ?>
		</td>
		<td>
			<?php echo $allowedLocation['AllowedLocation']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $allowedLocation['AllowedLocation']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $allowedLocation['AllowedLocation']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $allowedLocation['AllowedLocation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $allowedLocation['AllowedLocation']['id'])); ?>
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
		<li><?php echo $html->link(__('New AllowedLocation', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
	</ul>
</div>
