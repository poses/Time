<div class="payPeriodTypes index">
<h2><?php __('PayPeriodTypes');?></h2>
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
foreach ($payPeriodTypes as $payPeriodType):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $payPeriodType['PayPeriodType']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($payPeriodType['Organization']['name'], array('controller' => 'organizations', 'action' => 'view', $payPeriodType['Organization']['id'])); ?>
		</td>
		<td>
			<?php echo $payPeriodType['PayPeriodType']['name']; ?>
		</td>
		<td>
			<?php echo $payPeriodType['PayPeriodType']['description']; ?>
		</td>
		<td>
			<?php echo $payPeriodType['PayPeriodType']['created']; ?>
		</td>
		<td>
			<?php echo $payPeriodType['PayPeriodType']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $payPeriodType['PayPeriodType']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $payPeriodType['PayPeriodType']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $payPeriodType['PayPeriodType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $payPeriodType['PayPeriodType']['id'])); ?>
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
		<li><?php echo $html->link(__('New PayPeriodType', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Organizations', true), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Organization', true), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Pay Periods', true), array('controller' => 'pay_periods', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Pay Period', true), array('controller' => 'pay_periods', 'action' => 'add')); ?> </li>
	</ul>
</div>
