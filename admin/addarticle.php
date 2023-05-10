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
    <title>Article</title>
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
    <form method="post" action="addarticle.php" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-md-3" style="background-color:#58D68D;">
                    <div class="contact-info">
                        <img src="1643231.png" alt="image" />
                        <h2>Add Article</h2>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="contact-form">
                        <div class="form-group">
                            <div id="error"></div>
                            <span style="color:red"><?php echo "<b>$query_status</b>" ?></span>
                        </div>

                        <div class="form-group">

                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">Article Title :</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" placeholder="Title of the article" name="title" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-10" for="option">Description :</label>
                            <div class="col-sm-10">

                                <textarea class="form-control" rows="10" id="description" placeholder="Article Description" name="description" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default" style="background-color: #0B5345;" name="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    <script type="text/javascript" src="formValidation.js"></script>
</body>

</html>