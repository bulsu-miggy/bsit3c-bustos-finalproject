<?php
    include 'dbconnection.php';
    $id = $_GET['id'];
    if($id>0){
        $sql = "delete from user where id = $id ";
     
        $result = mysqli_query($conn2, $sql);
        if($result){
        
            header('location:adminusers.php');
        }
        else{
            die(mysqli_error($conn));
        }
    }
?>