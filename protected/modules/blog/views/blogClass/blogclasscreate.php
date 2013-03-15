<div class="classpage">
<div class="classadd">

<?php echo CHtml::beginForm();?>
	<?php echo CHtml::errorSummary($model);?>
	<div class="row">
		<h4>添加分类</h4>
		<p>
			<label>父级</label>
			<select name="BlogClass[Fid]" class="classfid">
				<option value="0">顶级分类</option>
<?php
foreach ( $allclass as $class_value){
	echo "<option value='".$class_value['Cid']."'>".$class_value['ClassName']."</option>";
}
?>
			</select>
		</p>
		<p>
			<label>分类名</label>
			<input type="text" name="BlogClass[ClassName]" class="classname"/>
		</p>
		<input type="submit" value="添加" class="btn btn-success"/>
	</div>
	<?php echo CHtml::endForm();?>	
</div>
<div class="classlist">
	<h4>分类列表</h4>
	<?php
		echo $data;
	?>
</div>





</div>
