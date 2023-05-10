<?php 
require_once './userInteractions.php';
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$user_role = $_SESSION['role'];
if($email != false && $password != false){
    if($user_role=="admin"){
        header('Location: adminindex.php');
    }
}else{
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
<!------ Include the above in your HEAD tag ---------->

<style>@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
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
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
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
        border-top: 1px rgba(0,0,0,.5) solid;
        overflow-y: auto;
        background-color: #1D8348;
        bottom: 0;
        overflow-x: hidden;
        padding-bottom: 40px;
    }

    .side-nav>li>a {
        width: 225px;
        border-bottom: 1px rgba(0,0,0,.3) solid;
    }

    .side-nav li a:hover,
    .side-nav li a:focus {
        outline: none;
        background-color: #1a242f !important;
    }
}

.side-nav>li>ul {
    padding: 0;
    border-bottom: 1px rgba(0,0,0,.3) solid;
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

.navbar .nav > li > a > .label {
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

.navbar .nav > li > a:hover > .label {
  top: 10px;
}

.navbar-brand {
    padding: 5px 15px;
}
.logo1{
    border-radius :50%;
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
<body style="background-color:#EAFAF1;">
      <!-- Favicons -->
  <link href="admin/Capture.PNG" rel="icon">

<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style='background-color:#1D8348'>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.html">
                <img src="../images/logo.png" alt="LOGO"heigth='50'width='50'class='logo1'>
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">           
            <li>
                <a href="#" data-placement="bottom"  data-toggle="tooltip"> <h5><?php echo 'Admin:'.$email ;?></h5> 
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="../index.html" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-search"></i>Home<i class="fa fa-fw fa-angle-down pull-right"></i></a>              
                </li>
                <li>
                    <a href="logout-user.php"><i class="fa fa-fw fa fa-question-circle"></i> Logout</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Welcome Admin!</h1>
                      <!--table start  -->
                      <table  cellspacing:="12" class='table' style="background-color:#82E0AA;">
             <tr class="panel-heading">
                 <th> Id </th>
                 <th> Submitted User Email</th>
                 <th> Image </th>
                 <th> Date </th>
                 <th> Waste Type </th>
                 <th> Location </th>
                 <th> Description </th>
                 <th> Status </th>
                 <th >Action</th>
                 <th>Update status</th>
             </tr>

   <?php
   // error_reporting(0);
  
   include("../connection2.php");
   $hostForImage ="../images/";
   $query = "SELECT * FROM waste_detection ORDER BY status DESC";
   $data = mysqli_query($con,$query);
   $total = mysqli_num_rows($data);

     
   if($total!=0) {

     
      while($result=mysqli_fetch_assoc($data)){

     echo "
           <tr class='panel panel'>

               <td>   ".$result['id']." </td>
               <td>   ".$result['user_email']." </td>
               <td><a href = '".$hostForImage.$result['image']."'><img src = '".$hostForImage.$result['image']."'height='200'width='200'/></a> </td>               
               <td>   ".$result['date_time']." </td>
               <td>   ".$result['waste_type']." </td>
               <td>   <a href='".$result['location']."' target='_blank'><p style='color:green;font-weight: bold;'>Open Location</p></a> </td>
               <td>   ".$result['description']."  </td>
               <td>   ".$result['status']."  </td>
               <td>   ".$result['priority']." </td>    
               <td><a href = 'delete.php?i=$result[id] 'class='btn btn-danger' data-target='#exampleModalCenter' >Delete</a></td>
              <td> <a href = 'status.php?i=$result[id]&s=$result[status] 'class='btn btn-success'>Status</a></td>
           </tr> ";
      
      }
      

   }
?>   

</table>
      
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<script> 

var delId;
function modalLauch(id){
    delId=id;
    $('#toDeleteId').val(id);
}
function confirmDelete(){
    window.location.replace("delete.php?i="+delId);
}
</script>
</body>
</html>