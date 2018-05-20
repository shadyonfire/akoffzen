<?php
	require("connection.php");
	$quiz_info="select * from quiz_info where id=".$_COOKIE["quiz_id"];
	$questions="select question_no,question,question_type from quiz_ques where quiz_id=".$_COOKIE["quiz_id"];
	$answers="select question_no,answer_no,answer from quiz_ans where quiz_id=".$_COOKIE["quiz_id"];
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
	$quiz_arr["questions"]=$ques;
	print_r(json_encode($quiz_arr));

?>