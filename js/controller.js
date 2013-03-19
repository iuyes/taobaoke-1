function PhoneListCtrl($scope, $http) {
	$http.get('/index.php?r=dataDistribution/list').success(function(data) {
		$scope.goods = new Array();
		goods = angular.fromJson(data);
		angular.forEach(goods, function(value, key){
			obj = value.goods;
			obj.gid = value.gid;
			obj.cid = value.cid;
			$scope.goods.push(obj);
		});
		$scope.goodsnum  = $scope.goods.length;
	});
	  $scope.container = $('#container');
	  $scope.container.imagesLoaded(function() {
		  $scope.container.masonry({
			  singleMode      : true,
			  columnWidth     : 240,
			  itemSelector    : '.item',
			});
	  });
}
//PhoneListCtrl.$inject = ['$scope', '$http'];


function PhoneDetailCtrl($scope, $routeParams) {
	$scope.phoneId = $routeParams.phoneId;
}

//PhoneDetailCtrl.$inject = ['$scope', '$routeParams'];
