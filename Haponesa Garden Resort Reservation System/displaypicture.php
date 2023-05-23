<?php
    // Include the database configuration file
    include 'dbconnection.php';

    // Get images from the database
    $query = "SELECT * FROM user";
    $result = mysqli_query($conn2, $query);
    if($result->num_rows > 0){
        while ($row = mysqli_fetch_assoc($result)) {
            $imageURL = 'profile_pictures/'.$row["file_name"];
?>
        <img src="<?php echo $imageURL; ?>" style="height: 100px; width: 100px;"alt="" />
<?php
        }
    }
    else{ 
?>
    <p>No image(s) found...</p>
<?php 
    } 
?>