<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = $_GET['id'];
    if($id = "documents"){
        $message = "Your Documents have been Submitted Successfully. We will verify it and get back to you in 3 Business Days.";
    }else{
        $message = "We have got your inquiry. A response will be sent to you within 3 Business Days.";
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
  

<main>
    <div class="indexpara" >
        
        <h1><?php echo $message; ?></h1>
    </div>

</main>
<header>
    <img src="image/baner.jpg" alt="banner image" style="width: 100%; height: 30%;">
  </header>

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