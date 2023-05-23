<?php
    include 'database.php';
    $id = $_GET['id'];
    if($id>0){
        $sql = "delete from signup where id = $id ";
        $result = mysqli_query($conn, $sql);
        if($result){
            header('location:retrieve.php');
        }
        else{
            die(mysqli_error($conn));
        }
    }
?>
    