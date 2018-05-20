<?php
		
		$data=file_get_contents('php://input');
		$data=json_decode($data);
		$data=get_object_vars($data);
		require("../modules/connection.php");
		$choices=explode("<br>",$data["choices"]);
		
		$query= "insert into quiz_ques values({$data['id']},{$data['question_no']},'{$data['question']}','mcq',{$data['correct']})";
		$result=$conn->query($query);

		if($result){
		for($i=0;$i<count($choices);$i++){
			$j=$i+1;
			$query= "insert into quiz_ans values({$data['id']},{$data['question_no']},{$j},'{$choices[$i]}')";
			$result=$conn->query($query);
		}

		if($result){
			echo "inserted";
		}	
		else{
			echo "error";
		}
		}
		else{
			echo "error";
		}
		$conn->close();
?>