<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Auto Matrix: Our Ideology</title>
  <link rel = "icon" href = "image/Autologo.png" type = "image/x-icon">
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
  <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/d4bb01feb8.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/abt.css">
  

</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
	  <div class="container-fluid ">
		<a class="navbar-brand" href="index.php"><img src="image/Autologo.png" id="logo"></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
		  <ul class="navbar-nav ">
			<li class="nav-item">
			  <a class="nav-link" aria-current="page" href="index.php">Home</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="getaquote.php">Get A Quote</a>
			</li>			
      <li class="nav-item">
			  <a class="nav-link"  href="documentsupload.php">Documents</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="contact.php">Contact</a>
			</li>	
            <li class="nav-item">
			  <a class="nav-link active" href="about.php">About Us</a>
			</li>
            <li class="nav-item">
            <?php
            if(empty($_SESSION['firstname'])){
              echo '<a class="nav-link" type="button"  data-bs-toggle="modal" data-bs-target="#modalForm" > Signin</a>';
            }else{
              echo "<a class='nav-link'  href='logout.php'>Logout</a>";
            }
          ?>
			</li>
		  </ul>		  
		</div>
	  </div>
	</nav>
  <header>
  </header>
  <div class="about">
        <div class="inner-section">
            <h1>About Us</h1>
            <p class="text">
            We are trying to reimagine vehicle ownership and leasing. The theory behind leasing a vehicle is similar to that of renting one – but for a longer period. 
                             Through AutoMatrix we offer all the advantages of leasing and in addition solve its 
                             shortcomings, meaning you get to choose 4 vehicles while signing up for the lease with 
                             an option to change your vehicle 3 times a year, i.e., you get an economical sedan during 
                             as your primary car, and All-Wheel-Drive vehicle for your winter hauling, a peppy 
                             convertible for your summer getaway and large comfy minivan for your family getaway 
                             All Under the Same Plan. 
                    </p>
            <div class="skills">
              <a href ="contact.php">  <button type="button" >Contact Us</button></a>
            </div>
        </div>
    </div>

    <footer id="footer" class="footer-1">
    <div class="main-footer widgets-dark typo-light">
    <div class="container">
    <div class="row">
    
      <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="widget subscribe no-box">
    <h5 class="widget-title">Auto Matrix<span></span></h5>
    <p>Advanced Auto Leasing</p>
    </div>
    </div>
    
      
    <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="widget no-box">
    <h5 class="widget-title">Quick Links<span></span></h5>
    <ul class="thumbnail-widget">
    <li>
    <div class="thumb-content"><a href="getaquote.php">&nbsp;Get A Quote</a></div>	
    </li>
    <li>
    <div class="thumb-content"><a href="documentsupload.php">&nbsp;Documents</a></div>	
    </li>
    <li>
    </ul>
    </div>
    </div>
    
      
    
          <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="widget no-box">
    <h5 class="widget-title">Follow up<span></span></h5>
                <a href="https://www.facebook.com/"> <i class="fa fa-facebook"> </i> </a>
                <a href="https://twitter.com/home"> <i class="fa fa-twitter"> </i> </a>
                <a href="https://www.youtube.com/"> <i class="fa fa-youtube"> </i> </a>
    </div>
    </div>
    <br>
      <br>
    
    
    <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="widget no-box">
    <h5 class="widget-title">Contact Us<span></span></h5>
                <p>87 King Street, Down Town kitchener, Phone: (555) 555-8899</p>
      <div class="emailfield">
    <input name="uri" type="hidden" value="arabiantheme">
    <input name="loc" type="hidden" value="en_US">
    </form>  
    </div>
    </div>
    
    </div>
    </div>
    </div>
      
    <div class="footer-copyright">
    <div class="container">
    <div class="row">
    <div class="col-md-12 text-center">
    <p>Auto Matrix &copy; 2021</p>
    </div>
    </div>
    </div>
    </div>
    </footer>
  </body>
  <!-- Click on Modal Button -->

<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <?php
            if(empty($_SESSION['firstname'])){
              
          ?>
              <form action="index.php" method="POST">
                  <div class="mb-3">
                      <label class="form-label">Username</label>
                      <input id="placehol" type="text" class="form-control" id="username" name="username" placeholder="Username" />
                  </div>
                  <div class="mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                  </div>
                  <div class="modal-footer d-block">
                      <p class="float-start">Don't have an accout? <a href="Register.php">Sign Up</a> here!!</p>
                      <button type="submit" class="btn btn-warning float-end">Submit</button>
                  </div>
              </form>
          <?php
          
          }else{
            echo "<h2>Hi ".$_SESSION['firstname']."!!!</h2>";
          }
        ?>
          </div>
      </div>
  </div>
</div>
  </html
  
  
  
  
  