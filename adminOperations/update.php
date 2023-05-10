<?php
include('../connection2.php');

if(isset($_POST['update'])){ 
	$id = $_POST['id'];
    $location = mysqli_real_escape_string($con,$_POST['location']);
    $wastetypes=$_POST['wastetype'];  
    $wastetype="";  
      foreach($wastetypes as $waste)  
             {  
                 $wastetype .= $waste.",";  
             }  
    $impactdescription = mysqli_real_escape_string($con,$_POST['impactdescription']);
	
	$file = $_FILES['file']['name'];
	$upload_dir = "../images/";
	$upload_file = $upload_dir . basename($_FILES["file"]["name"]);
  
	// Select file type
	$imageFileType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));
  
	// Valid file extensions
	$img_extensions = array("jpg","jpeg","png","gif");

	// Check extension
	if( in_array($imageFileType,$img_extensions) ){
   
	
	   // Upload file
	   move_uploaded_file($_FILES['file']['tmp_name'],$upload_dir.$file);
  
	}
	$user_email = $_SESSION['email'];

    $query = "UPDATE waste_detection SET waste_type='$wastetype',location='$location',description='$impactdescription',image='$file' WHERE id='$id'" ;
   
    $result = mysqli_query($con,$query);
    
    
    if($result) {
     
       header("Location: ./welcome.php");
  
    }
    else {
        echo "<center><h2>Failed to Update!</h2></center>";
    }



}
?>
<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet"type="text/css"href="styleupdate.css">
    <title>Update</title>
	<style>
	.sidebar {
  margin: 0;
  padding: 0;
  width: 150px;
  background-color: #0E6655;
  position: fixed;
  height: 100%;
  overflow: auto;
 
}

.sidebar a {
  display: block;
  color: white;
  padding: 16px;
  text-decoration: none;
}
.sidebar a:hover {
  color:whitesmoke;
  text-decoration: none;
  

}
</style>
  
</head>
<body style="background-color:#EAFAF1;">
<div class="sidebar">
  <a href="../index.html"  style="font-size:large;"><strong> <i class="fa fa-home" ></i> Home
 </strong></a>
</div><br>
  
   <?php 
   ?>
   <form method="post" action="update.php"enctype="multipart/form-data">
   <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
   <div class="container contact">
	<div class="row">
		<div class="col-md-3" style="background-color:#58D68D;">
			<div class="contact-info">
				<img src="../images/recycling.png" alt="image"/>
				<h2>Edit Request</h2>
			</div>
		</div>
		<div class="col-md-9">
			<div class="contact-form">
				<div class="form-group">
				<div id="error"></div>
				</div>
			
				<div class="form-group">
				  <!-- <label class="control-label col-sm-2" for="email">Email:</label>
				  <div class="col-sm-10"> -->

				  <!-- </div> -->
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="option">Waste Type:</label>
					<div class="col-sm-10">          
					    <input type="checkbox" name="wastetype[]" value="Organic"> Organic
                        <input type="checkbox" name="wastetype[]" value="Inorganic"> Inorganic
                        <input type="checkbox" name="wastetype[]" value="Toxic/Hazardous"> Toxic/Hazardous
                        <input type="checkbox" name="wastetype[]" value="mixed" checked> Mixed
					</div>
				  </div>
				  <div class="form-group">
				  <label class="control-label col-sm-2" for="location">Location:</label>
				  
				  <div class="col-sm-10">  	
				  <a href="https://www.google.com/maps" target="_blank"><p style="color:green;">Open Google Maps from here.</p></a>
					<input type="text" class="form-control" id="location" placeholder="Enter waste location from google maps"  name="location" required>					
				  </div>
				  </div>
				<div class="form-group">
				<label class="control-label col-sm-10" for="option">Details :</label>
				  <div class="col-sm-10">
				  
					<textarea class="form-control" rows="5" id="impactdescription" placeholder="Explain the impact"  name="impactdescription" required></textarea>
				  </div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="file">Image:</label>
					<div class="col-sm-10">          
					  <input type="file" class="form-control" id="file" name="file" required accept="image/*" capture="camera">
					</div>
				  </div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default" name="update" id="update" style="background-color: #0B5345;">Update</button>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>
   </form>
</div>
</body>
</html>