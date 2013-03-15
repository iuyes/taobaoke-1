<script type="text/javascript" src=<?php echo  $baseUrl = Yii::app()->baseUrl ;?>"/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src=<?php echo  $baseUrl ;?>"/ckfinder/ckfinder.js"></script>
	
<div class="form">
<?php echo CHtml::beginForm();?>
	
	<?php echo CHtml::errorSummary($model);?>

	<div class="row">
		<label>分类</label>
		<select name='BlogTableModel[Cid]'>	
			<?php
				foreach($class as $val){
					echo '<option value='.$val['Cid'].'>'.$val['ClassName'].'</option>';
				}
			?>
		</select>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabel($model,'Title'); ?>
		<input type="text" name="BlogTableModel[Title]"/>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabel($model,'Content'); ?>
		<textarea name="BlogTableModel[Content]" id="editor1"></textarea>
	<script type="text/javascript">
		CKEDITOR.replace( 'editor1',
				{
				toolbar : 'MyToolbar',
					filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
						filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?type=Images',
						filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?type=Flash',
						filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
						filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
						filebrowserWindowWidth : '1000',
						filebrowserWindowHeight : '700'
		});

	</script>

	</div>
	<div class="row submit">
        <input type="submit" class="btn btn-success" />
	</div>
<?php echo CHtml::endForm();?>	
</div>
