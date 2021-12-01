<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $username = $_POST['username'];
  $password = $_POST['password'];

  if(empty($username) || empty($password)){
    $_SESSION['login_error'] = "Username and password cannot be empty";
  }else{
    require("controller/login.php");
    verifyLogin($username, $password);
    echo $row['firstname'];
    if(empty($_SESSION['firstname'])){
      $_SESSION['login_error'] = "Username or password is incorrect";
    }else{
      $_SESSION['login_error'] = '';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Auto Matrix: Advanced Auto Leasing </title>
  <link rel = "icon" href = "image/Autologo.png" type = "image/x-icon">
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
  <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
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
			  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
			  <a class="nav-link" href="about.php">About Us</a>
			</li>
    
      
      <li class="nav-item">
        <?php
            if(empty($_SESSION['firstname'])){
              echo '<a class="nav-link" type="button"  data-bs-toggle="modal" data-bs-target="#modalForm" > Signin</a>';
            }else{
              echo "<a class='nav-link' href='logout.php'>Logout</a>";
            }
          ?>

			  
			</li>
            
		  </ul>		  
		</div>
	  </div>
	</nav>
  <header>
    <!-- <img src="image/baner.jpg" alt="banner image" style="width: 100%; height: 30%;"> -->
  </header>

  <main>
  <div class="indexpara" >
    <h1>Automatrix: Superior Car Leasing. Same Monthly Payments </h1>
          </div>
         

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
<div class="section-container">
         <div class="columns image" style="background-image:url('image/about.jpg'); height:45vh">
            &nbsp;
         </div>
         <div class="columns content">
            <div class="content-container">
               <h5>Who we are?</h5>
               <p>
               Through AutoMatrix we offer all the advantages of leasing and in addition solve its shortcomings, meaning you get to choose 4 vehicles while signing up for the lease with an option to change your vehicle 3 times a year, i.e., you get an economical sedan during as your primary car, and All-Wheel-Drive vehicle for your winter hauling, a peppy convertible for your summer getaway and large comfy minivan for your family getaway All Under the Same Plan.
                  </p>
            </div>
         </div>
      </div>
      <div class="section-container">
         <div class="columns content">
            <div class="content-container">
               <h5>What we do?</h5>
               <p>
                 we are trying to reimagine vehicle ownership and leasing. The theory behind leasing a vehicle is similar to that of renting one – but for a longer period. Let’s say you are leasing a vehicle for 5 years; you will have a monthly payment for the said period and once that is over you can payout the remaining amount to take the full ownership of the vehicle or you can get a new one from the same dealership at a discounted rate usually described as the loyalty discount. 
                  </p>
            </div>
         </div>
         <div class="columns image" style="background-image:url('image/tyler-clemmensen-Zs_L-plsZzg-unsplash.jpg');height:45vh">
            &nbsp;
         </div>
      </div>
      <div class="section-container">
         <div class="columns image" style="background-image:url('image/vw-beetle-gae59ac4bc_1920.jpg');height:45vh">
            &nbsp;
         </div>
         <div class="columns content">
            <div class="content-container">
               <h5>Why we do it?</h5>
               <p>
               Like everything this process to has its own advantages and disadvantage, the advantage being all the service and repair is done by the dealership itself so that you have a hassle-free experience with the rates for that being included in the periodical payments. The disadvantage being that you are stuck with the same car for the period, irrespective of you living conditions or circumstances. 
                 </p>
            </div>
         </div>
      </div>
</main>

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
</html>