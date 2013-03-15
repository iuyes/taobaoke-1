<div class="form_classsearch">
<?php echo CHtml::beginForm();?>

	<div class="row">
		<label><h4>分类搜索</h4></label>
	</div>

	<div class="row">
		<label>parent_cid</label>
		<input type="text" name="parent_cid"/>
	</div>

	<div class="row">
		<label>cids</label>
		<input type="text" name="cids"/>
	</div>	
	
	<div class="row submit">
        <input type="submit" class="btn btn-success" value="搜索"/>
	</div>
<?php echo CHtml::endForm();?>	
</div>
