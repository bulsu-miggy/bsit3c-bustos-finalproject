<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "strand_db";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    try {
        $conn->exec($sql);
    } catch (PDOException $th) {
        //echo "<br> Database Already Exists";
    }
    $sql = "use $dbname";
    $conn->exec($sql);
    //sql to create table
    $query = "CREATE TABLE IF NOT EXISTS strands (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100) NOT NULL,
            descp VARCHAR(400) NOT NULL,
            media_type VARCHAR(100)
        )";
        
     try {
        $conn->exec($query);    
        echo "DB Created Successfully.";

        $data = [
            ['STEM','stands for Science, Technology, Engineering, and Mathematics strand. Through the 
            STEM strand, senior high school students are exposed to complex mathematical and 
            science theories and concepts which will serve as a foundation for their college
            courses.','stem.png','image'],
            ['ABM','Activity-based management ABM is a means of analyzing a company profitability 
            by looking at each aspect of its business to determine strengths and weaknesses. 
            ABM is used to help management find out which areas of the business are losing 
            money so that they can be improved or cut altogether.','seo.png','image'],
            ['GAS','General Academic Strand (GAS) This strand was designed so that indecisive learners 
            can proceed with any college program. Though, learners under this strand will take/may 
            not take bridging programs (depending on the school) for the subjects not taken during 
            Senior High.A','education.png','image']

        ];

        $query_i = $conn->prepare("INSERT INTO strands (
            title,
            descp,
            media_type
            ) VALUES (?,?,?)");

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
?>