<?php
if(isset($_COOKIE["_auth"]) && isset($_COOKIE["_email"])){
	if($_COOKIE["_auth"]!=md5(md5($_COOKIE["_email"]))){
		header("location:index.php");
	}	
}
else{
	header("location:index.php");
}
?>