<?php
session_start();
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Auto Matrix: Get Your Lease Quotation</title>
  <link rel = "icon" href = "image/Autologo.png" type = "image/x-icon">
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
  <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/getaquote.css">
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
              echo "<a class='nav-link'  href='logout.php'>Logout</a>";
            }
          ?>

			  
			</li>
            
		  </ul>		  
		</div>
	  </div>
	</nav>
    <header>
        <br><br>
    </header>

    <main>
    <?php 
    
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if(empty($_SESSION['firstname'])){
                ?>
                <div class="indexpara" >
                 <h1 style="text-align:center;">Want to Get a Quote? <a href='' data-bs-toggle="modal" data-bs-target="#modalForm">Click Here</a> to Login.</h1>
            </div>
      <div class="section-container">
        <div class="columns image" style="background-image:url('image/doc.jpg'); height:45vh">
            &nbsp;
        </div>
        <div class="columns content">
            <div class="content-container">
              <h5>One Lease. Many Cars</h5>
              <p>
              Through AutoMatrix we offer all the advantages of leasing and in addition solve its shortcomings, meaning you get to choose 4 vehicles while signing up for the lease with an option to change your vehicle 3 times a year, i.e., you get an economical sedan during as your primary car, and All-Wheel-Drive vehicle for your winter hauling, a peppy convertible for your summer getaway and large comfy minivan for your family getaway All Under the Same Plan.
                  </p>
            </div>
        </div>
      </div>
      </div>
      <br><br>

               
                <?php
            }else{
            
            // $id = $_GET['id'];
            if(!isset($_GET['id']) || empty($_GET['id'])){
                    require('controller/packages.php');
                    $packages = getPackages();
                    echo '<div class="indexpara" >';
                    echo '<h1>Hi '.$_SESSION["firstname"].'. Select package that fit your budget!</h1><br><br>';
                    echo '</div>';
                    echo '<h2><span>Select a Package</span></h2><br><br>';
                    echo'<div class="container"><div class="row"><div class="col-sm"></div>';
                    echo '<div class="col-sm">';
                    echo '<div class="btn-toolbar" role="group">';
                    while($row = $packages->fetch_array()){
                        echo '<button type="button" style="margin-top: 10px" class="btn btn-outline-success btn-lg col-12"><a style="color:white;" href=getaquote.php?id='.$row['packageid'].'>'.$row['packagename'].'</a></button>';
                    }
                    echo '</div></div><div class="col-sm"></div>';
                ?>
                </div></div>

                <br><br>
        <?php
            }else{
                $id = $_GET['id'];
                $_SESSION['packageid'] = $id;
        ?>
      
    <form action="allquotes.php" method="POST" style="width: 100%;">
    <h2><span>Select A Sedan</span></h2>
    <div class="row">
    <?php     
        require('model/vehicles.php');
        $vehicles = getVehiclesSedan($id);
        while($row = $vehicles->fetch_array()){
    ?>
    
    <div class="col-sm-2"></div>
    <div class="col-sm-3">
        <div class="card">
        <?php echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $row['image1'] ).'" alt="Card image cap"/>'; ?> 
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['vehiclebrand'].' '.$row['vehiclemodel']; ?> <input type="radio" id="html" style="width: 17px;height: 17px;" name="select_sedan" value="<?php echo $row['vehicleid'] ?>" checked></h5>
                <p class="card-text"><?php echo "Transmission: ".$row['transmission'] ?></p>
                <p class="card-text"><?php echo "Specs: ".$row['specs'] ?> </p>
                
            </div>
        </div>
    </div>
    <?php
       }
       echo '</div><br><h2><span>Select A SUV</span></h2><div class="row">';
       $vehicles2 = getVehiclesSUV($id);
       while($row = $vehicles2->fetch_array()){
   ?>
   <div class="col-sm-2"></div>
    <div class="col-sm-3">
        <div class="card">
        <?php echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $row['image1'] ).'" alt="Card image cap"/>'; ?> 
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['vehiclebrand'].' '.$row['vehiclemodel']; ?> <input type="radio" id="html" style="width: 17px;height: 17px;" name="select_suv" value="<?php echo $row['vehicleid'] ?>" checked></h5>
                <p class="card-text"><?php echo "Transmission: ".$row['transmission'] ?></p>
                <p class="card-text"><?php echo "Specs: ".$row['specs'] ?> </p>
            </div>
        </div>
    </div>
    <?php
       }
       echo '</div><br><h2><span>Select A Convertible</span></h2><div class="row">';
       $vehicles2 = getVehiclesConvertible($id);
       while($row = $vehicles2->fetch_array()){
   ?>
   <div class="col-sm-2"></div>
    <div class="col-sm-3">
        <div class="card">
        <?php echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $row['image1'] ).'" alt="Card image cap"/>'; ?> 
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['vehiclebrand'].' '.$row['vehiclemodel']; ?> <input type="radio" id="html" style="width: 17px;height: 17px;" name="select_convertible" value="<?php echo $row['vehicleid'] ?>" checked></h5>
                <p class="card-text"><?php echo "Transmission: ".$row['transmission'] ?></p>
                <p class="card-text"><?php echo "Specs: ".$row['specs'] ?> </p>
            </div>
        </div>
    </div>
    <?php
       }
       echo '</div><br><h2><span>Select A Truck</span></h2><div class="row">';
       $vehicles2 = getVehiclesTruck($id);
       while($row = $vehicles2->fetch_array()){
   ?>
   <div class="col-sm-2"></div>
    <div class="col-sm-3">
        <div class="card">
        <?php echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $row['image1'] ).'" alt="Card image cap"/>'; ?> 
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['vehiclebrand'].' '.$row['vehiclemodel']; ?> <input type="radio" id="html" style="width: 17px;height: 17px;" name="select_truck" value="<?php echo $row['vehicleid'] ?>" checked></h5>
                <p class="card-text"><?php echo "Transmission: ".$row['transmission'] ?></p>
                <p class="card-text"><?php echo "Specs: ".$row['specs'] ?> </p>
            </div>
        </div>
    </div>
   <?php
      }
      echo '</div>';
   ?>
   <br>
   <h3 style="display: flex; align-items: center; justify-content: center;">Would you like to opt for In-House Insurance?</h3>
   
        <div style="display: flex; align-items: center; justify-content: center;">
            <label class="radio-inline">
                <input type="radio" style="width: 17px;height: 17px;" name="insurance_select" value = 'Y' checked> Yes
            </label>
            <label class="radio-inline">
                <input type="radio" style="width: 17px;height: 17px;" name="insurance_select" value = 'N'> No
            </label><br>
        </div>
        <div style="display: flex; align-items: center; justify-content: center;">
          <input type="submit" class="btn btn-success" style="background-color:#ff8d1e;" value="Get Your Quote">
        </div>
        <!-- <button type="submit" class="btn btn-success" style="width: 30%" >Get Your Quote!!!</button> -->
    </form><br><br>
    <?php
            }   
        }
    }
    ?>

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
</html>