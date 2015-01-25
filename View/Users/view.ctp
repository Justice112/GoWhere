<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Head'); ?></dt>
		<dd>
			<?php echo h($user['User']['head']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($user['User']['gender']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Vote Ships'), array('controller' => 'user_vote_ships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Vote Ship'), array('controller' => 'user_vote_ships', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Votes'), array('controller' => 'votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vote'), array('controller' => 'votes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related User Vote Ships'); ?></h3>
	<?php if (!empty($user['UserVoteShip'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Vote Id'); ?></th>
		<th><?php echo __('Result'); ?></th>
		<th><?php echo __('Reply'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['UserVoteShip'] as $userVoteShip): ?>
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
<div class="related">
	<h3><?php echo __('Related Votes'); ?></h3>
	<?php if (!empty($user['Vote'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Deadline'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Place Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Vote'] as $vote): ?>
		<tr>
			<td><?php echo $vote['id']; ?></td>
			<td><?php echo $vote['created']; ?></td>
			<td><?php echo $vote['deadline']; ?></td>
			<td><?php echo $vote['user_id']; ?></td>
			<td><?php echo $vote['place_id']; ?></td>
			<td><?php echo $vote['description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'votes', 'action' => 'view', $vote['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'votes', 'action' => 'edit', $vote['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'votes', 'action' => 'delete', $vote['id']), array(), __('Are you sure you want to delete # %s?', $vote['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Vote'), array('controller' => 'votes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
