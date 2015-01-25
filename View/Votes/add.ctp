<div class="votes form">
<?php echo $this->Form->create('Vote'); ?>
	<fieldset>
		<legend><?php echo __('发起投票'); ?></legend>
	<?php
		echo $this->Form->input('deadline',array('label'=>'投票截止日期'));
	?>
		<label>发起人</label>
		<p><?php echo $this->Session->read('user_username'); ?></p>
		<input type="hidden" value="<?php echo $this->Session->read('user_id'); ?>" name="data[Vote][user_id]">
	<?php
		echo $this->Form->input('place_id',array('label'=>'地方'));
		echo $this->Form->input('description',array('label'=>'发起介绍','type'=>'textarea'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('确定')); ?>
</div>
<div class="actions">
	<h3><?php echo __('投票管理'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('投票项目'), array('action' => 'index')); ?></li>		
		<li><?php echo $this->Html->link(__('地方列表'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('添加地方'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		
	</ul>
</div>
