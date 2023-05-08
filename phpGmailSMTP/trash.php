<?php 
require_once '../controllerUserData2.php';
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email == false && $password == false){
	header('Location: ../login-user.php');
}
?>
<?php

 require_once "../controllerUserData2.php";
 
// error_reporting(0);
// include('database.inc');
$msg ="";


if(isset($_POST['submit'])){
	
	date_default_timezone_set("Asia/Colombo");               
    $location = mysqli_real_escape_string($con,$_POST['location']);
    $wastetypes=$_POST['wastetype'];  
    $wastetype="";  
      foreach($wastetypes as $waste)  
             {  
                 $wastetype .= $waste.",";  
             }  
    $impactdescription = mysqli_real_escape_string($con,$_POST['impactdescription']);
	$date = date("g:ia ,\n l jS F Y");
	
	$file = $_FILES['file']['name'];
	$upload_dir = "../images";
	$upload_file = $upload_dir . basename($_FILES["file"]["name"]);
  
	// Select file type
	$imageFileType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));
  
	// Valid file extensions
	$img_extensions = array("jpg","jpeg","png","gif");
  
	// Check extension
	if( in_array($imageFileType,$img_extensions) ){
   
	
	   // Upload file
	   move_uploaded_file($image = $_FILES['file']['tmp_name'],$upload_dir.$file);
	   echo $image;
  
	}

	    $sql = "insert into waste_detection(user_id,waste_type,location,description,image,date_time,status)values(1,'$wastetype','$location','$impactdescription','$file','$date','Pending')";
		
		
    	if(mysqli_query($con,$sql)){
			echo "<h2>Succuss!</h2>";
			echo "<script>console.log('Succuss');</script>";
			$msg = '<div class = "alert alert-success"><span class="fa fa-check"> "Compain Registered Successfully!"</span><a href="http://localhost/EmailVerification/adminlogin/welcome.php"> view Complain </a></div>';		
		}else {
			echo "<script>console.log('Failed');</script>";
			echo "<h2>Failed!</h2>";
			$msg= '<div class = "alert alert-warning"><span class="fa fa-times"> Failed to Registered !"</span></div>';
		}
	


    //  $html = "<table><tr><td>FirstName: $name</td></tr><tr><td>Mobile: $mobile</td></tr><tr><td>Email: $email</td></tr><tr><td>Type Of Waste: $chk</td></tr><tr><td>Area: $location</td></tr><tr><td>Area description: $locationdescription</td></tr><tr><td>Images: $file  </td></tr><tr><td>Date: $date</td></tr></table>";
    //  include('PHPMailerAutoload.php');
    //  require_once('PHPMailerAutoload.php');
    //  $mail = new PHPMailer(true);
    //  $mail->isSMTP();
    //  $mail->SMTPAuth = true;
    //  $mail->SMTPSecure='tls';
    //  $mail->Host='smtp.gmail.com';
    //  $mail->Port= '587';
    //  $mail->isHTML(true);
    //  $mail->Username='janak.bista@sagarmatha.edu.np';
    //  $mail->Password='your email passsword';
    //  $mail->SetFrom('no-reply@howcode.org');     
    //  $mail->Subject='Hello sir!';
    //  $mail->Body=$html;     
    //  $mail->AddAddress('francis@howcode.org');
    //  $mail->SMTPOptions=array('ssl'=>array(
    //      'verify_peer'=>false,
    //      'verify_peer_name'=>false,
    //      'allow_self_signed'=>false
    //  ));
    //  $mail->send();

 }
?>

<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet"type="text/css"href="style.css">
    <title>Complain</title>
  
</head>
<body>
	<div>
        <a href="http://localhost/EmailVerification/index.html"  class="fa fa-home"> Home </a>
    </div>
   <?php 
   $error ='test';   
   ?>
   <form method="post" action="trash.php" enctype="multipart/form-data">
   <div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<img src="images.jfif" alt="image"/>
				<h2>Register Your Complain</h2>
				<h4>We would love to hear from you !</h4>
			</div>
		</div>
		<div class="col-md-9">
			<div class="contact-form">
				<div class="form-group">
				<div id="error"></div>
              <span style="color:red"><?php echo "<b>$error</b>"?></span>
				</div>

				<div class="form-group">
				  <!-- <label class="control-label col-sm-2" for="email">Email:</label>
				  <div class="col-sm-10"> -->

				  <!-- </div> -->
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="option">Waste Type:</label>
					<div class="col-sm-10">          
					    <input type="checkbox" name="wastetype[]" value="organic"> Organic
                        <input type="checkbox" name="wastetype[]" value="inorganic"> Inorganic
                        <input type="checkbox" name="wastetype[]" value="Household"> Household
                        <input type="checkbox" name="wastetype[]" value="mixed"id="mycheck" checked> All
					</div>
				  </div>
				  <div class="form-group">
				  <label class="control-label col-sm-2" for="location">Location:</label>
				  
				  <div class="col-sm-10">  	
				  <a href="https://www.google.com/maps" target="_blank"><p style="color:green;">Open Google Maps from here.</p></a>
					<input type="text" class="form-control" id="location" placeholder="Enter waste location from google maps" name="location" required>					
				  </div>
				  </div>
				<div class="form-group">
				<label class="control-label col-sm-10" for="option">Details :</label>
				  <div class="col-sm-10">
				  
					<textarea class="form-control" rows="5" id="impactdescription" placeholder="Explain the impact" name="impactdescription" required></textarea>
				  </div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="file">Pictures:</label>
					<div class="col-sm-10">          
					  <input type="file" class="form-control" id="file" name="file" required accept="image/*" capture="camera">
					</div>
				  </div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default" name="submit" >Register</button>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>
   </form>
</div>
<script type="text/javascript"  src="formValidation.js"></script>
</body>

</html>
