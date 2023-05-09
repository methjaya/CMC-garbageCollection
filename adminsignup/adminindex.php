<?php
require_once './userInteractions.php';
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($email != false && $password != false) {
} else {
    header('Location: adminlogin.php');
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

        @media(min-width:768px) {
            body {
                margin-top: 50px;
            }

            /*html, body, #wrapper, #page-wrapper {height: 100%; overflow: hidden;}*/
        }

        #wrapper {
            padding-left: 0;
        }

        #page-wrapper {
            width: 100%;
            padding: 0;
            background-color: #fff;
        }

        @media(min-width:768px) {
            #wrapper {
                padding-left: 225px;
            }

            #page-wrapper {
                padding: 22px 10px;
            }
        }

        /* Top Navigation */

        .top-nav {
            padding: 0 15px;
        }

        .top-nav>li {
            display: inline-block;
            float: left;
        }

        .top-nav>li>a {
            padding-top: 20px;
            padding-bottom: 20px;
            line-height: 20px;
            color: #fff;
        }

        .top-nav>li>a:hover,
        .top-nav>li>a:focus,
        .top-nav>.open>a,
        .top-nav>.open>a:hover,
        .top-nav>.open>a:focus {
            color: #fff;
            background-color: #1a242f;
        }

        .top-nav>.open>.dropdown-menu {
            float: left;
            position: absolute;
            margin-top: 0;
            /*border: 1px solid rgba(0,0,0,.15);*/
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            background-color: #fff;
            -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
            box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        }

        .top-nav>.open>.dropdown-menu>li>a {
            white-space: normal;
        }

        /* Side Navigation */

        @media(min-width:768px) {
            .side-nav {
                position: fixed;
                top: 60px;
                left: 225px;
                width: 225px;
                margin-left: -225px;
                border: none;
                border-radius: 0;
                border-top: 1px rgba(0, 0, 0, .5) solid;
                overflow-y: auto;
                background-color: #37517e;
                /*background-color: #5A6B7D;*/
                bottom: 0;
                overflow-x: hidden;
                padding-bottom: 40px;
            }

            .side-nav>li>a {
                width: 225px;
                border-bottom: 1px rgba(0, 0, 0, .3) solid;
            }

            .side-nav li a:hover,
            .side-nav li a:focus {
                outline: none;
                background-color: #1a242f !important;
            }
        }

        .side-nav>li>ul {
            padding: 0;
            border-bottom: 1px rgba(0, 0, 0, .3) solid;
        }

        .side-nav>li>ul>li>a {
            display: block;
            padding: 10px 15px 10px 38px;
            text-decoration: none;
            /*color: #999;*/
            color: #fff;
        }

        .side-nav>li>ul>li>a:hover {
            color: #fff;
        }

        .navbar .nav>li>a>.label {
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            position: absolute;
            top: 14px;
            right: 6px;
            font-size: 10px;
            font-weight: normal;
            min-width: 15px;
            min-height: 15px;
            line-height: 1.0em;
            text-align: center;
            padding: 2px;
        }

        .navbar .nav>li>a:hover>.label {
            top: 10px;
        }

        .navbar-brand {
            padding: 5px 15px;
        }

        .logo1 {
            border-radius: 50%;
        }

        .panel.panel-blue {
            border-radius: 0px;
            box-shadow: 0px 0px 10px #888;
            border-color: #266590;
        }

        .panel.panel-blue .panel-heading {
            border-radius: 0px;
            color: #FFF;
            background-color: #266590;
        }

        .panel.panel-blue .panel-body {
            background-color: #F2F2F2;
            color: #4D4D4D;
        }
    </style>
</head>

<body>
    <!-- Favicons -->
    <link href="adminsignup/Capture.PNG" rel="icon">

    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style='background-color:#37517e'>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://localhost/EmailVerification/index.html">
                    <img src="Capture.PNG" alt="LOGO" heigth='50' width='50' class='logo1'>
                </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li>
                    <a href="#" data-placement="bottom" data-toggle="tooltip">
                        <h5><?php echo 'Admin:' . $email; ?></h5>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="#Dashboard" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-search"></i><mark> Dashboard</mark> <i class="fa fa-fw fa-angle-down pull-right"></i></a>

                    </li>
                    <li>
                        <a href="./addarticle.php"><i class="fa fa-fw fa-paper-plane-o"></i>Add Article</a>
                    </li>
                    <li>
                        <a href="logout-user.php"><i class="fa fa-fw fa fa-question-circle"></i> Logout</a>
                    </li>
                    <li>
                        <a href="./collectionpoint.php"><i class="fa fa-map-marker" aria-hidden="true"></i>  Collection Points</a>
                        
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                    <div class="col-sm-12 col-md-12 well" id="content">
                        <h1>Welcome Admin!</h1>
                        <!--table start  -->


                    </div>
                    <form action="adminindex.php" method="POST" autocomplete="">
                        <h2 class="text-center">Register Users</h2>
                        <?php
                        if (count($errors) == 1) {
                        ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                foreach ($errors as $showerror) {
                                    echo $showerror;
                                }
                                ?>
                            </div>
                        <?php
                        } elseif (count($errors) > 1) {
                        ?>
                            <div class="alert alert-danger">
                                <?php
                                foreach ($errors as $showerror) {
                                ?>
                                    <li><?php echo $showerror; ?></li>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        }

                        ?>
                        <?php

                        if (isset($_POST['signup'])) {
                            $name = mysqli_real_escape_string($con, $_POST['name']);
                            $email = mysqli_real_escape_string($con, $_POST['email']);
                            $password = mysqli_real_escape_string($con, $_POST['password']);
                            $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
                            $role = mysqli_real_escape_string($con, $_POST['role']);
                            if ($password !== $cpassword) {
                                $errors['password'] = "Confirm password do not match with password";
                            }
                            $email_check = "SELECT *
                            FROM user
                            INNER JOIN admin
                            WHERE user.email='$email' OR admin.email='$email';";

                            $res = mysqli_query($con, $email_check);
                            if (mysqli_num_rows($res) > 0) {
                                $errors['email'] = "User already exists with that email";
                            }
                            if (count($errors) === 0) {
                                $encedpass = password_hash($password, PASSWORD_BCRYPT);
                                if ($role == "cpt") {
                                    $sql_ins = "INSERT INTO admin (name, email, pass,role)
                                    values('$name', '$email', '$encedpass','$role')";
                                    $data_check = mysqli_query($con, $sql_ins);
                                    if ($data_check) {
                                        echo "<h2 style='color:green;'>User Registered Succussfully!<h2>";
                                    } else {
                                        $errors['db-error'] = "Failed to register";
                                    }
                                } elseif ($role == "userc") {
                                    $sql_ins = "INSERT INTO user (name, email, pass,role)
                                     values('$name', '$email', '$encedpass','$role')";
                                    $data_check = mysqli_query($con, $sql_ins);
                                    if ($data_check) {
                                        echo "<h2 style='color:green;'>User Registered Succussfully!<h2>";
                                    } else {
                                        $errors['db-error'] = "Failed to register";
                                    }
                                }
                            }
                        }

                        ?>
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="Full Name" required value="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="Email Address" required value="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                        </div>
                        <select class="form-control" id="role" name="role" value="userc" required>
                            <option class="form-control" value="cpt">Green Captain</option>
                            <option class="form-control" value="userc">Collector</option>
                        </select><br>
                        <div class="form-group">
                            <input class="form-control button" type="submit" name="signup" value="Signup">
                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div><!-- /#wrapper -->

</body>

</html>