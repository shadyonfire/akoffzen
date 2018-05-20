

	var app=angular.module("app",[]);
	app.controller("ctrl",function($scope,$http,$filter){
		$http.get("modules/fetch_contests.php")
    	.then(function(response) {
        	$scope.contest=response.data;
        	if($filter('filter')(response.data, {'status': 'live'}).length==0){
        		$scope.live_con="There is no live contest now."
        	}
        	if($filter('filter')(response.data, {'status': 'ended'}).length==0){
        		$scope.past_con="There is no past contests.";
        	}
        	if($filter('filter')(response.data, {'status': 'upcoming'}).length==0){
        		$scope.upcoming_con="There is no upcoming contest for now."
        	}
        });
        


	});