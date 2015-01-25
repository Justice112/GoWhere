<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('cake.generic','admin'));
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('admin');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

<div id="container">
	<header class="navimenu cf" id="header">		
		<div class="innerLogo">
			<?php 
				if($this->Session->check('user_role')){
			?>
			<div class="top cf">	
				
				<a href="/users/logout" class="">退出系统</a>
				<p>欢迎<img width="50" src="/images/head/<?php echo $this->Session->read('user_head'); ?>"><strong><?php echo $this->Session->read('user_username'); ?></strong>登录</p>
			</div>
			<?php 
				}
			?>
			<?php echo $this->Session->flash(); ?>
		</div>
		
	</header>
	<div id="content">

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
	</div>
	<footer id="footer">
		<div class="inner cf">
			<p></p>
		</div>
	</footer>
</div>
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>