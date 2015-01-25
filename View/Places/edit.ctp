<div class="places form">
<?php echo $this->Form->create('Place'); ?>
	<fieldset>
		<legend><?php echo __('Edit Place'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label'=>'地方名称'));
	?>
		<label>图片</label>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
		<input id="src" name="data[Place][img_url]" type="hidden">
	<?php 
		echo $this->Form->input('introduce',array('label'=>'简介'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Place.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Place.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Places'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Votes'), array('controller' => 'votes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vote'), array('controller' => 'votes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<link rel="stylesheet" type="text/css" href="/css/uploadify.css">
<script type="text/javascript" src="/js/jquery.uploadify.js"></script>
<script type="text/javascript">
	<?php $timestamp = time();?>
	$(document).ready(function(){
		$('#file_upload').uploadify({
			'formData'     : {
				'timestamp' : '<?php echo $timestamp;?>',
				'token'     : '<?php echo md5('Jiaqi.Feng' . $timestamp);?>'
			},
			'swf'      : '/uploadify.swf',
			'uploader' : '/Places/uploadImg',
			'onUploadSuccess' : function(file, data, response) {
	            $('#file_upload').hide().after('<img id="cropbox" src="/images/place/'+data+'" width="500">');
	            $('#src').val(data);
	        }
		});
	});
</script>
