<?php
    require("check_login.php");
    if(!isset($_COOKIE["quiz_id"])){
        header("location:competitions.php");
    }
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Akoffzen</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/quiz.css">
    <link rel="stylesheet" href="css/header.css">
    <style>
		
	</style>
</head>
<body ng-app="app" ng-controller="ctrl">
	 <!-- Navigation header starts here-->
    <?php include("header.php") ;?>



    <!--content starts here-->
    <div class="container col-md-10 text-right" style="margin-top: 65px;color:white"><h5>Time-left: {{time}} </h5></div>
    <div class="row container-fluid justify-content-center" style="margin-top: 5px;padding-left: 50px">
        <div class="card col-md-8">
            <div class="card-title text-center"><h1>{{quiz_name}}</h1>  <hr> </div>
            <div style="height:auto;width:110px;font-size:15px;margin-bottom:10px;padding-left:5px;border:1px solid black;border-radius: 5px;background-color: aqua;font-weight: bold"> Question : {{current_ques+1}}</div>
            <div style="margin-left:15px"><h3>{{contest[current_ques].question}}</h3></div>
            <div class="row" style='padding:15px'>
                <div class="col-md-5 card options question" ng-style="get_bg_color($index)" ng-click="answer($index)" ng-repeat="x in contest[current_ques].choices track by $index">{{x}}
                </div>
                
                
                <div class="col-md-12 container " style="margin-top: 50px; ">
                    <ul class="pagination text-center" align="center">

                        
                        

                        <li class="page-item"><a class="page-link" href="#" ng-click="current_ques=0">First</a></li>
                        <li class="page-item"><a class="page-link" href="#" ng-click="prev_question()">Prev</a></li>
                        
                        <li class="page-item"><a class="page-link" href="#" ng-click="next_question()">Next</a></li>
                        <li class="page-item"><a class="page-link" href="#" ng-disabled="last_question" ng-click="current_ques=contest.length-1">Last</a></li>
                        
                    </ul>
                </div>
                <div class="col-md-12" style="margin-top: 50px; "></div>
                
                <div class="col-md-2 btn btn-danger container-fluid analysis-btn" ng-click="analysis_window=true">Analyse</div>
                <div class="col-2" style="height: 10px"></div>
                <div class="col-md-2 btn btn-danger container-fluid" ng-click="submit()"><button class="btn btn-danger" ng-disabled="submitBtnDisabled">Submit</button></div>
            </div>


        </div>
    </div>

    <div class="analysis" ng-show="analysis_window">
        <div class="col-md-9 text-right text-white container-fluid" style="margin-top: 100px" ng-click="analysis_window=false">X
        </div>
        <div class="white col-md-8 container-fluid bg-light" style="margin-top: 10px">
            <div class="container-fluid col-md-12">
                    <h1>Analysis</h1>
                </div>
            <div style="display:inline-block;cursor: pointer;height:40px;width:40px;margin: 10px;background:green;padding: 10px 0px 0px 15px;border-radius: 50%" ng-repeat="x in answers track by $index" ng-style="get_options_bg_color(x)">
                {{$index+1}}
            </div>

            <div class="col-md-2 row" style="margin-top: 50px">
                <div style="cursor: pointer;height:40px;width:40px;margin: 10px;background:green;border-radius: 50%;background-color: green;padding-top: 10px"></div>
                <div class="col-md-2">Attempted</div>
                <div style="cursor: pointer;height:40px;width:40px;margin: 10px;background:green;border-radius: 50%;background-color: red   ;padding-top: 10px"></div>
                <div class="col-md-2">Attempted</div>

            </div>
        </div>        
    </div>
<script src="js/quiz.js"></script>
</body>
</html>