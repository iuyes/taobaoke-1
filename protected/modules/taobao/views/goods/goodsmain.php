<table class="table goodslist">
	<tr>
<?php
	foreach($keys as $val){
		echo '<td class="table_title">'.$val.'</td>';
	} 
?>
	</tr>
<?php
	foreach($result as $result_val){
		echo '<tr>';
		$result_val = (array)$result_val;
		foreach($keys as $value){
			if(isset($result_val[$value])){
				echo '<td>'.$result_val[$value].'</td>';
			}else{
				echo '<td>null</td>';
			}
		}
		echo '</tr>';
	}
?>
</table>

