<div class="votes form">
<?php echo $this->Form->create('Vote'); ?>
	<fieldset>
		<legend><?php echo __('编辑投票信息'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('deadline',array('label'=>'投票截止日期'));
		echo $this->Form->input('user_id',array('label'=>'发起人'));
		echo $this->Form->input('Place.name',array('label'=>'地方'));
		echo $this->Form->input('Place.introduce',array('label'=>'地方描述','type'=>'textarea'));	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Vote.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Vote.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Votes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Vote Ships'), array('controller' => 'user_vote_ships', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Vote Ship'), array('controller' => 'user_vote_ships', 'action' => 'add')); ?> </li>
	</ul>
</div>
