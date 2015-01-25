<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('新用户注册'); ?></legend>
	<?php
		echo $this->Form->input('username',array('label'=>'用户名'));
		echo $this->Form->input('password',array('label'=>'密码'));
		echo $this->Form->input('email',array('label'=>'电子邮箱','type'=>'email'));
	?>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
	<?php
		echo $this->Form->input('gender',array('label'=>'性别','options'=>array('男'=> '男','女' => '女','保密' => '保密'),'empty'=>'请选择..'));
	?>
		<input type="hidden" id="x" name="x" />
		<input type="hidden" id="y" name="y" />
		<input type="hidden" id="w" name="w" />
		<input type="hidden" id="h" name="h" />
		<input type="hidden" id="src" name="data[name]" />
	</fieldset>
<?php echo $this->Form->end(__('确定')); ?>
</div>
<div class="actions">
	<h3><?php echo __('功能列表'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('登录'), array('action' => 'login')); ?></li>
		
	</ul>
</div>

<link rel="stylesheet" type="text/css" href="/css/uploadify.css">
<link rel="stylesheet" type="text/css" href="/css/jquery.Jcrop.css">
<script type="text/javascript" src="/js/jquery.uploadify.js"></script>
<script type="text/javascript" src="/js/jquery.Jcrop.min.js"></script>
<script type="text/javascript">
	<?php $timestamp = time();?>
	$(document).ready(function(){
		$('#file_upload').uploadify({
			'formData'     : {
				'timestamp' : '<?php echo $timestamp;?>',
				'token'     : '<?php echo md5('Jiaqi.Feng' . $timestamp);?>'
			},
			'swf'      : '/uploadify.swf',
			'uploader' : '/Users/uploadImg',
			'onUploadSuccess' : function(file, data, response) {
	            $('#file_upload').hide().after('<img id="cropbox" src="/images/head/'+data+'" width="500">');
				$('#src').val(data);
	    		$('#cropbox').Jcrop({
	    			aspectRatio: 1,
	    			onSelect: updateCoords
	    		});
	        }
		});

		function updateCoords(c)
		{
			$('#x').val(c.x);
			$('#y').val(c.y);
			$('#w').val(c.w);
			$('#h').val(c.h);
		};

		function checkCoords()
		{
			if (parseInt($('#w').val())) return true;
			alert('Please select a crop region then press submit.');
			return false;
		};
	});
</script>