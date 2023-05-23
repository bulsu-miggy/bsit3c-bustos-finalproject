<?php
include_once("connection.php");
$con = connection();

// Add the foreign key constraint to the message table
$sql = "ALTER TABLE message ADD FOREIGN KEY (RollNo) REFERENCES user (RollNo) ON DELETE CASCADE";
$con->query($sql);

 if (isset($_POST['delete'])) {
 $RollNo = $_POST['RollNo'];
$sql2 = "DELETE FROM `user` WHERE RollNo = '$RollNo'";
$con->query($sql2) or die($con->error);
                                
  	  echo header("Location: student.php")  ;
 }
?>