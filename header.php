<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
?>
<nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php" style="font-size:40px;color:white;font-weight:bolder">
          AKOFFZEN
        </a>
        <button class="navbar-toggler" style="width:auto;border-color:black;border-radius: 5px" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         	<div class="icon-bar"></div>
	        <div class="icon-bar"></div>
    	    <div class="icon-bar"></div> 
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive" >
          <ul class="navbar-nav ml-auto">
            
            <li class="nav-item">
              <a class="nav-link" href="aboutus.php">About</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="Contact.php">Contact</a>
            </li>

            
            <?php
                  if(isset($_COOKIE["_auth"]) && isset($_COOKIE["_email"])){
                      if($_COOKIE["_auth"]==md5(md5($_COOKIE["_email"]))){
                          echo '<li class="nav-item">
                                <a href="competitions.php" class="nav-link">Competitions</a> 
                                </li
                                <li class="nav-item">
                                <button class="btn btn-block login-btn"><a href="logout.php">Logout</a> </button>
                                </li';
                      } 
                      else{
                         echo '<li class="nav-item">
                                <button class="btn btn-block login-btn">Login </button>
                                </li';
                      }
                  }
                   else{
                         echo '<li class="nav-item">
                                <button class="btn btn-block login-btn">Login </button>
                                </li';
                      }
            ?>
          </ul>
        </div>
      </div>
    </nav>
