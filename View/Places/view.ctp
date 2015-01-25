<div class="places view">
<h2><?php echo __('Place'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($place['Place']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('名称'); ?></dt>
		<dd>
			<?php echo h($place['Place']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('图片'); ?></dt>
		<dd>
			<img src="/images/place/<?php echo h($place['Place']['img_url']); ?>" width="100%">
			&nbsp;
		</dd>
		<dt><?php echo __('简介'); ?></dt>
		<dd>
			<?php echo h($place['Place']['introduce']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('编辑该投票信息'), array('action' => 'edit', $place['Place']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('删除该投票信息'), array('action' => 'delete', $place['Place']['id']), array(), __('您确定要删除 # %s吗?', $place['Place']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('地方列表'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加地方 '), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('所有投票信息'), array('controller' => 'votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('发起投票'), array('controller' => 'votes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('该地方的投票信息'); ?></h3>
	<?php if (!empty($place['Vote'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('ID'); ?></th>
		<th><?php echo __('创建时间'); ?></th>
		<th><?php echo __('截止时间'); ?></th>
		<th><?php echo __('发起人'); ?></th>
		<th><?php echo __('地方名称'); ?></th>
		<th><?php echo __('发起说明'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($place['Vote'] as $vote): ?>
		<tr>
			<td><?php echo $vote['id']; ?></td>
			<td><?php echo $vote['created']; ?></td>
			<td><?php echo $vote['deadline']; ?></td>
			<td><?php echo $vote['user_id']; ?></td>
			<td><?php echo $vote['place_id']; ?></td>
			<td><?php echo $vote['description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('查看'), array('controller' => 'votes', 'action' => 'view', $vote['id'])); ?>
				<?php echo $this->Html->link(__('编辑'), array('controller' => 'votes', 'action' => 'edit', $vote['id'])); ?>
				<?php echo $this->Form->postLink(__('删除'), array('controller' => 'votes', 'action' => 'delete', $vote['id']), array(), __('您确定要删除 # %s吗?', $vote['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('发起投票'), array('controller' => 'votes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
