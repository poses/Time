<div class="payPeriods index">
<h2><?php __('PayPeriods');?></h2>
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
	<th><?php echo $paginator->sort('pay_period_type_id');?></th>
	<th><?php echo $paginator->sort('day');?></th>
	<th><?php echo $paginator->sort('week');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($payPeriods as $payPeriod):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $payPeriod['PayPeriod']['id']; ?>
		</td>
		<td>
			<?php echo $payPeriod['PayPeriod']['organization_id']; ?>
		</td>
		<td>
			<?php echo $payPeriod['PayPeriod']['pay_period_type_id']; ?>
		</td>
		<td>
			<?php echo $payPeriod['PayPeriod']['day']; ?>
		</td>
		<td>
			<?php echo $payPeriod['PayPeriod']['week']; ?>
		</td>
		<td>
			<?php echo $payPeriod['PayPeriod']['created']; ?>
		</td>
		<td>
			<?php echo $payPeriod['PayPeriod']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $payPeriod['PayPeriod']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $payPeriod['PayPeriod']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $payPeriod['PayPeriod']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $payPeriod['PayPeriod']['id'])); ?>
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
		<li><?php echo $html->link(__('New PayPeriod', true), array('action' => 'add')); ?></li>
	</ul>
</div>
