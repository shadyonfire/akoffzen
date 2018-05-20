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
   
	
</head>
<body ng-app="app" ng-controller="ctrl" >

	
	 <!-- Navigation header starts here-->
   <?php require('header.php');?>
      <div class="container-fluid text-center justify-content-center" style="margin-top: 65px;font-size: 50px">Quiz-<?php echo $_GET["quiz_id"];?> : Questions</div>
   <div class="container-fluid">
   		
   			<?php
   					require("../modules/connection.php");
   					$quiz_info="select * from quiz_info where id=".$_GET["quiz_id"];
                  $questions="select question_no,question,question_type from quiz_ques where quiz_id=".$_GET["quiz_id"];
                  $answers="select question_no,answer_no,answer from quiz_ans where quiz_id=".$_GET["quiz_id"];
                  $quiz_res=mysqli_query($conn,$quiz_info);
                  $ques_res=mysqli_query($conn,$questions);
                  $ans_res=mysqli_query($conn,$answers);
                  $quiz_arr=mysqli_fetch_assoc($quiz_res);
                  $question_arr=array();
                  $answers_arr=array();
                  while($row=mysqli_fetch_assoc($ques_res)) 
                     array_push($question_arr,$row);
   
                  while($row=mysqli_fetch_assoc($ans_res))  
                     array_push($answers_arr,$row);
                  $ques=$question_arr;
                  for($i=1;$i<=count($question_arr);$i++){
                  $ques[$i-1]["choices"]=array();
                     for($j=1;$j<=count($answers_arr);$j++){
                        if($answers_arr[$j-1]["question_no"]==$i){
                             array_push($ques[$i-1]["choices"],$answers_arr[$j-1]["answer"]);
                        }
                     }
                  }
                  
                  $count=count($ques);
   					if(count($ques)>0){
   						echo '<table class="thead-dark	table-hover table-striped text-center" 	style="font-size:20px;margin-top:40px;width:100%">
   							<thead class=" white">
   								<tr>
   									<th>Quiz No.</th>
   									<th>Quiz Name</th>
   									<th colspan="4">Choices</th>
   									</tr>
   							</thead>
   						<tbody>';
                     $i=0;
   						while($i<$count){
							echo '<tr>
   							<td style="width:10%">'.$ques[$i]["question_no"].'</td>
   							<td style="width:40%">'.$ques[$i]["question"].'</td>';
   							
                        for($j=0;$j<count($ques[$i]["choices"]);$j++){
                           echo '<td style="border:1px solid black">'.$ques[$i]["choices"][$j].'</td>';
                        }


                        echo '</tr>';
   						   $i++;
                     }
   					}
   					else{
   						echo '<div style="width:100%;text-align:center;margin-top:65px;font-size:30px;color:red"><i>Currently No Data</i></div>';
   					}
   				
   				
   			?>
   			</tbody>
   		</table>


   </div>
   <div ng-hide="add_ques" class="row container-fluid  justify-content-center text-center" style="margin-top: 30px">
      <div class="btn btn-primary" ng-click="add_ques=true">Add new Question</div>
   </div>
	<div ng-show="add_ques" class="justify-content-center text-center row">
      <div class="col-md-5 bg-dark" style="margin-top: 60px">
          <p style="font-size: 15px;color:white;text-align: right" ng-click="add_ques=false"> close X</p>
         <h4 style="color:white">Insert New question</h4>
      <input type="hidden" ng-init="ques.id=<?php echo $_GET["quiz_id"];?>">
      <input type="hidden" ng-init="ques.question_no=<?php echo $count+1;?>">

      <input type="text" ng-model="ques.question" class="col-md-8" style="margin:10px" placeholder="Question" required="">
      <br>
      <textarea rows="5" ng-model="ques.choices" class="col-md-8" style="margin:10px"  placeholder="Choices"></textarea required>
      <br>
      <input type="text" ng-model="ques.correct" class="col-md-8" style="margin:10px" placeholder="Answer number" required="">
      <br>
      <button ng-click="submit_ques()" class="col-md-8 btn-primary" style="margin:10px" >insert</button>
      </div>
   </div>


<script type="text/javascript">
   var app=angular.module("app",[]);
   app.controller("ctrl",function($scope,$http,$location){
      $scope.add_ques=false;

      $scope.submit_ques=function(){


         if($scope.ques.question !=null && $scope.ques.choices !=null && $scope.ques.correct !=null ){
         $http.post("insert_question.php",data=$scope.ques)
         .then(function(res){
               alert(res.data);

         });
      }
      }
   });
</script>   
</body>
</html>