<?php include("check_login.php"); ?>

<?php
require("check_login.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Akoffzen</title>
	<meta ng-model="data.viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<link rel="stylesheet" href="admin/header.css" >
	<link rel="shortcut icon" href="../images/favicon.ico">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>	
</head>
<body ng-app="app" ng-controller="ctrl">

	
	 <!-- Navigation header starts here-->
   <?php require('header.php');?>

   <div class="container-fluid text-center justify-content-center" style="margin-top: 65px;font-size: 50px">Leaderboard</div>
   <div class="container-fluid">
   		
   			<?php
   				if(isset($_GET["quiz"])){
   					
   					$quiz_id=$_GET["quiz"];
   					require("modules/connection.php");
   					$query="select * from records where quiz_id=".$quiz_id." order by score desc,remaining_time asc";
   					$query=$conn->query($query) or die("err");
   					$count=1;
   					if($query->num_rows>0){
   						echo '<table class="thead-dark	table-hover table-striped text-center" 	style="font-size:20px;margin-top:40px;width:100%">
   							<thead class=" white">
   								<tr>
   									<th>Rank</th>
   									<th>Name</th>
   									<th>Score</th>
   								</tr>
   							</thead>
   						<tbody>';
   						while($row=$query->fetch_assoc()){
							echo '<tr>
   							<td>'.$count.'</td>
   							<td>'.$row["name"].'</td>
   							<td>'.$row['Score'].'</td>
   							</tr>';
   							$count++;
   						}
   					}
   					else{
   						echo '<div style="width:100%;text-align:center;margin-top:65px;font-size:30px;color:red"><i>Currently No Data</i></div>';
   					}
   				}
   				else{
   					echo '<div style="width:100%;text-align:center;margin-top:65px;font-size:30px"><u>No Quiz Selected</u></div>';
   				}
   			?>
   			</tbody>
   		</table>

   </div>
</body>
</html>