<div class="votes index">
	<h2><?php echo __('当前投票信息'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID'); ?></th>
			<th><?php echo $this->Paginator->sort('创建时间'); ?></th>
			<th><?php echo $this->Paginator->sort('截止时间'); ?></th>
			<th><?php echo $this->Paginator->sort('发起人'); ?></th>
			<th><?php echo $this->Paginator->sort('地方名称'); ?></th>
			<th><?php echo $this->Paginator->sort('描述'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($votes as $vote): ?>
	<tr>
		<td><?php echo h($vote['Vote']['id']); ?>&nbsp;</td>
		<td><?php echo h($vote['Vote']['created']); ?>&nbsp;</td>
		<td><?php echo h($vote['Vote']['deadline']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($vote['User']['id'], array('controller' => 'users', 'action' => 'view', $vote['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($vote['Place']['name'], array('controller' => 'places', 'action' => 'view', $vote['Place']['id'])); ?>
		</td>
		<td><?php echo h($vote['Place']['introduce']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('查看'), array('action' => 'view', $vote['Vote']['id'])); ?>
			<?php echo $this->Html->link(__('修改'), array('action' => 'edit', $vote['Vote']['id'])); ?>
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'delete', $vote['Vote']['id']), array(), __('Are you sure you want to delete # %s?', $vote['Vote']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('当前第 {:page}页 共 {:pages}页, 当前第 {:current}条记录 工{:count}条记录 , 当前开始于第 {:start}条, 结束于第 {:end}条')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('上一页'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('下一页') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('发起投票'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('所有投票地方'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加地方'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		
	</ul>
</div>
