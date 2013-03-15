$(function(){
	$(".result_searchgoods .del").each(function(){
		$(this).click(function(){
			$(this).parents("tr").remove();
		})
	})
	$(".form_storage .empty").each(function(){
		$(this).click(function(){
			var cid = $(this).parents("tr").find("input").val();
			$.ajax({
				url:"/index.php?r=taobao/goods/storage",
				type:'POST',
				data:'emptyclass=1&cid='+cid,
				success:function(data){
					alert('已清空');				
				}
			})
		})
	})
	$(".allgoods .del").each(function(){
		$(this).click(function(){
			var gid = $(this).parents("tr").find(".gid").text();
			$.ajax({
				url:"/index.php?r=taobao/goods/allsee",
				type:'POST',
				data:'deletegid=1&gid='+gid,
				success:function(data){
					alert('成功删除');
					window.location.reload();
				}
			})

		})
	})

})
