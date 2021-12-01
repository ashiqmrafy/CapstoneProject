<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Auto Matrix</title>
  <link rel = "icon" href = "image/Autologo.png" type = "image/x-icon">
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
  <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/d4bb01feb8.js" crossorigin="anonymous"></script>

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/allquotes.css">
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
			  <a class="nav-link active" href="getaquote.php">Get A Quote</a>
			</li>			
      <li class="nav-item">
			  <a class="nav-link"  href="documentsupload.php">Documents</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link " href="contact.php">Contact</a>
			</li>	
            <li class="nav-item">
			  <a class="nav-link" href="about.php">About Us</a>
			</li>
            <li class="nav-item">
			  <a class="nav-link" href="register.php">Register</a>
			</li>
		  </ul>		  
		</div>
	  </div>
	</nav>
  <header>
  </header>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sedan = $_POST['select_sedan'];
    $suv = $_POST['select_suv'];
    $convertible = $_POST['select_convertible'];
    $truck = $_POST['select_truck'];
    $insurance = $_POST['insurance_select'];

    require('controller/packages.php');
    $price = getPrice($insurance);
    

    require("controller/quotes.php");
    insertQuote($_SESSION['packageid'], $sedan, $suv, $convertible, $truck, $price, $insurance, $_SESSION['userid']);

    
?>

<div class="page-content container">
    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="mt-4">
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="d-none d-sm-block col-1">#</div>
                        <div class="col-9 col-sm-5">Vehicle Type</div>
                        <div class="d-none d-sm-block col-4 col-sm-2">Vehicle Model</div>
                        <div class="d-none d-sm-block col-sm-2">Package</div>
                        <div class="col-2">Amount</div>
                    </div>

                    <div class="text-95 text-secondary-d3">

                    <?php

                        $r = getLastQuotes();
                        $sum = 0.0;
                        while($row = $r->fetch_array()){
                            $sum += $row['price'];
                            echo '<div class="row mb-2 mb-sm-0 py-25">';
                                echo '<div class="d-none d-sm-block col-1">1</div>';
                                echo '<div class="col-9 col-sm-5">'.$row['type'].'</div>';
                                echo '<div class="d-none d-sm-block col-2">'.$row['vehicle_name'].'</div>';
                                echo '<div class="d-none d-sm-block col-2 text-95">'.$row['packagename'].'</div>';
                                echo '<div class="col-2 text-secondary-d2">$'.$row['price'].'</div>';
                            echo '</div>';

                        }
                    ?>
                    </div>

                    <div class="row border-b-2 brc-default-l2"></div>

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    SubTotal
                                </div>
                                <div class="col-5">
                                    <span class="text-120 text-secondary-d1">$<?php echo $sum; ?></span>
                                </div>
                            </div>

                            <?php
                                $r1 = getQuotePrice();
                                $row1 = $r1->fetch_assoc();
                            ?>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Insurance
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">$<?php
                                        if($row1['insurance'] == 'Y'){
                                            echo $row1['monthlyInsurance'];
                                        }else{
                                            echo 'Not Selected';
                                        }
                                    ?></span>
                                </div>
                            </div>

                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Total Monthly Payment(Tax Inc.)
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2">$<?php echo $row1['qoutePrice'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    
}

?>
 <div class="indexpara" >
  <h1>Want to proceed with your Quote? <a href='documentsupload.php'>Click here</a> to upload your documents. </h1>
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
  </html
  