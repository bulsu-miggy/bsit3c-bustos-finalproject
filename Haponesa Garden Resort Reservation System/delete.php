<?php
    include 'dbconnection.php';
    $id = $_GET['id'];
    if($id>0){
        $sql = "delete from crud where id = $id ";
     
        $result = mysqli_query($conn, $sql);
        if($result){
        
            header('location:admin.php');
        }
        else{
            die(mysqli_error($conn));
        }
    }
?>