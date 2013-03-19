<html ng-app="goodscat">
	<head>
		<title>青春颂</title>
		<meta charset="utf-8">
		<link href="/css/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
		<link href="/css/taobao.css" media="all" rel="stylesheet" type="text/css" />
	<!--
		angular js .
		<link href="/css/master.css" media="all" rel="stylesheet" type="text/css" />
		<script type="text/javascript"  src="/js/angular.min.js"></script>
		<script type="text/javascript"  src="/js/angular-cookies-1.0.0rc10.js"></script>
		<script type="text/javascript"	src="/js/app.js"></script>
		<script type="text/javascript"	src="/js/controller.js"></script>
	-->
	</head>
		
	<body>
		<!-- wait
		<div ng-view>
			
		</div>
		-->
		<div id="main">
		<div id="navigate"></div>
		<div class="red"></div>
		<div id="container">
		<ul>
	<? foreach($goods as $goods_val): ?>
		<li class="item">
			<a href=<?php echo $goods_val['click_url'];?> class="thumb" target="_blank"><img src=<?php echo $goods_val['pic_url'] ?> ></a>
			<a href="#" class="title"><?php echo $goods_val['title'] ?></a>
			<p class="description">
				
			</p>
		</li>
	<?php endforeach;?>
		</ul>
		</div>
		<div><p id="page_nav" class="clear"><a href="/like/2">2</a></p></div>
		</div>
	</body>
		<script type="text/javascript"	src="/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript"  src="/js/jquery.masonry.min.js"></script>
		<script type="text/javascript"  src="/js/jquery.infinitescroll.js"></script>
		<script type="text/javascript"  src="/js/main.js"></script>
</html>
