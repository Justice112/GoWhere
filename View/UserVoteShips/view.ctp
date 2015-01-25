<div class="userVoteShips view">
<h2><?php echo __('User Vote Ship'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userVoteShip['UserVoteShip']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userVoteShip['User']['id'], array('controller' => 'users', 'action' => 'view', $userVoteShip['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vote'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userVoteShip['Vote']['id'], array('controller' => 'votes', 'action' => 'view', $userVoteShip['Vote']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Result'); ?></dt>
		<dd>
			<?php echo h($userVoteShip['UserVoteShip']['result']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reply'); ?></dt>
		<dd>
			<?php echo h($userVoteShip['UserVoteShip']['reply']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Vote Ship'), array('action' => 'edit', $userVoteShip['UserVoteShip']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Vote Ship'), array('action' => 'delete', $userVoteShip['UserVoteShip']['id']), array(), __('Are you sure you want to delete # %s?', $userVoteShip['UserVoteShip']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Vote Ships'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Vote Ship'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Votes'), array('controller' => 'votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vote'), array('controller' => 'votes', 'action' => 'add')); ?> </li>
	</ul>
</div>
