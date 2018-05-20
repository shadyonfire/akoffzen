<?php
if(isset($_COOKIE["admin_auth"]) && isset($_COOKIE["email"])){
	if($_COOKIE["admin_auth"]!=md5(md5($_COOKIE["email"]))){
		header("location:index.php");
	}	
}
else{
	header("location:index.php");
}


?>