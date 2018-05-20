<?php

	if(isset($_POST["instruction"])){
		require("../modules/connection.php");
		$query="select * from instructions where quiz_id=".$_POST["id"];
		$query=$conn->query($query);
		if($query->num_rows>0){
			$query="update instructions set instruction='".$_POST["instruction"]."' where quiz_id=".$_POST["id"];
		}
		else{
			$query="insert into instructions values({$_POST["id"]},'{$_POST["instruction"]}')";
		}
		if($conn->query($query))
			echo "updated";
		else
			echo "error";
		

	}


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="header.css"/>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<link rel="stylesheet" href="header.css" >

	<link rel="shortcut icon" href="../images/favicon.ico">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
	
</head>
<body>
	<?php include("header.php");?>
	<div id="sample" style="width:80%;margin: 100px auto">
 		<h1>Instruction for Quiz : <?php echo $_GET["quiz_id"];?></h1>
  	<form method="post" action="#">
  	<input type="hidden" name="id" value="<?php echo $_GET["quiz_id"];?>">
 	<textarea name="instruction" style=" auto;width: 100%; height: 200px;">
	</textarea>
	<br>
	<button type="submit" value="update" style="background-color: green;height:70px"><h1>Update</h1></button>
	</form>
</div>


 
</body>
</html>