<?php 
	if(isset($_GET["quiz_id"])){
		require("../modules/connection.php");
		$query="select image from quiz_info where id=".$_GET["quiz_id"];
		$query=$conn->query($query);
		if($query){
			$img_url="../images/quiz_banner/".$query->fetch_assoc()["image"];
		}
		else{
			$img_url="../images/quiz_banner/error.jpg";
		}
	}
	else{
		echo "no quiz select";
	}


	if(isset($_POST["quiz_id"])){
		$target_dir = "../images/quiz_banner/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
		if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
			require("../modules/connection.php");
			$query="update quiz_info set image='".$_FILES["image"]["name"]."' where id=".$_POST["quiz_id"];
			if($conn->query($query)){
				$status="success";
			}
			else{
				$status="failed";
			}
		}
	}

	
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<style type="text/css">
		body{
			margin: 0px;
			background-color: #e3edef;
		}
	</style>
</head>
<body>
	
	<?php require("header.php");?>
	
	<div class="container-fluid row" style="margin-top:150px;font-size: 40px">
		<div class="col-md-3"></div>
		<div class="col-md-6 bg-success justify-content-center text-center">
			<h1> Image banner for quiz <?php echo $_GET["quiz_id"];?></h1>
			<img src="<?php echo $img_url;?>" style="margin-bottom: 10px;height:150px">
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-3"></div>
		<div class="col-md-6  justify-content-center text-center" style="margin-top: 35px;background-color: #97c5d8">
			<h1 class="bg-danger"><?php if(isset($status)){echo $status;}?></h1>
			<h1>Upload another for this quiz_id</h1>
			<form method="post" action="#" enctype="multipart/form-data" style="font-size: 10px;margin:25px">
					<input type="hidden" name="quiz_id" value="<?php echo $_GET["quiz_id"]?>"><br>
					<input type="file" name="image" class="form-control input-sm" required><br>
					<input type="submit" value="upload" class="btn btn-success" >
			</form>
		</div>
		<div class="col-md-3"></div>
				
		
	</div>
</body>
</html>