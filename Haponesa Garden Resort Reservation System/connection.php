<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "offersandservices";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    try {
        $conn->exec($sql);
    } catch (PDOException $th) {
        // Database already exists, do nothing
    }

    $sql = "USE $dbname";
    $conn->exec($sql);

    $query = "CREATE TABLE IF NOT EXISTS haponesaoffer (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        offers VARCHAR(100),
        prc VARCHAR(50)
        
    )";

    try {
        $conn->exec($query);
        echo "DB Created Successfully.";

        $data = [
            ['Private Pool', 'P 6,000 per day'],
            ['Event Hall & Private Pool', 'P 11,000'],
            ['Rooms', 'P 1,800 per night'],
            ['Cottages', 'P 500 per Cottage']
        ];

        $query_i = $conn->prepare("INSERT INTO haponesaoffer (offers, prc) VALUES (?, ?)");

        try {
            $conn->beginTransaction();
            foreach ($data as $row) {
                $query_i->execute($row);
            }
            $conn->commit();
            echo "New record created successfully";
        } catch (Exception $e) {
            $conn->rollback();
            throw $e;
        }

        $conn = null;
        exit();
    } catch (PDOException $th) {
        echo "Error in creating Table: " . $th->getMessage();
        $conn = null;
        exit();
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}