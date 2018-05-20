<?php
	if(isset($_COOKIE["admin_auth"]) && isset($_COOKIE["email"])){
	if($_COOKIE["admin_auth"]==md5(md5($_COOKIE["email"]))){
		header("location:dashboard.php");
	}	
}
?>
<html>
<head>
	<style>
		body{
			margin;0px;
			background-color: #53ECA0;
		}
		.form-login{
			width:100%;
			height:500px;
			justify-content: center;
			margin:10px auto;
		}
		.form-login form{
			width: 100%;
			text-align: center;
			margin-top: 100px;
		}
		.form-login input{
			margin: 10px;
			text-align: center;
			width:270px;
			padding: 12px 20px;
    		box-sizing: border-box;
	
		}

	</style>
</head>
<body>
	<div class="form-login">
		
	<form method="post" action="auth_login.php"><br>
		<h1>Login</h1>
	<input type="email" name="email"><br>
	<input type="password" name="password"><br>
	<input type="submit">	
	</form>
	</div>

</body>
</html>