 <div class="form_allgoods">
 <?php echo CHtml::beginForm();?>
     
     <div class="row">
         <label><h4>所有商品</h4></label>
     </div>
	
	 <div class="row">
		<label>分类</label>
		<select name="class">
			<option value="0">所有分类</option>
<?php
	foreach($class as $class_val){
		echo "<option value='{$class_val['Cid']}'>".$class_val['CName']."</option>";
	}
?>
		</select>
	 </div>

     <div class="row">
         <label>关键词</label>
         <input type="text" name="keyword"/>
     </div>
     <div class="row submit">
         <input type="submit" class="btn btn-success" name="form_allgoods" value="搜索"/>
     </div>
 <?php echo CHtml::endForm();?>
 </div>
<div>
<table class="table allgoods">
<tr><td>GID</td><td>title</td><td>nick</td><td>price</td><td>pic</td><td>操作</td></tr>
<?php
foreach($goods as $goods_val){
	echo "<tr><td class='gid'>".$goods_val['Gid']."</td><td>".$goods_val['title']."</td><td>".$goods_val['nick']."</td><td>".$goods_val['price']."</td>
		<td><a href=".$goods_val['click_url']."><img src=".$goods_val['pic_url']." /></a></td><td><span class='label label-info del'>删除</span></td></tr>";
}
?>
</table>
</div>
