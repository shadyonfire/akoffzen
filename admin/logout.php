<?php

	setcookie("admin_auth","",time()-3600,"/");
	setcookie("email","",time()-3600,"/");
	header("location:index.php");
?>