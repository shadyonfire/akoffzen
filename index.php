<?php
if(isset($_COOKIE["_auth"]) && isset($_COOKIE["_email"])){
	if($_COOKIE["_auth"]==md5(md5($_COOKIE["_email"]))){
		header("location:competitions.php");
	}	
	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Akoffzen</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
	 <!-- Navigation header starts here-->
    <?php require("header.php");?>

	<!-- landing page content starts here-->
	<div class="row">
	<div class="col-md-7">
		<div class="container-fluid">
			<div class="jumbotron jumbotron-fluid mb-0" style="color:white;background-color: transparent;padding-top: 200px">
   				<div class="container">
    				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    							<ol class="carousel-indicators" style="margin-bottom: -50px">
    								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" style="width:15px;height:15px;border-radius: 50%"></li>
								    <li data-target="#carouselExampleIndicators" data-slide-to="1" style="width:15px;height:15px;border-radius: 50%"></li>
    								<li data-target="#carouselExampleIndicators" data-slide-to="2" style="width:15px;height:15px;border-radius: 50%"></li>
  							</ol>
  							<div class="carousel-inner" role="listbox">
    								<div class="carousel-item active">
      									<div class="row justify-content-center text-center">
               								<div class="col-md-10 col-lg-11">
                 								 <h1 class="display-10 white" style="font-size: 50px"><span style="color:aqua;font-size: 70px">
                      								<u>A</u>koffzen</span><br> presents<br>
                    								<i style="color:red">Great Talent <br>Get more Opportunity</i>
    							                 </h1>

                 

            								   </div>
            								</div>
    								</div>
    								<div class="carousel-item">
      										<img class="d-block img-fluid" src="images/carousel/image1.jpg" alt="Second slide" style="width:80%;margin:0px auto;">
    								</div>
								    <div class="carousel-item">
      										<img class="d-block img-fluid" src="images/carousel/image2.jpg" alt="Third slide" style="width:80%;margin:0px auto;">
    								</div>
  							</div>
  							<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
   							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
   							<span class="sr-only">Previous</span>
  							</a>
  							<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
 						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    						<span class="sr-only">Next</span>
  							</a>
						</div>
   				</div>
  			</div>
		</div>
	</div>
	<div class="col-md-5" style="padding-top: 50px;padding-left: 50px">
		<div class="container">
        <div class="row centered-form">
        <div class="col-xs-10 col-sm-10 col-md-10 		">
        	<div class="panel panel-default">
        		

			 			<div class="panel-body">
			    		<form role="form" method="post" action="modules/register.php" enctype="multipart/form-data">
			    			<div class="row">
			    				<div class="text-center col-md-12"><h1>Registration</h1></div>
			    					
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                			<input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name" required>
			    					</div>
			    				</div>
			    			</div>

			    			<div class="form-group">
			    				<input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" required>
			    			</div>

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password" required onkeyup="confirm()">
			    					</div>
			    				</div>
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">
			    						<input type="number" name="mobile" id="mobile" class="form-control input-sm" placeholder="Mobile Number(PayTm/UPI)" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-12 col-sm-12 col-md-12">
			    					<div class="form-group">
			    						<p class="margin:-40px 0px">Student ID</p>
			    						<input type="file" name="id_card" id="id_card" class="form-control input-sm" placeholder="School Id card" required>
			    					</div>
			    				</div>

			    			</div>
			    			<input type="checkbox" name="terms" required>  I agree to <a href="terms.php">terms and conditions</a></input>
			    			<input type="submit" value="Register" class="btn btn-info btn-block">
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    	</div>
    </div>
</div>
    <!--registration form-->

<div class="login-form">
	<div class="row" style="margin-top: 150px;">
		<div class="col-md-4 col-sm-1 col-xs-1"></div>
		<div class="col-md-4 col-sm-8 col-xs-8 col-md-offset-3">

			<div class="panel-body">
					<form role="form" method="post" action="modules/auth_login.php">
							<div class="form-group form-control"  style="padding-top: 30px">
								<h1 class="text-center">Login </h1>
								<input type="email" name="email" class="form-control" placeholder="Email"><br>
								<input type="password" name="password" class="form-control" placeholder="password"><br>
								<input type="submit" name="login" value="login" class="btn btn-block">
								<br>
								<br>
								not registered ? <span class="register" style="color:blue;cursor: pointer;">Register</span> first!
							</div>
			    	</form>
			    	
			    	</div>
			    </div>
			    </div>

</div>
<footer>
	All Rights Reserved &copy; Akoffzen Group
</footer>



<script src="js/index.js"></script>
<script type="text/javascript">
	pass_check=0;
	function confirm(){
		var x= document.getElementsByName("password")[0].value;
		var y=document.getElementsByName("password_confirmation")[0].value;
		console.log(x,y);
		if(x==y){
			document.getElementsByName("password_confirmation")[0].style.backgroundColor="#CEE596";
			pass_check=1
		}
		else{
			document.getElementsByName("password_confirmation")[0].style.backgroundColor="#E86935";
			pass_check=0;
		}
			
	}

</script>
</body>
</html>