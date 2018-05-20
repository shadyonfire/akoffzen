
<?php

	include("check_login.php");
	if(isset($_GET['q'])){
		$quiz_id=$_GET['q'];
		require("modules/connection.php");
		$query="select * from instructions where quiz_id=".$quiz_id;
		$query=$conn->query($query);
		if($query->num_rows){
			$query=$query->fetch_assoc();

		}
		else{
			$query=array();
			$query["instruction"]="<div style='color:red'>No instructions</div>";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Akoffzen</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<link rel="shortcut icon" href="images/favicon.ico">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
	
	 <!-- Navigation header starts here-->
    <?php require("header.php");?>


    <div class="row" style="margin-top:100px">
   		<div class="col-md-2">
   		</div>
   		<div class="col-md-8 text-center justify-content-center" style="border: 2px solid black;border-radius: 50px;background-color: #64D29B">
   			<h1>Guidelines</h1>
   			<div class="text-center" style="margin-top: 35px">
   			<?php echo $query["instruction"];?>
   			</div>
   		</div>


   		<div class="col-md-12 justify-content-center text-center" >
   			<form method="post" action="start_quiz.php">
   				<input type="hidden" name="quiz_id" value="<?php echo $_GET["q"];?>">
   				<button type="submit" class='btn btn-block btn-success col-md-1' style="margin:25px auto">Start>></button>
   			</form>
   		</div>
    </div>

</body>
</html>