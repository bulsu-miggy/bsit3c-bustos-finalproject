<?php
    include 'db_con.php';
    $id = $_GET['id'];
    if($id>0){
        $sql = "delete from users where id = $id ";
        //delete from tablename where id = $id
        $result = mysqli_query($conn, $sql);
        if($result){
            //echo '<script>alert("Deleted Successfully")</script>';
            header('location: user.php');
        }
        else{
            die(mysqli_error($conn));
        }
    }
?>
