<?php
	
	function select($key){
		require("connection.php");
		$query="select id,name,email,mobile,image,status from registration where status ='".$key."' order by id desc";
		$result = $conn->query($query) or die(" error");
		$res=array();
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				array_push($res,$row);
			}	
		}
		print_r(json_encode($res));
		$conn->close();
	}	
	if(isset($_GET["by"])){
		select($_GET["by"]);
	}
	if(isset($_GET["id"]) && isset($_GET["action"]) && isset($_GET["fetch"]) ){
		require("connection.php");
		$query="update registration set status='".$_GET['action']."' where id={$_GET["id"]}";
		$result = $conn->query($query);
		$conn->close();
		if($result){
				select($_GET["fetch"]);
		}
		else
			echo false;

	}

?>