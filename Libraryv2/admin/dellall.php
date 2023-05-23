<?php
include_once("connection.php");
$con = connection();



 if (isset($_POST['delete'])) {
       $dela = $_POST['dela'];
       $delb = $_POST['delb'];
 $BookId = $_POST['BookId'];
$sql2 = "DELETE FROM `record`";
$con->query($sql2) or die($con->error);


                        
  	  echo header("Location: ../admin/current.php")  ;
 }
?>