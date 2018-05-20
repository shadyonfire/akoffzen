<?php

if(isset($_POST["email"]) && isset($_POST["password"])){
	require('../modules/connection.php');
	$query="select * from admin_info";
	$res=mysqli_query($conn,$query);
	if($res) {	
		$res_arr=mysqli_fetch_assoc($res);
		if(md5($_POST["password"])==$res_arr["password"]){
			setcookie("admin_auth",md5(md5($_POST["email"])),time()+86400*10,"/");
			setcookie("email",$_POST["email"],time()+60*60*60,"/");
			header("location:dashboard.php");
		}
		else{
			echo "wrong";
		}

	}

}
else{
	echo "unauthorized access";
}


?>