<?php
include('../connection2.php');

   $id = $_GET['i'];
    $query = "DELETE  FROM waste_detection WHERE id = '$id'" ;

    $data = mysqli_query($con,$query);
    
    if($data) {

      header('Location: index.php');
      exit;
    }
    else {
        echo "<font color='red'>Failed to Delete the record";
    }

?>