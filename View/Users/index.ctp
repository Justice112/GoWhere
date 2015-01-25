<div class="users index">
	<h2><?php echo __('用户列表'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID'); ?></th>
			<th><?php echo $this->Paginator->sort('头像'); ?></th>
			<th><?php echo $this->Paginator->sort('登录名'); ?></th>
			<th><?php echo $this->Paginator->sort('密码'); ?></th>
			<th><?php echo $this->Paginator->sort('邮箱'); ?></th>
			<th><?php echo $this->Paginator->sort('性别'); ?></th>
			<th class="actions"><?php echo __('操作'); ?></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><img src="/images/head/<?php echo $user['User']['head']; ?>" width="30">&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['gender']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('查看'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('修改'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('删除'), array('action' => 'delete', $user['User']['id']), array(), __('您确定要删除 # %s吗?', $user['User']['username'])); ?>
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
		<li><?php echo $this->Html->link(__('用户列表'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('投票列表'), array('controller' => 'votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('发起投票'), array('controller' => 'votes', 'action' => 'add')); ?> </li>
	</ul>
</div>