<?php

if(isset($_POST["email"]) && isset($_POST["password"])){
	require('connection.php');
	$query="select * from registration where email='".$_POST['email']."'";
	$res=mysqli_query($conn,$query);
	if($res) {	
		$res_arr=mysqli_fetch_assoc($res);
		if(md5($_POST["password"])==$res_arr["password"]){
			if($res_arr["status"]=="rejected"){
				header("location:../rejected.php");
			}	
			else if($res_arr["status"]=="pending"){
				header("location:../underreview.php");
			}
			else{
				setcookie("_auth",md5(md5($_POST["email"])),time()+86400*10,"/");
				setcookie("name",$res_arr["name"],time()+86400*10,"/");
				setcookie("_email",$_POST["email"],time()+60*60*60,"/");
				header("location:../competitions.php");
			}
		}
		else{
				header("location:../index.php?status=err");
		}
		
	}

}
else{
	header("location:../index.php");
}


?>