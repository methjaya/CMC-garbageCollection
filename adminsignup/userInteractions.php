<?php 
session_start();
require "../connection2.php";
$email = "";
$name = "";
$errors = array();

    //if user click login button
    if(isset($_POST['login'])){      
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM admin WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['pass'];
            $fetch_role = $fetch['role'];
            if(password_verify($password, $fetch_pass)){
               
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['role'] = $fetch_role;

                header('location: ./index.php');
            
                   
            }else{
                
                $errors['email'] = "Incorrect Credentials!";
            }
        }else{
            $errors['email'] = "You're not an Admin!";
        }
    }

  
    
   //if login now button click
    // if(isset($_POST['login-now'])){
    //     header('Location: adminlogin.php');  
    // }
?>