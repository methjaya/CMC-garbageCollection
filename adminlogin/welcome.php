<?php 
require_once '../controllerUserData2.php';
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$userrole = $_SESSION['role'];
if($email != false && $password != false){

  if($userrole=="userc"){
    header('Location: ../phpGmailSMTP/userc.php');
  }

}else{
    header('Location: ../login-user.php');
}?>

<!DOCTYPE html>
<html>

   <head>
      <title>Welcome </title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

body {
  background-color: #D5F5E3;
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 150px;
  background-color: #239B56;
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
.logo1{
    border-radius :50%;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
#ch {
  background-color: #66CC66;
  height: 50px;
  margin-left: auto;
  margin-right: auto;
 text-align: center;
 overflow: hidden;
 font-size: x-large;

}
    </style>
      <!-- cdn for awesome fonts icons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   </head>
   
   <body style="background-color:#EAFAF1;"> 
   <div class="sidebar">
   <a href="../index.html"  style="font-size:large;"><strong> <i class="fa fa-home" ></i> Home
 </strong></a>

</div><br>
      
    <div class="container" id="ch" > <center><b> Your Requests</b></center></div>
      <div class="container">     
      <table  cellspacing:="10" class='table' style="background-color: #73C6B6;">
             <br><br>
             <tr>
                 <th>Date</th>
                 <th>Waste Type</th>
                 <th>Location</th>
                 <th>Description</th>
                 <th>Image</th>
                 <th>Status</th>
                 <th>Priority</th>
                 <th colspan="2" align="center">Operations</th>
                 <tr><br>

   <?php
  
   include("../connection2.php");
   require_once "../controllerUserData2.php";

   $user_email = $_SESSION['email']; 
   $hostForImage ="../images/";
   $query = "SELECT * FROM waste_detection WHERE user_email = '$user_email' ";
   $data = mysqli_query($con,$query);
   $total = mysqli_num_rows($data);
     
   if($total!=0) {

     
      while($result=mysqli_fetch_assoc($data)){

     echo "
           <tr class='shadow p-3 mb-5 bg-white rounded'>
               <td>   ".$result['date_time']." </td>
               <td>   ".$result['waste_type']." </td>
               <td>   <a href='".$result['location']."' target='_blank'><p style='color:green;font-weight: bold;'>Open Location</p></a> </td>
               <td>   ".$result['description']."  </td>
               <td><a href = '".$hostForImage.$result['image']. "'><img src = '".$hostForImage.$result['image']. " 'height='200'width='200'/></a> </td>   
               <td>   ".$result['status']." </td>   
               <td>   ".$result['priority']." </td>           
               <td><a href = 'delete.php?i=$result[id] ' class='btn btn-danger'data-toggle='modal' data-target='#exampleModalCenter' onclick='modalLauch(".$result['id'].")'>Delete</a></td>
               <td> <a href = 'update.php?id=$result[id]&loc=$result[location]&des=$result[description]' class='btn btn-success'>Update</a></td>
               </tr> ";
      
      }
      

   }
?>

<div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
               <div class='modal-dialog modal-dialog-centered' role='document'>
               <div class='modal-content'>
               <div class='modal-header'>
               <h5 class='modal-title' id='exampleModalLongTitle'>Delete</h5>
               <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
               <span aria-hidden='true'>&times;</span>
               </button>
               </div>
               <div class='modal-body'>
               Are you sure you want to delete this Request?
               <input id="toDeleteId" type="hidden" value="">
               </div>
              <div class='modal-footer'>
              <button type='button' class='btn btn-light' data-dismiss='modal'>Close</button>
              <button type='button' class='btn btn-danger' onclick="confirmDelete()">Delete</button>
              </div>
              </div>
              </div>
             </div>
   
</table>
</div>
<script>
var delId;
function modalLauch(id){
    delId=id;
    $('#toDeleteId').val(id);
}
function confirmDelete(){
    window.location.replace("./delete.php?i="+delId);
}
</script>
</body>
</html>

