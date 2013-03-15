<div class="form_addclass">
<?php echo CHtml::beginForm();?>
	
	<?php echo CHtml::errorSummary($model);?>

	<div class="row">
				<label>商品分类</label>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabel($model,'CName'); ?>
		<input type="text" name="Taobaoclass[CName]"/>
	</div>
	
	<div class="row submit">
        <input type="submit" class="btn btn-success" value="添加"/>
	</div>
<?php echo CHtml::endForm();?>	
</div>
