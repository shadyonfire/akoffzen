<?php

	setcookie("_auth","",time()-3600,"/");
	setcookie("_email","",time()-3600,"/");
	header("location:index.php");
?>