<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "shop_db";

// // Create connection
// $conn = new mysqli($servername, $username, $password);

// // // Check connection
// // if ($conn->connect_error) {
// //   die("Connection failed: " . $conn->connect_error);
// // }

// // Check connection
// if (mysqli_connect_error()) {
//     die("Database connection failed: " . mysqli_connect_error());
//   }

// echo "Connected successfully";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    // use exec() because no results are returned
    try {
        $conn->exec($sql);
    } catch (PDOException $th) {
        //echo "<br> Database Already Exists";
    }

    $sql = "use $dbname";
    $conn->exec($sql);
    //sql to create table
    $query = "CREATE TABLE IF NOT EXISTS products (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        category VARCHAR(100),
        details VARCHAR(100),
        price VARCHAR(50),
        image VARCHAR(100),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
    
    try {
        $conn->exec($query);
        echo "DB Created Successfully.";


        $data = [
            ['Americano','HOT','Mixed Ristretto','150.00','americano.jpg'],
            ['Iced Espresso','COLD','Mixed Ristretto','150.00','icedespresso.jfif'],
            ['Iced Latte','COLD','Flat White','150.00','icedlatte.jpg'],
            ['Caffe Latte','HOT','Cold Brew','150.00','caffelatte.jpg'],
            ['Iced coffee','COLD','Affogato','150.00','iced_coffee.jpg'],
            ['Coffee','HOT','Brewed Coffee','130.00','hot_coffee.webp']
        ];

        $query_i = $conn->prepare("INSERT INTO products (
            name,
            category,
            details,
            price,
            image
        ) VALUES (?,?,?,?,?)");

        try {
            $conn->beginTransaction();
            foreach ($data as $row)
            {
                $query_i->execute($row);
            }
            $conn->commit();
            echo "New record created successfully";
        }catch (Exception $e){
            $conn->rollback();
            throw $e;
        }
        
        $conn = null;
        exit();
    } catch (PDOException $th) {
        echo "Error in creating Table";
        echo $th;
        $conn = null;
        exit();
    }

    

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}