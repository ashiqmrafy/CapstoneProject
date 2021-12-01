<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $error = '';
  $flag = true;
  $firstname = trim($_POST['firstname']);
  $lastname = trim($_POST['lastname']);
  $address = trim($_POST['address']);
  $postalcode = trim($_POST['postalcode']);
  $phone = trim($_POST['phone']);
  $email = trim($_POST['email']);
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $confirmpassword = trim($_POST['confirmpassword']);
  
  
  if(empty($firstname) || !preg_match("/^[\\w ]+$/", $firstname)){
    $first_error = "Please Enter a Valid First Name. ";
    $flag = false;
  }
  if(empty($lastname) || !preg_match("/^[\\w ]+$/", $lastname)){
    $last_error = "Please Enter a Valid Last Name. ";
    $flag = false;
  }
  if(empty($address) || !preg_match("/^[a-z0-9 .\-]+$/i", $address)){
    $address_error = "Please Enter a Valid address. ";
    $flag = false;
  }
  if(empty($postalcode) || !preg_match('/^[a-z0-9 .\-]+$/i', $postalcode) || strlen($postalcode) != 6){
    $postal_error = "Please Enter a Valid Postal Code with length 6. ";
    $flag = false;
  }
  if(empty($phone) || !preg_match('/^[0-9]/', $phone) || strlen($phone) != 10){
    $phone_error = "Please Enter a Valid Phone Number with 10 Digits. ";
    $flag = false;
  }
  if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
    $email_error = "Please Enter a Valid EmailId. ";
    $flag = false;
  }
  if(empty($username)){
    $username_error = "Please Enter a Valid Username. ";
    $flag = false;
  }else{

  }
  if(empty($password) || strlen($password) < 8){
    $password_error = "Please Enter a Valid Password with 8 Characters or more. ";
    $flag = false;
  }
  if(strcmp($password, $confirmpassword) != 0){
    $password_error = $password_error."Your Passwords dont match. ";
    $flag = false;
  }

  if($flag){
    require("controller/login.php");
    register($firstname, $lastname, $email, $phone, $address, $postalcode, $username, $password);

    if(!empty($_SESSION['firstname'])){
      echo $_SESSION['firstname'];
    }
  }else{
    // echo "<script>alert('".$error."');</script>";
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Auto Matrix: Join Us</title>
  <link rel = "icon" href = "image/Autologo.png" type = "image/x-icon">
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
  <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/reg.css">
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
			  <a class="nav-link" href="about.php">About Us</a>
			</li>
            <li class="nav-item">
              <?php
                echo '<a class="nav-link active" type="button"  data-bs-toggle="modal" data-bs-target="#modalForm" > Signin</a>';
              ?>
			 
			</li>
            
		  </ul>		  
		</div>
	  </div>
	</nav>

<section class="h-100 bg-dark">
  <form action="register.php" method="POST" class="needs-validation">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
                <img
                  src="image/reg.jpg"
                  alt="Register"
                  class="img-fluid"
                  style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;"
                />
              </div>
              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase">Sign Up Here</h3>
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="firstname">First name</label>
                        <input type="text" id="firstname" placeholder="First Name" name="firstname" class="form-control form-control-lg" value="<?php
                          if(isset($firstname)){
                            echo $firstname;
                          }
                        ?>"/>
                        <span style="color: red;">
                            <?php
                              if(isset($first_error)){
                                echo $first_error;
                              }
                            ?>
                            </span>
                          
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="lastname">Last name</label>
                        <input type="text" id="lastname" placeholder="Last Name" name="lastname" class="form-control form-control-lg" value="<?php
                          if(isset($lastname)){
                            echo $lastname;
                          }
                        ?>"/>
                        <span style="color: red;">
                            <?php
                              if(isset($last_error)){
                                echo $last_error;
                              }
                            ?>
                            </span>
                        
                      </div>
                    </div>
                  </div>
  
  
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example8">Address</label>
                    <input type="text" id="form3Example8" placeholder="Address" name="address" class="form-control form-control-lg" value="<?php
                          if(isset($address)){
                            echo $address;
                          }
                        ?>"/>
                    <span style="color: red;">
                    <?php
                            if(isset($address_error)){
                              echo $address_error;
                            }
                          ?>
                          </span>
                    
                  </div>
  
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example90">Postal Code</label>
                    <input type="text" id="form3Example90" placeholder="Postal Code" name="postalcode" class="form-control form-control-lg" value="<?php
                          if(isset($postalcode)){
                            echo $postalcode;
                          }
                        ?>"/>
                    
                    <span style="color: red;">
                            <?php
                              if(isset($postal_error)){
                                echo $postal_error;
                              }
                            ?>
                            </span>
                  </div>
  
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example99">Phone</label>
                    <input type="text" id="form3Example99" placeholder="Phone" name="phone" class="form-control form-control-lg" value="<?php
                          if(isset($phone)){
                            echo $phone;
                          }
                        ?>"/>
                    
                    <span style="color: red;">
                            <?php
                              if(isset($phone_error)){
                                echo $phone_error;
                              }
                            ?>
                            </span>
                  </div>
  
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example97">Email ID</label>
                    <input type="text" id="form3Example97" placeholder="Email" name="email" class="form-control form-control-lg" value="<?php
                          if(isset($email)){
                            echo $email;
                          }
                        ?>"/>
                    
                    <span style="color: red;">
                            <?php
                              if(isset($email_error)){
                                echo $email_error;
                              }
                            ?>
                            </span>
                  </div>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example97">Username</label>
                    <input type="text" id="form3Example97" placeholder="Username" name="username" class="form-control form-control-lg" value="<?php
                          if(isset($username)){
                            echo $username;
                          }
                        ?>"/>
                    
                    <span style="color: red;">
                            <?php
                              if(isset($username_error)){
                                echo $username_error;
                              }
                            ?>
                            </span>
                  </div>
                  <div class="row">
                  
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="firstname">Password</label>
                        <input type="password" id="firstname" name="password" class="form-control form-control-lg"/>               
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <label class="form-label" for="lastname">Confirm Password</label>
                        <input type="password" id="lastname" name="confirmpassword" class="form-control form-control-lg"/>
                      </div>
                    </div>
                    <span style="color: red;">
                          <?php
                            if(isset($password_error)){
                              echo $password_error;
                            }
                          ?>
                          </span>
                  </div>
  
                  <div class="d-flex justify-content-end pt-3">
                    <button type="button" class="btn btn-light btn-lg"><a href="register.php">Reset all</a></button>
                    <button type="submit" class="btn btn-dark btn-lg ms-2">Register</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>
  </section>
</body>
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
</html>