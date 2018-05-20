<?php
require("check_login.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Machenzie</title>
	<meta ng-model="data.viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<link rel="stylesheet" href="header.css" >

	<link rel="shortcut icon" href="../images/favicon.ico">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

	<style>
	input{
		width:150px;
		margin: 10px;
	}
	form pre{
		font-family:Sans-serif;
		font-weight: bold;
		color:white;
	}
</style>
</head>
<body ng-app="app" ng-controller="ctrl">

	
	 <!-- Navigation header starts here-->
   <?php require('header.php');?>

	<div class="container col-md-12 justify-content-center row bg-dark" style="margin-top: 65px">
		<form name="create_quiz	">
		<pre>
					<h1>Create Quiz</h1>
		Title:               <input type="text" placeholder="Quiz Name" ng-model="data.title">
		Start time:      <input type="text" placeholder="in format yyyy-mm-dd hh-mm-ss" ng-model="data.s_time">
		End Time:      <input type="text" placeholder="in format yyyy-mm-dd hh-mm-ss" ng-model="data.e_time">
		Allowed time:<input type="number" placeholder="allowed time in minutes" ng-model="data.total_time">
		difficulty level: <select ng-model="data.difficulty">
		<option value="1">easy</option>
				<option value="2">medium</option>
				<option value="3">hard</option>
				</select>
<!--
		description:   <input type="textarea" rows="4" cols="20" placeholder="description" ng-model="data.description">   
-->
		entry price:    <input type="number" placeholder="entry price in rupees" ng-model="data.price">
		prize:              <input type="number" placeholder="prize money" ng-model="data.prize">	
		
		<input type="submit" value="create quiz" ng-click="show()">
		</pre>
		</form>
	</div>

	<script>
		var app=angular.module("app",[]);
		app.controller("ctrl",function($scope,$http,$location){
			$scope.data={};
			$scope.show=function(){
				$http.post("../modules/insert_quiz.php",data=$scope.data)
				.then(function(res){
					alert(res.data);
				},function(){
					alert("error");
				});
			}
		});	
	</script>
</body>
</html>