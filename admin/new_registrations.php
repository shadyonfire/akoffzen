<?php
require("check_login.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Machenzie</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<link rel="shortcut icon" href="images/favicon.ico">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	<style>
	#image-id{
		position: fixed;
		top:0;
		left:0;
		background-color: rgba(0,0,0,.9);
		z-index: 3;
		height: 100%;
		width: 100%;
	}
	</style>
	</head>
<body ng-app="app" ng-controller='ctrl'>
	
	 <!-- Navigation header starts here-->
  <?php require("header.php");?>  
	<div class="container" style="margin-top: 65px">
	
    <div class="btn-group container col-md-8" >
 		 <button type="button" class="btn btn-primary" ng-click="load('pending')">Pending</button>
		  <button type="button" class="btn btn-primary" ng-click="load('approved')">Approved</button>
  		<button type="button" class="btn btn-primary" ng-click="load('rejected')">Rejected</button>

	</div>
             
  	<table class="table table-hover table-striped	">
    	<thead>
      		<tr>
        	<th>Name</th>
        	<th>Email</th>
        	<th>Mobile</th>
        	<th>image_id</th>
        	<th>Action</th>
      		</tr>
    	</thead>
    	<tbody>
      		<tr ng-repeat="data in regs track by $index">
      			<td>{{data.name}}</td>
      			<td>{{data.email}}</td>
      			<td>{{data.mobile}}</td>
      			<td><img ng-src="{{image_url(data.image)}}" height="40" width="40" ng-click="open_image(data.image)"></td>
      			<td>
      				<div class="btn btn-success" ng-click="approve(data.id,data.status,1);" >{{btn_action(data.status,1)}}</div>
      				<div class="btn btn-danger" ng-click="approve(data.id,data.status,2);" >{{btn_action(data.status,2)}}</div>
      			</td>
      			</tr>
    	</tbody>
  	</table>
	</div>

	<div id="image-id" ng-show="image_show"  ng-click="image_show=false">
	<div class="container-fluid justify-content-center col-md-12">
		<img ng-src="{{image_url}}"  width="400" style="margin:65px 30%">	
	</div>
	</div>
<script>


	var app=angular.module("app",[]);
	app.controller("ctrl",function($scope,$http){

		$scope.image_url="";
		$scope.image_show=false;

		$scope.load=function(data){
		$http.get("../modules/fetch_registers.php?by="+data)
    	.then(function(response) {
        	$scope.regs=response.data;
        });
    	$scope.image_url=function(url){
    		return "../register_id/"+url;
    	};
    	}

    	$scope.load("pending");	


    	$scope.open_image=function(url){
    		$scope.image_url="../register_id/"+url;
    		$scope.image_show=true;
    		console.log($scope.image_url);
    	}

    	$scope.approve=function(id,s,i){
    		//	console.log(id,s,i);	
    		if(s=="pending"){
    			if(i==1) action="approved";
    			else action="rejected";
    		}
    		else if(s=="approved"){
    			if(i==1) action= "pending";
    			else action= "rejected";
    		}
    		else{
    			if(i==1) action= "approved";
    			else action="pending";
    		}
    		console.log(action);
    		$http.get("../modules/fetch_registers.php?id="+id+"&action="+action+"&fetch="+s)
    		.then(function(res){
    			$scope.regs=res.data;
       		},function(res){
    			alert("err");
    		});
    	}
    	$scope.btn_action=function(status,i){
    		if(status=="pending"){
    			if(i==1) return "approve";
    			else return "reject";
    		}
    		else if(status=="approved"){
    			if(i==1) return "pending";
    			else return "reject";
    		}
    		else{
    			if(i==1) return "approve";
    			else return "pending";
    		}
    	}
	});

</script>
</body>
</html>