<div class="searchgoods">
	<div class="form_searchgoods">
	<?php echo CHtml::beginForm();?>
		
		<div class="row">
			<label><h4>商品搜索</h4></label>
		</div>

		<div class="row">
			<label>关键词</label>
			<input type="text" name="goodssearch[keyword]"/>
		</div>
		
		<div class="row">
			<label>Cid</label>
			<input type="text" name="goodssearch[cid]"/>
		</div>
		<div class="row">
			*至少选择一个
		</div>
		<div class="row submit">
			<input type="submit" class="btn btn-success" value="搜索"/>
		</div>
	<?php echo CHtml::endForm();?>	
	</div>
	<div class="result_searchgoods">
<?php
	if(isset($goods)){
		if(isset($error)&&!empty($error)){
			echo $error;
		}else{

			echo '<form action="/index.php?r=taobao/goods/search" method="post">';
			echo '<label>选择分类</label>';
			echo "<select name='goods_class'>";
			foreach($goodsclass as $class){
					echo '<option value='.$class['Cid'].'>'.$class['CName'].'</option>';
			}
			echo "</select>";
			echo "<table class='table goodslist'>";
			echo "<tr><td>num_iid</td><td>title</td><td>nick</td><td>price</td><td>pic</td><td>操作</td></tr>";
			foreach($goods as $goods_val){
				echo '<tr>';
				echo "<td>".$goods_val['num_iid']."</td><td>".$goods_val['title']."</td><td>".$goods_val['nick']."</td><td>".$goods_val['price']."</td><td class='searchpic'>
					<a href='".$goods_val['click_url']."'><img src=".$goods_val['pic_url']." /></a><input  type='hidden' name='num_iid[]'  value=".$goods_val['num_iid']." /></td>
					<td class='del'><span class='label label-info'>删除</span></td>";   
				echo '</tr>';
			}
			echo '</table>';
			echo "<p><input type='submit'/ value='确认' class='button'></p>";
			echo '</form>';
		}
	}
?>
	</div>
</div>
