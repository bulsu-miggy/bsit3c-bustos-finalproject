<?php 

$conn = new mysqli('localhost:3306','root','','crud');
$conn2 = new mysqli('localhost:3306','root','','loginsystem');
$conn3 = new mysqli('localhost:3306','root','','offersandservices');

if (!$conn){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (!$conn2){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>