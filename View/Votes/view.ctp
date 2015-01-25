<div class="votes view">
<h2><?php echo __('投票详细信息'); ?></h2>
	<dl>
		<dt><?php echo __('ID'); ?></dt>
		<dd>
			<?php echo h($vote['Vote']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('创建时间'); ?></dt>
		<dd>
			<?php echo h($vote['Vote']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('截止时间'); ?></dt>
		<dd>
			<?php echo h($vote['Vote']['deadline']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('发起人'); ?></dt>
		<dd>
			<?php echo $this->Html->link($vote['User']['username'], array('controller' => 'users', 'action' => 'view', $vote['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('地方名称'); ?></dt>
		<dd>
			<?php echo $this->Html->link($vote['Place']['name'], array('controller' => 'places', 'action' => 'view', $vote['Place']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('描述'); ?></dt>
		<dd>
			<?php echo h($vote['Vote']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('编辑该投票信息'), array('action' => 'edit', $vote['Vote']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('删除该投票信息'), array('action' => 'delete', $vote['Vote']['id']), array(), __('Are you sure you want to delete # %s?', $vote['Vote']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__(' 投票列表'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('发起投票'), array('action' => 'add')); ?> </li>
	
	</ul>
</div>
<!--  
<div class="related">
	<h3><?php echo __('Related User Vote Ships'); ?></h3>
	<?php if (!empty($vote['UserVoteShip'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Vote Id'); ?></th>
		<th><?php echo __('Result'); ?></th>
		<th><?php echo __('Reply'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($vote['UserVoteShip'] as $userVoteShip): ?>
		<tr>
			<td><?php echo $userVoteShip['id']; ?></td>
			<td><?php echo $userVoteShip['user_id']; ?></td>
			<td><?php echo $userVoteShip['vote_id']; ?></td>
			<td><?php echo $userVoteShip['result']; ?></td>
			<td><?php echo $userVoteShip['reply']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_vote_ships', 'action' => 'view', $userVoteShip['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_vote_ships', 'action' => 'edit', $userVoteShip['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_vote_ships', 'action' => 'delete', $userVoteShip['id']), array(), __('Are you sure you want to delete # %s?', $userVoteShip['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Vote Ship'), array('controller' => 'user_vote_ships', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
-->