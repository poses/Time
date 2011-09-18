<div class="featureGroups view">
<h2><?php  __('FeatureGroup');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $featureGroup['FeatureGroup']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $featureGroup['FeatureGroup']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $featureGroup['FeatureGroup']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Value'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $featureGroup['FeatureGroup']['value']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $featureGroup['FeatureGroup']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $featureGroup['FeatureGroup']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit FeatureGroup', true), array('action' => 'edit', $featureGroup['FeatureGroup']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete FeatureGroup', true), array('action' => 'delete', $featureGroup['FeatureGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $featureGroup['FeatureGroup']['id'])); ?> </li>
		<li><?php echo $html->link(__('List FeatureGroups', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New FeatureGroup', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
