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
    <link rel="stylesheet" type="text/css" href="../phpGmailSMTP/style.css">
    <title>Request</title>

</head>

<body>
    <div>
        <a href="http://localhost/EmailVerification/index.html" class="fa fa-home"> Home </a>
    </div>
    <?php
    //    $error ='test';   
    ?>
    <form method="post" action="addarticle.php" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="contact-info">
                        <img src="0f61ba72e0e12ba59d30a50295964871.png" alt="image" />
                        <h2>Collection Points</h2>
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
                            <label class="control-label col-sm-10" for="cpoint">Collection Point iframe :</label>
                            <div class="col-sm-10">

                                <textarea class="form-control" rows="5" id="cpoint" placeholder="iframe of updated map" name="cpoint" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default" name="submit">Submit</button>
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