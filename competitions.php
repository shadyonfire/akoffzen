<?php require("check_login.php");?>

<!DOCTYPE html>
<html>
<head>
	<title>Machenzie</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<link rel="shortcut icon" href="images/favicon.ico">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/competition.css">
	<style>
		.com-card{
			margin:10px;
		}
        .navbar{
            background-color: black;
            max-width: 100%;
        }
		.icon-bar{
			background-color:white;
		}
	</style>
</head>
<body ng-app="app" ng-controller="ctrl">
	 <!-- Navigation header starts here-->
     <?php require("header.php");?>



    <!--content starts here-->

    <div class="row" style="padding: 0px 50px;margin-top: 75px;">
    	<div class="col-md-5">
    		<div class="card" style="padding: 0px 10px ">
    			<div class="row">
    				<div class="col-md-5">
    					<img src="images/profile.png" height="150px">
    				</div>
    				<div class="col-md-7 justify-content-center" style="padding-top: 50px">
    					<h1><?php echo $_COOKIE["name"];?></h1>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    <div class="row live" style="margin-top: 50px;padding:0px 50px">
        <div class="col-md-12" style="background: linear-gradient(to right,black,white);height: 50px;color:white;font-size: 30px">
            Live Competitions
        </div>
        <div class="col-md-3 com-card" ng-repeat="con in contest | filter: {'status':'live'}">
            <div class="card">
                <img class="card-img-top" ng-src="images/quiz_banner/{{con.image}}" alt="Card image">
                <div class="card-body">
                        <h4 class="card-title">{{con.name}}</h4>
                        <p class="card-text tag" style="background-color: green"><b>{{con.status}}</b></p>
                        <p class="card-text">Time:{{con.allowed_time}}</p>
                        <p class="card-text">Price:{{con.fee}}</p>
                        <a ng-href="instructions.php?stai=asdnuix13bbage224bbe1bhbs&q={{con.id}}&dsjnjdbhx=rt7266%2bb" class="btn btn-primary justify-content-right text-right" align="right">More</a>
                 </div>
            </div>
        </div>
    </div>
    <div ng-bind="live_con" style="font-size: 30px ;color:white;padding-left:50px"></div>
    <div class="row past" style="margin-top: 50px;padding:0px 50px">
        <div class="col-md-12" style="background: linear-gradient(to right,black,white);height: 50px;color:white;font-size: 30px">
            Past Competitions
        </div>
        <div class="col-md-3 com-card" ng-repeat="con in contest | filter: {'status':'ended'}">
            <div class="card">
                <img class="card-img-top" src="images/quiz_banner/{{con.image}}" alt="Card image">
                <div class="card-body">
                        <h4 class="card-title">{{con.name}}</h4>
                        <p class="card-text white tag" style="background-color: red"><b>{{con.status}}</b></p>
                        <p class="card-text">Time:{{con.allowed_time}}</p>
                        <p class="card-text">Price:{{con.fee}}</p>
                 </div>
            </div>
        </div>
    </div>

    <div ng-bind="past_con" style="font-size: 30px ;color:white;padding-left:50px"></div>
    <div class="row upcoming" style="margin-top: 50px;padding:0px 50px">
        <div class="col-md-12" style="background: linear-gradient(to right,black,white);min-height: 50px;color:white;font-size: 30px">
            Upcoming Competitions
        </div>
        <div class="col-md-3 com-card" ng-repeat="con in contest | filter: {'status':'upcoming'}">
            <div class="card">
                <img class="card-img-top" src="images/quiz_banner/{{con.image}}" alt="Card image">
                <div class="card-body">
                        <h4 class="card-title">{{con.name}}</h4>
                        <p class="card-text white tag" style="background-color: yellow"><b>{{con.status}}</b></p>
                        
                        <p class="card-text">Time:{{con.allowed_time}}</p>
                        <p class="card-text">Price:{{con.fee}}</p>
                        
                 </div>
            </div>
        </div>
    </div>
    <div ng-bind="upcoming_con" style="font-size: 30px ;color:white;padding-left:50px"></div>

<script src="js/competition.js"></script>


</body>
</html>