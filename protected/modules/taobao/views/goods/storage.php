<div class="form_storage">
<?php echo CHtml::beginForm();?>
	
	<div class="row">
		<label><h4>仓库</h4>(小心操作)</label>
	</div>
	
	<div class="row">
		<table class="table storage_table">
			<tr><td>分类</td><td>操作</td></tr>
<?php
	if(isset($class)&&!empty($class))	{
		foreach($class as $class_val){
			echo "<tr><td>{$class_val['CName']}(".$class_val['goodsnum'].")<input type='hidden' value=".$class_val['Cid']."  /></td><td><span class='label label-warning empty'>清空</span></td></tr>";
		}       
	}	
?>
		</table>
	</div>	

	<div class="row submit">
        <input type="submit" class="btn btn-success" value="刷新"/>
	</div>
<?php echo CHtml::endForm();?>	
</div>
