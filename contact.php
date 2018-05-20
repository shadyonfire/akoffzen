<!DOCTYPE html>
<html>
<head>
	<title>Akoffzen</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<link rel="shortcut icon" href="images/favicon.ico">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
	 <!-- Navigation header starts here-->
    <?php require("header.php");?>

	<!-- landing page content starts here-->
	<div class="col-md-3"></div>
	<form id="contact-form" method="post" action="contact.php" role="form" class="col-md-6" style="margin:85px auto;background-color: 	#97c5d8;padding:50px">

    <div class="messages"></div>

    <div class="controls">
    	<h1 class="text-center">Contact Form</h1>
        <div class="row">
        	<div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Name *" required="required" data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
              
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <input type="submit" class="btn btn-success btn-send" value="Send message">
            </div>
        </div>
        
    </div>

</form>
</body>
</html>