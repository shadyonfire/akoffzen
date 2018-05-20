<?php
require("check_login.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Machenzie</title>
	<meta ng-model="data.viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<link rel="stylesheet" href="header.css" >

	<link rel="shortcut icon" href="../images/favicon.ico">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
	
</head>
<body>

	
	 <!-- Navigation header starts here-->
   <?php require('header.php');?>
      <div class="container-fluid text-center justify-content-center" style="margin-top: 65px;font-size: 50px">Quiz-List</div>
   <div class="container-fluid">
   		
   			<?php
   					require("../modules/connection.php");
   					$query="select * from quiz_info";
   					$query=$conn->query($query) or die("err");
   					$count=1;
   					if($query->num_rows>0){
   						echo '<table class="thead-dark	table-hover table-striped text-center" 	style="font-size:20px;margin-top:40px;width:100%">
   							<thead class=" white">
   								<tr>
   									<th>Quiz No.</th>
   									<th>Quiz Name</th>
   									<th>Leaderboard</th>
   									<th>View</th>
   									<th>Instruction</th>
                              <th>Image</th>

   								</tr>
   							</thead>
   						<tbody>';
   						while($row=$query->fetch_assoc()){
							echo '<tr>
   							<td>'.$row["id"].'</td>
   							<td>'.$row["name"].'</td>
   							<td><a href="../leaderboard.php?quiz='.$row["id"].'">Leaderboard</a></td>
   							<td><a href="view.php?quiz_id='.$row["id"].'">View</a></td>
   							<td><a href="instruction_editor.php?quiz_id='.$row["id"].'">Instruction</a></td>
                        <td><a href="competition_image.php?quiz_id='.$row["id"].'">Image</a></td>

   							</tr>
   							';
   							$count++;
   						}
   						echo '</tbody></table>';
   					}
   					else{
   						echo '<div style="width:100%;text-align:center;margin-top:65px;font-size:30px;color:red"><i>Currently No Data</i></div>';
   					}
   				
   				
   			?>
   			</tbody>
   		</table>

   </div>

	
</body>
</html>