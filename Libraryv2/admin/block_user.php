<?php
include_once("connection.php");
$con = connection();

  // Check if the form was submitted
  if (isset($_POST['block']) || isset($_POST['unblock'])) {
    // Get the roll number and action (block or unblock) from the form submission
    $rollno = $_POST['RollNo'];
    $action = isset($_POST['block']) ? 1 : 0;

    // Set the blocked column to the specified value for the user with the specified roll number
    $sql = "UPDATE Libraryv2.user SET blocked = $action WHERE RollNo = '$rollno'";
    $result = $con->query($sql);

    // Check if the query was successful
    if ($result) {
      echo "Success.";
      echo header("Location: student.php")  ;
    } else {
      echo "Error blocking/unblocking user: " . $con->error;
    }
  }
?>