<?php
$rollno = $_SESSION['RollNo'];
$sql="select * from Libraryv2.user where RollNo='$rollno'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$type = $row['Type'];

if ($type == NULL){
    echo "<script type='text/javascript'>alert('Invalid Access!')</script>";
    echo "<script>window.location.href='../index.php';</script>";
    mysqli_close();
}

else if ($type == 'Student'){
    echo "<script type='text/javascript'>alert('Access Denied!')</script>";
    echo "<script>window.location.href='../student/index.php';</script>";
}
?>