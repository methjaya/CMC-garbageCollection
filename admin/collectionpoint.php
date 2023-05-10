<?php
require_once '../controllerUserData2.php';

if (!isset($_SESSION['role'])) {
    header('Location: ./login.php');
}
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$userrole = $_SESSION['role'];
if ($email == false && $password == false) {
    header('Location: ../login-user.php');
}
if ($userrole != "admin") {
    header('Location: ../login-user.php');
}

?>
<?php

require_once "../controllerUserData2.php";

// error_reporting(0);
// include('database.inc');
$query_status = "";

if (isset($_POST['submit'])) {

    $description = mysqli_real_escape_string($con, $_POST['description']);
    $title = mysqli_real_escape_string($con, $_POST['title']);

    $user_email = $_SESSION['email'];

    if ($user_email != null) {

        $sql = "INSERT INTO article(title,description)values('$title','$description')";


        if (mysqli_query($con, $sql)) {
            // echo "<script>console.log('Succuss');</script>";
            $query_status = '<div class = "alert alert-success"><span class="fa fa-check"> "Article Added Successfully!"</span></div>';
        } else {
            // echo "<h2>Failed!</h2>";
            $query_status = '<div class = "alert alert-warning"><span class="fa fa-times"> Failed to Add Article !"</span></div>';
        }
    } else {
        $query_status = '<div class = "alert alert-warning"><span class="fa fa-times"> Failed to Add Article - Authentication Error!"</span></div>';
    }
} else {
    $query_status = "";
}
?>

<!DOCTYPE html>
<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Users/style.css">
    <title>Collection Points</title>
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
  <a href="adminindex.php"  style="font-size:large;"><strong> <i class="fa fa-home" ></i> Home
 </strong></a>
</div><br>
    <?php
    //    $error ='test';   
    ?>

        <div class="container">
            <div class="row">
                <div class="col-md-3" style="background-color:#58D68D;">
                    <div class="contact-info">
                        <img src="0f61ba72e0e12ba59d30a50295964871.png" alt="image" />
                        <h2>Collection Points</h2>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="contact-form">
                        <h3>As the webmaster user you get the opportunity to Mark the garbage collection sports on the map.</h3><br>
                        <h4>Follow these steps.</h4>
                        <p>-Visit the project on Google maps : https://www.google.com/maps/d/u/0/_ _ _ _ _ _</p>
                        <p>-select the necessary project</p>
                        <p>-click on the 'Add marker' icon and tap the required position on the map.</p>
                        <p>That's it.</p>
                        <p>Now the newly market spot will appear on the map embedded in the Website</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="formValidation.js"></script>
</body>

</html>