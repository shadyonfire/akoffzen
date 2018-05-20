<?php

	if(isset($_POST["quiz_id"])){
		setcookie("quiz_id",$_POST["quiz_id"],time()+86400,"/");
		header("location:quiz.php");
	}



?>