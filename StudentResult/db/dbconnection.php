<?php 

$conn = new mysqli('localhost:3306','root','','strand_db');

if (!$conn){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();

}

?>