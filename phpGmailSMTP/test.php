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
 
error_reporting(0);
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
	$upload_dir = "..images/";
	$upload_file = $upload_dir . basename($_FILES["file"]["name"]);
  
	// Select file type
	$imageFileType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));
  
	// Valid file extensions
	$img_extensions = array("jpg","jpeg","png","gif");
  
	// Check extension
	if( in_array($imageFileType,$img_extensions) ){
   
	
	   // Upload file
	   move_uploaded_file($image = $_FILES['file']['tmp_name'],$upload_dir.$file);
  
	}

		$sql = "insert into waste_detection(user_id,waste_type,location,description,image,date_time,status)values(1,'$wastetype','$location','$impactdescription','$wastetype','$location','$locationdescription','$file','$date','Pending')";
		
    	if(mysqli_query($con,$sql)){
			echo "<h2>Succuss!</h2>";
			echo "<script>console.log('Succuss');</script>";
			$msg = '<div class = "alert alert-success"><span class="fa fa-check"> "Compain Registered Successfully!"</span><a href="http://localhost/EmailVerification/adminlogin/welcome.php"> view Complain </a></div>';		
		}else {
			echo "<script>console.log('Failed');</script>";
			echo "<h2>Failed!</h2>";
			$msg= '<div class = "alert alert-warning"><span class="fa fa-times"> Failed to Registered !"</span></div>';
		}
	



 }
?>