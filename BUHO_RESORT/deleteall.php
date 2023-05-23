<?php 
include 'db_con.php';
$alert = 'Check box!';
$id = $_POST['id'];
if($id == null){
    header('location: user.php');
}
foreach ($id as $key => $value){
    $sql ="delete from users where id =($value)";
    $result = $conn -> query($sql);
    if($result){
        header('location: user.php');
    }
    else{
        die(mysql_error($conn));
    }

}