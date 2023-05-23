<?php

    $database= new mysqli("localhost","root","","clinic");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>