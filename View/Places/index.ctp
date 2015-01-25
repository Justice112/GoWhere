<div class="places index">
	<h2><?php echo __('地方列表'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID'); ?></th>
			<th><?php echo $this->Paginator->sort('姓名'); ?></th>
			<th><?php echo $this->Paginator->sort('图片路径'); ?></th>
			<th><?php echo $this->Paginator->sort('简介'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($places as $place): ?>
	<tr>
		<td><?php echo h($place['Place']['id']); ?>&nbsp;</td>
		<td><?php echo h($place['Place']['name']); ?>&nbsp;</td>
		<td><img src="/images/place/<?php echo h($place['Place']['img_url']); ?>" height="30"></td>
		<td><?php echo h($place['Place']['introduce']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('查看'), array('action' => 'view', $place['Place']['id'])); ?>
			<?php echo $this->Html->link(__('修改'), array('action' => 'edit', $place['Place']['id'])); ?>
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'delete', $place['Place']['id']), array(), __('您确定要删除 # %s吗?', $place['Place']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('添加地方'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('投票列表'), array('controller' => 'votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加投票'), array('controller' => 'votes', 'action' => 'add')); ?> </li>
	</ul>
</div>
