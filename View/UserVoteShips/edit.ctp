<div class="userVoteShips form">
<?php echo $this->Form->create('UserVoteShip'); ?>
	<fieldset>
		<legend><?php echo __('Edit User Vote Ship'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('vote_id');
		echo $this->Form->input('result');
		echo $this->Form->input('reply');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UserVoteShip.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('UserVoteShip.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List User Vote Ships'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Votes'), array('controller' => 'votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vote'), array('controller' => 'votes', 'action' => 'add')); ?> </li>
	</ul>
</div>
