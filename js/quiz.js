    //jquery
    $(".page-link").click(function(){
        $(".question").fadeOut(0);
        $(".question").fadeIn();
    });
    

    //angular js
	var app=angular.module("app",[]);
	app.controller("ctrl",function($scope,$http,$timeout){
        $scope.submitBtnDisabled=false;
        $scope.quiz_name="Quiz name"
        $scope.analysis_window=false;
        $scope.current_ques=0;
        $scope.first_question=true;
        $scope.last_question=false;
        var total_questions=0;
        var quiz_id=1;
        $scope.answers=new Array();
		$http.post("modules/fetch_quiz.php")
    	.then(function(response) {
        	$scope.contest=response.data.questions;
            $scope.quiz_name=response.data.name;
            for(i=0;i<$scope.contest.length;i++){
                $scope.answers[i]=-1;
            }
            time=response.data.allowed_time*60+1;
            total_time=time;
            timer();
        },function(res){
            alert(res.data);
        });
        $scope.next_question=function(){
            if($scope.current_ques<$scope.contest.length-1)
                        $scope.current_ques+=1;
            if($scope.current_ques==$scope.contest.length-1){
                $scope.first_question=false;
                $scope.last_question=true;
            }
            else{
                $scope.last_question=false;
                $scope.first_question=false;
                
            }
        }
        $scope.prev_question=function(){
            if($scope.current_ques>0)
                        $scope.current_ques-=1;
            if($scope.current_ques==0){
                $scope.first_question=true;
                $scope.last_question=false;
            }
            else{
                $scope.first_question=false;
                $scope.last_question=false;
                
            }
            }

        var timer=function(){
            time-=1;
            minute=parseInt(time/60);
            sec=time%60;
            if(sec<10)
                $scope.time=minute+":0"+sec;
            else
                $scope.time=minute+":"+sec;
        
            if(time<=0){
                if(!$scope.submitBtnDisabled)
                    $scope.submit();
            }
            
            else{
                $timeout(timer,1000);       
            }
        
        }

        $scope.answer=function(i){
            if($scope.answers[$scope.current_ques]==-1 || $scope.answers[$scope.current_ques]!=i)
                $scope.answers[$scope.current_ques]=i;
            else
                $scope.answers[$scope.current_ques]=-1;

        }
        $scope.get_bg_color=function(i){
    
                if($scope.answers[$scope.current_ques]==i)
                    return {"background-color":"grey"};
                else{
                
                    return {"background-color":"white"};
                 }
        }
        $scope.get_options_bg_color=function(i){
    
                if(i!=-1)
                    return {"background-color":"green"};
                else{
                
                    return {"background-color":"red"};
                 }
        }
        $scope.submit=function(){
            if(time!=0)
                if(!confirm("Do you really want to submit?\nPress: OK\nElse Cancel and Analyse")){
                    return; 
                }

            $scope.submitBtnDisabled=true;
            data={"answer":$scope.answers,"time":time};
            console.log(data);
            $http.post("modules/submitanswer.php",data=data)    
            .then(function(res){
                alert(res.data);
            },function(res){
                alert("Error Happened.");
            });
            time=1;
        }
        
	});

