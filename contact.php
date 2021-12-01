<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $name = $_POST['Name'];
  $email = $_POST['Email'];
  $phone = $_POST['Phone'];
  $location = $_POST['Location'];
  $message = $_POST['Message'];

  $flag = true;

  if(empty($name) || !preg_match("/^[\\w ]+$/", $name)){
    $name_error = "Please Enter a Valid Name. ";
    $flag = false;
  }
  if(empty($location) || !preg_match("/^[a-z0-9 .\-]+$/i", $location)){
    $location_error = "Please Enter a Valid Location. ";
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
  if(empty($message) || !preg_match("/^[\\w ]+$/", $message)){
    $message_error = "Please Enter a Valid Text. ";
    $flag = false;
  }

  if($flag){
  
    mail("ashiqmrafy@gmail.com", $name." | ".$phone." | ".$email ,$message);
    $post = 'contact';
    header("location: post.php?$post");
  
  }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Auto Matrix: Contact Us</title>
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
  <link rel="stylesheet" href="css/contact.css">
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
			  <a class="nav-link active" href="contact.php">Contact</a>
			</li>	
            <li class="nav-item">
			  <a class="nav-link" href="about.php">About Us</a>
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

<main>
    <div class="contact2" style="background-image:url(https://www.wrappixel.com/demos/ui-kit/wrapkit/assets/images/contact/map.jpg)" id="contact">
        <div class="container">
          <div class="row contact-container">
            <div class="col-lg-12">
              <div class="card card-shadow border-0 mb-4">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="contact-box p-4">
                      <h4 class="title">Contact Us</h4>
                      <form action="contact.php" method="POST">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group mt-3">
                              <input class="form-control" type="text" placeholder="Name" name="Name" value="<?php
                          if(isset($name)){
                            echo $name;
                          }
                        ?>">
                              <span style="color: red;">
                                <?php
                                  if(isset($name_error)){
                                    echo $name_error;
                                  }
                                ?>
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group mt-3">
                              <input class="form-control" type="text" placeholder="Email" name="Email" value="<?php
                          if(isset($email)){
                            echo $email;
                          }
                        ?>">
                              <span style="color: red;">
                                <?php
                                  if(isset($email_error)){
                                    echo $email_error;
                                  }
                                ?>
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group mt-3">
                              <input class="form-control" type="text" placeholder="Phone" name="Phone" value="<?php
                          if(isset($phone)){
                            echo $phone;
                          }
                        ?>">
                              <span style="color: red;">
                                <?php
                                  if(isset($phone_error)){
                                    echo $phone_error;
                                  }
                                ?>
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group mt-3">
                              <input class="form-control" type="text" placeholder="Location" name="Location" value="<?php
                          if(isset($location)){
                            echo $location;
                          }
                        ?>">
                              <span style="color: red;">
                                <?php
                                  if(isset($location_error)){
                                    echo $location_error;
                                  }
                                ?>
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group mt-3">
                              <input class="form-control" type="text" placeholder="Message" name="Message" value="<?php
                          if(isset($message)){
                            echo $message;
                          }
                        ?>">
                              <span style="color: red;">
                                <?php
                                  if(isset($message_error)){
                                    echo $message_error;
                                  }
                                ?>
                              </span>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <button type="submit" class="btn btn-danger-gradiant mt-3 mb-3 text-white border-0 py-2 px-3"><span> SUBMIT NOW <i class="ti-arrow-right"></i></span></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-4 bg-image" style="background-image:url(image/contact.jpg)">
                    
                  </div>
                </div>
              </div>
            </div>
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




