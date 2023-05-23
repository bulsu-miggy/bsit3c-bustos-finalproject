<?php
    include '../db_con.php';
    $sql="SELECT * from cottage_room ";
    $result = mysqli_query($conn, $sql);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="./js/jquery-3.6.4.min.js"></script>
</head>
<body>

    <?php include 'header.php'?>

    <div class="wrapper">
        <div class="container mt-5">
            <div class="text-center list-inline">
                    <img src="./img/buhologo.png" alt="BUHO RESORT Logo" class="img-fluid list-inline-item" >
                    <h2 class="list-inline-item ">BUHO RESORT</h2>
            </div>
            <div class="bg-info text-white py-1 mt-5 text-left">
                    <h3 class=" ms-3" >Room and Cottage</h3>
            </div>
            <div class="container row" >
                <?php while($row = mysqli_fetch_array($result)){
                        $imageURL = '../includes/room_cottages/'.$row["photo"];
                ?>

               <div class="col-sm-4">
                 <div class="card mb-4 mt-4">
                     <img src="<?php echo $imageURL?>" class="card-img-top" alt="Room Type" width="100px" height="150px" onclick="zoomIn(this)">
                       <div class="card-body">
                          <h4 class="card-title"><?php echo $row["cottage_type"]?></h4>
                          <p class="card-text"><?php echo $row["class"]?></p>
                          <p class="card-text">Max Occupancy: <?php echo $row["person"]?></p>
                        <p class="card-text">Price: <?php echo $row["price"]?></p>
                       </div>
                  </div>
               </div>
               
                    <?php
                        }
                    ?>
         </div>
    </div>
</div>


    <?php include 'footer.php'?>

</body>
</html>