<div class="userGroupMemberships index">
<h2><?php __('UserGroupMemberships');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('user_group_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($userGroupMemberships as $userGroupMembership):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $userGroupMembership['UserGroupMembership']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($userGroupMembership['User']['name'], array('controller' => 'users', 'action' => 'view', $userGroupMembership['User']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($userGroupMembership['UserGroup']['name'], array('controller' => 'user_groups', 'action' => 'view', $userGroupMembership['UserGroup']['id'])); ?>
		</td>
		<td>
			<?php echo $userGroupMembership['UserGroupMembership']['created']; ?>
		</td>
		<td>
			<?php echo $userGroupMembership['UserGroupMembership']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $userGroupMembership['UserGroupMembership']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $userGroupMembership['UserGroupMembership']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $userGroupMembership['UserGroupMembership']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $userGroupMembership['UserGroupMembership']['id'])); ?>
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
		<li><?php echo $html->link(__('New UserGroupMembership', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List User Groups', true), array('controller' => 'user_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User Group', true), array('controller' => 'user_groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
