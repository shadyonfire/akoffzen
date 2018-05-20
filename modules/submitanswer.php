<?php

	$answer = file_get_contents('php://input');
	$answer=json_decode($answer);
	$answer=get_object_vars($answer);
	require("connection.php");
	$correct_answers=array();
	$query= "select question_no,correct_answer from quiz_ques where quiz_id=".($_COOKIE["quiz_id"]);
	$query=$conn->query($query);
	if($query->num_rows>0){
		while($row=$query->fetch_assoc())
		array_push($correct_answers,$row);
	}

	$cor_count=0;
	$incor_count=0;
	$unattempted=0;
	for($i=0;$i<count($correct_answers);$i++){ 
		
		if($answer["answer"][$i]==-1){
			$unattempted++;
		}

		else if($correct_answers[$i]["correct_answer"]==$answer["answer"][$i]+1){
				$cor_count++;
		}
		else{
			$incor_count++;
		}
	}
	//getting id of current user
	$query="select id,name from registration where email='".html_entity_decode($_COOKIE["_email"])."'";
	$query=$conn->query($query);
	$query=$query->fetch_assoc();
	$id=$query["id"];
	$name=$query["name"];


	//inserting result
	$score=3*$cor_count-$incor_count;
	$query="insert into records values({$_COOKIE['quiz_id']},{$id},'{$name}',{$cor_count},{$incor_count},{$unattempted},{$score},{$answer['time']})";
	$query=$conn->query($query);
	if($query){
		echo "submitted successfully";
	}
	else{
		echo "something Error Occured". $conn->error;
	}

	$conn->close();
?>