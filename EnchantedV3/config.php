<?php

$conn = mysqli_connect("localhost", "root", "", "hotel");

if (!$conn) {
    echo "Connection Failed";
}