<?php
class register{
	public static $err_msg;
	public function test_input($data) {
		  $data = trim($data);
  		  $data = stripslashes($data);
          $data = htmlspecialchars($data);
  	return $data;
	}
	public function insert($data,$file){
		require("connection.php");
		$name=$this->test_input($data['first_name']." ".$data["last_name"]);
		$query = "insert into registration values(NULL,'".$name."','".$data['email']."','".md5($data["password"])."','".$data['mobile']."','".$file["id_card"]["name"]."','pending')";

		if ($conn->query($query) === TRUE) {
    		header("location:../underreview.php");	
    	}
		else {
   			 echo "Error: something happened,contact administrator".mysqli_error($conn);
		}

	}	

	public function upload_img($_image){
		$target_dir = "../register_id/";
		$target_file = $target_dir . basename($_image["id_card"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
    		$check = getimagesize($_image["id_card"]["tmp_name"]);
    		if($check !== false) {
        		echo "File is an image - " . $check["mime"] . ".";
        		$uploadOk = 1;
    		}
    		else {
        		$this->errmsg= "File is not an image.";
        		$uploadOk = 0;
    		}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
    		$this->errmsg= "Sorry, file already exists.";
    		//$uploadOk = 0;
		}
		// Check file size
		if ($_image["id_card"]["size"] > 500000) {
    		$this->errmsg="Sorry, your file is too large.";
    		$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
    		$this->errmsg= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    		$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
    		$this->errmsg= "Sorry, your file was not uploaded.";
		// 	if everything is ok, try to upload file
    		return 0;
		}
		else {
    		if (move_uploaded_file($_image["id_card"]["tmp_name"], $target_file)) {
			return 1;
    		}
    	 	else {
        	$this->errmsg="Sorry, there was an error uploading your file.";
        	return 0;
    		}	
		}
	}

}

if(isset($_POST)){
		$reg=new register();
		if($reg->upload_img($_FILES)){	
				$reg->insert($_POST,$_FILES);
		}
		else{
			print($reg->errmsg);
		}
}

?>