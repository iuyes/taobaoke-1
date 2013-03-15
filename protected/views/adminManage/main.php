<script>
$(function(){
	$('.applicationlist select').change(function(){ 
		var currentval  = $(this).children('option:selected').val();
		if(currentval=="BLOG"){
			$(".taobaomenu").hide();
			$(".sidemenu").show();
			$("#mainshow>iframe").attr("src","/index.php?r=/blog/blog/create");
			$(".headtitle .longtitle").html("WELCOME TO BLOG ManageMent!");
			$(".headtitle .shorttitle").html("A Small Wordpress!");
		}
		if(currentval=="淘宝客"){
			$(".sidemenu").hide();
			$(".taobaomenu").show();
			$("#mainshow>iframe").attr("src","/index.php?r=taobao/goods/search");
			$(".headtitle .longtitle").html("淘宝客");
			$(".headtitle .shorttitle").html("你，值得拥有");

		}
	}) 
	$(".sidemenu>li:eq(1)").click(function(){
	})
	$(".showcontroll").each(function(){
			$(this).click(function(){
				$(this).parents("li").find("ul").toggle("slow");

			})	
	})
	$(".showcontroll").click(function(){
		$(this).parents("li").find("ul").toggle("slow");
	})
	$(".blogshow").find("li:eq(0)").click(function(){
		$("#mainshow>iframe").attr("src","/index.php?r=/blog/blog");
	})

	$(".blogshow").find("li:eq(1)").click(function(){
		$("#mainshow>iframe").attr("src","/index.php?r=/blog/blog/create");
	})
	$(".classshow").find("li:eq(0)").click(function(){
		$("#mainshow>iframe").attr("src","/index.php?r=/blog/blogClass");
	})
	$(".classshow").find("li:eq(1)").click(function(){
		$("#mainshow>iframe").attr("src","/index.php?r=/blog/blogClass/add");
	})
	$(".shopclass").find("li:eq(0)").click(function(){
		$("#mainshow>iframe").attr("src","/index.php?r=taobao/goodsclass");
	})
	$(".shopclass").find("li:eq(1)").click(function(){
		$("#mainshow>iframe").attr("src","/index.php?r=taobao/goodsclass/classlist");
	})
		
	$(".goodscenter").find("li:eq(0)").click(function(){
		$("#mainshow>iframe").attr("src","/index.php?r=taobao/goods/classsearch");
	})

	$(".goodscenter").find("li:eq(1)").click(function(){
		$("#mainshow>iframe").attr("src","/index.php?r=taobao/goods/search");
	})
	$(".goodscenter").find("li:eq(2)").click(function(){
		$("#mainshow>iframe").attr("src","/index.php?r=taobao/goods/storage");
	})
	$(".goodscenter").find("li:eq(3)").click(function(){
		$("#mainshow>iframe").attr("src","/index.php?r=taobao/goods/coupon");
	})
	$(".goodscenter").find("li:eq(4)").click(function(){
		$("#mainshow>iframe").attr("src","/index.php?r=taobao/goods/allsee");
	})
	

  })
</script>
<header id="header">
	<div class="applicationlist">
		<span class="application-title">选择应用</span>
		<select>
			<option class="selectblog">淘宝客</option>
			<option class="selecttaobao">BLOG</option>
			<option>other</option>
		</select>	
	</div>
	<div class="headtitle">
		<span class="longtitle">淘宝客</span>
		<span class="shorttitle" >你，值得拥有!</span>
	</div>
<?php
$this->widget('zii.widgets.CMenu',array(
	'id' => 'ne',
	'items'=>array(
		array('label'=>'Home', 'url'=>array('/adminManage')),
		array('label'=>'About', 'url'=>array('')),
		array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
		array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
	),
)); 
?>
</header>
<div class="clear"></div>
<div id ="container">
	<div id="sidebar">
		<ul class="sidemenu">
			<li class="classshow"><span class='showcontroll'>分类管理</span>
				<ul>
					<li>分类列表</li>
					<li>添加分类</li>
				</ul>
			</li>
			<li class='blogshow'><span class='showcontroll'>文章管理</span>
				<ul>
					<li>文章列表</li>
					<li>发布文章</li>
				</ul>
			</li>
			<li>站点设置</li>
			<li>其他</li>
		</ul>
		<ul class="taobaomenu">
			<li><span>商品管理</span>
				<ul class="goodscenter">
					<li>分类搜索</li>
					<li>搜索商品</li>
					<li>商品仓库</li>
					<li>折扣频道</li>
					<li>商品总览</li>
				</ul>
			</li>
			<li>
				<span>商品分类</span>
				<ul class="shopclass">
					<li>添加分类</li>
					<li>分类管理</li>
				</ul>
			</li>

			<li>
				<span>站点设置</span>
			</li>
		</ul>
	</div>	
	<div id="mainshow">
		<iframe src="/index.php?r=taobao/goods/search" width="100%" height="100%" frameborder="0">
			
		</iframe>	
	</div>
</div>
