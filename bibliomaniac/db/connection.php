<!DOCTYPE html>
<html>
    <body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "bibliomaniac";

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
        echo "<br> Database Already Exists";
    }

    $sql = "use $dbname";
    $conn->exec($sql);
    //sql to create table
    $query = "CREATE TABLE IF NOT EXISTS upload (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        bookCover VARCHAR(100) NOT NULL,
        bookName VARCHAR(100),
        price VARCHAR(50),
        genre VARCHAR(50),
        author VARCHAR(100) NOT NULL)";
    
    try {
        $conn->exec($query);
        echo "DB Created Successfully. <br> There are data already but you can still upload books if you choose before generating xml file (xmlgenerator.php) ";
        $dataStatic = [
            ['AtomicHabits.jpg','Atomic Habits','249','Thriller','James Clear'],
            ['Ikigai.jpg','Ikigai','399','Romance','Ichigo Ichie'],
            ['OneByOne.jpg','One by One','699','Horror','Fredia McFadden'],
            ['LoveYourLife.jpg','Love Your Life','349','Self Help','Sophie Kinsella'],
            ['CrazyRichAsians.jpg','Crazy Rich Asians','299','Comedy','Kevin Kwan'],
            ['CloseQuarters.jpg','Close Quarters','219','Thriller','Thomas Wood']
        ];
        ?>
        <br>
    <a href="../adminUpload.html"> Click here to add books </a>
    <br> <br>
  <?php
        
        // Step 2: Execute a SELECT query
        $query = "SELECT * FROM upload";
        
        $result = $conn->query($query);
        
        // Step 3: Fetch the data
        $data = array();
        
       
if ($result->rowCount() > 0) {
    // Step 4: Store the data in an array
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
}


        $query_i = $conn->prepare("INSERT INTO upload (
            bookCover,
            bookName,
            price,
            genre,
            author
        ) VALUES (?,?,?,?,?)");

        try {
            $conn->beginTransaction();
            foreach ($dataStatic as $rowStatic)
            {
                $query_i->execute($rowStatic);
            };
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
</body>
</html>