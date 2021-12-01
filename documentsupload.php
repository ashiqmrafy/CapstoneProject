<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Auto Matrix: Get Your Quote Approved</title>
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
			  <a class="nav-link" aria-current="page" href="index.php">Home</a>
			</li>
			<li class="nav-item">
			  <a class="nav-link" href="getaquote.php">Get A Quote</a>
			</li>			
      <li class="nav-item">
			  <a class="nav-link active"  href="documentsupload.php">Documents</a>
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
    
    <!-- <img src="image/doc.jpg" alt="banner image" style="width: 100%; height: 30%;"> -->
  </header>
  
    <main>

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if(isset($_FILES['license']) && isset($_FILES['insurance_history']) && isset($_FILES['credit_report'])){
                
                $firstname = $_SESSION['firstname'];
                $userid = $_SESSION["userid"];
                $license = $_FILES['license']['name'];
                $insurance_history = $_FILES['insurance_history']['name'];
                $credit_report = $_FILES['credit_report']['name'];

                // print_r ($license.$insurance_history.$credit_report);

                if(!file_exists("./uploads/".$firstname)){
                    mkdir("uploads/".$firstname, 0777, true);
                }

                if(checkFiletype($license) && checkFiletype($insurance_history) && checkFiletype($credit_report)){
                    if(move_uploaded_file($_FILES['license']['tmp_name'],"uploads/$firstname/{$_FILES['license']['name']}")
                    && move_uploaded_file($_FILES['insurance_history']['tmp_name'],"uploads/$firstname/{$_FILES['insurance_history']['name']}")
                    && move_uploaded_file($_FILES['credit_report']['tmp_name'],"uploads/$firstname/{$_FILES['credit_report']['name']}")){
                    require("controller/documents.php");
                    insertDocuments($license, $insurance_history, $credit_report, $_SESSION['userid']);

                    $post = 'documents';
                    
                    header("location: post.php?$post");
                    
                    }
                    else{
                        echo "error";
                    }
                }else{
                    echo "Please upload .pdf or .jpeg files!!!";
                }
            }
        }else{

            if(empty($_SESSION['firstname'])){
                ?>
              <div class="indexpara" >
                 <h1 style="text-align:center;">Want to Upload Documents to Verify your Eligibility? <br><a href='' data-bs-toggle="modal" data-bs-target="#modalForm">Click Here</a> to Login.</h1>
              </div>
              <div class="section-container">
                <div class="columns image" style="background-image:url('image/tyler-clemmensen-Zs_L-plsZzg-unsplash.jpg'); height:45vh">
                    &nbsp;
                </div>
                <div class="columns content">
                    <div class="content-container">
                      <h5>The following are the documents needed to check your eligibility:</h5>
                      <ul style="list-style-type:none;">
                        <li> <h3>License</h3></li>
                        <li>  <h3>Insurance History<h3></li>
                        <li>  <h3>Credit Report</h3></li>
                      </ul> 
                    </div>
                </div>
              </div>

              <br><br>

                <?php
            }else{
                

    ?>
<div class="indexpara" >
<h3>Hi <?php echo $_SESSION['firstname'] ?>. Upload your documents and Know your Eligibility in 3 Days.</h3>
            </div>
                <div id="formblock">
    
       
    <div class="container" id="formcont">
  <form enctype="multipart/form-data" action="documentsupload.php" method="POST"  >
  <div class="row">
    <div class="col-25">
      <label>Upload License:   </label>
    </div>
    <div class="col-75">
     <input type="file" name="license">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
    <label>Upload Insurance History:   </label> 
    </div>
    <div class="col-75">
    <input type="file" name="insurance_history">
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
    <label>Upload Credit Report:    </label>
    </div>
    <div class="col-75">
    <input type="file" name="credit_report">
     </div>
  </div>
  <br>
  <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
</div>



        <?php
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

<?php

function checkFiletype($filename){
    $fileextensions=["pdf", "jpg", "jpeg"];
    $arr = explode(".",$filename);
    $ext = strtolower(end($arr));

    if(in_array($ext,$fileextensions)){
        return true;
    }else{
        return false;
    }

    }

?>