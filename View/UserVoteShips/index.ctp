<div class="userVoteShips index">
	<h2><?php echo __('User Vote Ships'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('vote_id'); ?></th>
			<th><?php echo $this->Paginator->sort('result'); ?></th>
			<th><?php echo $this->Paginator->sort('reply'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($userVoteShips as $userVoteShip): ?>
	<tr>
		<td><?php echo h($userVoteShip['UserVoteShip']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userVoteShip['User']['id'], array('controller' => 'users', 'action' => 'view', $userVoteShip['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($userVoteShip['Vote']['id'], array('controller' => 'votes', 'action' => 'view', $userVoteShip['Vote']['id'])); ?>
		</td>
		<td><?php echo h($userVoteShip['UserVoteShip']['result']); ?>&nbsp;</td>
		<td><?php echo h($userVoteShip['UserVoteShip']['reply']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userVoteShip['UserVoteShip']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userVoteShip['UserVoteShip']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userVoteShip['UserVoteShip']['id']), array(), __('Are you sure you want to delete # %s?', $userVoteShip['UserVoteShip']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User Vote Ship'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Votes'), array('controller' => 'votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vote'), array('controller' => 'votes', 'action' => 'add')); ?> </li>
	</ul>
</div>
