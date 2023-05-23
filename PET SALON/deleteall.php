<?php
    include 'database.php';

    $id = $_POST['ids'];

    foreach($id as $key => $value){
        $sql = "delete from signup where id = {$value}";
        $result = $conn->query($sql);
        if($result){
            header("Location: retrieve.php");
        }
        else{
            die(mysqli_error($conn));
        }
    }
?>