/* App Module */

angular.module('goodscat', ['ngCookies']).
  config(['$routeProvider', function($routeProvider) {
	    $routeProvider.
	        when('/goods', {templateUrl: 'partials/goods-list.html',   controller: PhoneListCtrl}).
	        when('/goods/:goodsId', {templateUrl: 'partials/goods-detail.html', controller: PhoneDetailCtrl}).
	        otherwise({redirectTo: '/goods'});
}])
.directive('addMasonry', function($timeout) {
  return {
    restrict: 'A',
    link: function(scope, element) {	
		if (scope.$last){
       		//scope.container.masonry('reload');
    	}
    }
  };
})
