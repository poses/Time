<div class="userAllowedLocations index">
<h2><?php __('UserAllowedLocations');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('allowed_location_id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($userAllowedLocations as $userAllowedLocation):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $userAllowedLocation['UserAllowedLocation']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($userAllowedLocation['AllowedLocation']['name'], array('controller' => 'allowed_locations', 'action' => 'view', $userAllowedLocation['AllowedLocation']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($userAllowedLocation['User']['name'], array('controller' => 'users', 'action' => 'view', $userAllowedLocation['User']['id'])); ?>
		</td>
		<td>
			<?php echo $userAllowedLocation['UserAllowedLocation']['created']; ?>
		</td>
		<td>
			<?php echo $userAllowedLocation['UserAllowedLocation']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $userAllowedLocation['UserAllowedLocation']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $userAllowedLocation['UserAllowedLocation']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $userAllowedLocation['UserAllowedLocation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $userAllowedLocation['UserAllowedLocation']['id'])); ?>
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
		<li><?php echo $html->link(__('New UserAllowedLocation', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Allowed Locations', true), array('controller' => 'allowed_locations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Allowed Location', true), array('controller' => 'allowed_locations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
