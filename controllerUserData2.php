<?php 
session_start();
// require "connection.php";
require "connection2.php";
$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password do not match with password";
    }
    $email_check = "SELECT * FROM user WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "User already exists with that email";
    }
    if(count($errors) === 0){
        $encedpass = password_hash($password, PASSWORD_BCRYPT);
        $sql_ins = "INSERT INTO user (name, email, pass)
                        values('$name', '$email', '$encedpass')";
        $data_check = mysqli_query($con, $sql_ins);
        if($data_check){
            header('location: index.html');
            // exit();
        }else{
            $errors['db-error'] = "Failed to register";
        }
    }

}
    

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM user WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){           
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['pass'];
            $fetch_role=$fetch['role'];
            if(password_verify($password, $fetch_pass)){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                  $_SESSION['role'] = $fetch_role;
                    header('location: index.html');
                    exit();
                }
            else{
                $errors['email'] = "Incorrect Credentials!";
            }
        }else{
            $errors['email'] = "You are not a member yet click in the below lin k to register";
        }
    }

    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
?>