<?php
$servername = "localhost";
$product_id = "root";
$category_id = "";
$dbname= "testing1";



try {
    $conn = new PDO("mysql:host=$servername", $product_id, $category_id, );
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
    $query = "CREATE TABLE IF NOT EXISTS product (
     `product_id` int(11) NOT NULL,
     `category_id` int(11) NOT NULL,
     `product_name` varchar(255) NOT NULL,
     `product_image` varchar(122) NOT NULL)";
    
    try {
        $conn->exec($query);
        echo "DB Created Successfully.";


        $query_i = $conn->prepare("INSERT INTO product (
           product_id
           category_id
           product_name
            product_image
            
        ) VALUES (?,?,?,?)");

        try {
            $conn->beginTransaction();
            
            foreach ($conn as $row)
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
?>
