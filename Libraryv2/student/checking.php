<?php
$rollno = $_SESSION['RollNo'];
$sql="select * from Libraryv2.user where RollNo='$rollno'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$type = $row['verified'];
$ver = $row['Type'];
$blocked = $row['blocked'];

if ($type == 0 && $ver == 'Student'){
    echo "<script type='text/javascript'>alert('Your account is not yet verified. Please check your email for verification link')</script>";
    echo "<script>window.location.href='../index.php';</script>";
    mysqli_close();
}
else if ($blocked == 1){
    echo "<script type='text/javascript'>alert('Your account is blocked. Please contact the administrator or go to the library.')</script>";
    echo "<script>window.location.href='../index.php';</script>";
    mysqli_close();
}
else if($ver == NULL)
{
    echo "<script type='text/javascript'>alert('Invalid Access')</script>";
    echo "<script>window.location.href='../index.php';</script>";
    mysqli_close();
}
?>