<!DOCTYPE>
<html>
<head>
<title>用户登录</title>
</head>
<body>
<div id='un'>
</div>
<div class="users form">
	    <h2>登录</h2>
				<?php
				echo $this->Form->create('User', array('url' => array('controller' => 'users','action' => 'login')));
				echo $this->Form->input('username',array('label'=>'用户名'));
				echo $this->Form->input('password',array('label'=>'密码'));
				$options = array('管理员' => '管理员', '普通用户' => '普通用户');
				echo $this->Form->radio('role',$options,array('label'=>'角色','legend'=>'角色'));
				echo $this->Form->end('登录');
				?>
      </div>
<div>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('注册'), array('action' => 'add')); ?></li>
		
	</ul>
</div>
</body>
</html>