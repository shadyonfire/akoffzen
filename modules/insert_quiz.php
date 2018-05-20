<?php
		
		$data=file_get_contents('php://input');
		$data=json_decode($data);
		$data=get_object_vars($data);
		date_default_timezone_set("Asia/Kolkata");
		require("connection.php");
		$query = "insert into quiz_info values(null,'".$data["title"]."','".$data["s_time"]."','".$data["e_time"]."','".$data["total_time"]."',".$data["difficulty"].",null,'".$data["price"]."','".$data["prize"]."','competition.jpg')";

		if ($conn->query($query) === TRUE) {
    		print("Quiz_created");
    	}
		else {
   			 echo "Error: something happened,contact administrator".mysqli_error($conn);
		}
		$conn->close();
?>