<?php
include 'db_con.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Rcs.css?v=<?php echo time(); ?>">
    <title>Rooms/Cottages</title>
</head>

<body>

    <div class="left-container">
        <img class="img" src="Photo/logo.png">

        <div style="margin-left:10px;">
            <p style="color:black; font-family:Courier New;">MAIN MENU</p>
            <hr>
            <ul class="bullet">
                <li><a href="admin.php">DashBoard</li></a>
                <li><a href="user.php">User</li>
                <li class="hover"><a href="RCs.php">Rooms/Cottages</li></a>
                <li><a href="reservation.php">Reservation</li>
                <li><a href="./buho_xml/index.php">Log out</li></a>
            </ul>
        </div>

    </div>

    <div class="top-container">
        <h1 class="title">Buho Resort System</h1>
    </div>



</body>

</html>
<div class="user-container">
    <form method="post">

        <table class="boxing">


            <tr>
                <th>ID</th>
                <th>PHOTO</th>
                <th>R & C Type</th>
                <th>Class</th>
                <th>Max Person</th>
                <th>Price</th>
            </tr>

            <?php
            $sql = "SELECT * from cottage_room";
            //select * from tablename 
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $imageURL = './includes/room_cottage/' . $row["photo"];
                $id = $row['CRid'];
                $cottage_type = $row['cottage_type'];
                $class = $row['class'];
                $person = $row['person'];
                $price = $row['price'];
                ?>
                <tr>
                    <td>
                        <?php echo $id ?>
                    </td>
                    <td><img src="<?php echo $imageURL; ?>" alt="" style="width:120px;height:70px;margin-left:5px;" /> </td>
                    <td>
                        <?php echo $cottage_type ?>
                    </td>
                    <td>
                        <?php echo $class ?>
                    </td>
                    <td>
                        <?php echo $person ?>
                    </td>
                    <td>
                        <?php echo $price ?>
                    </td>
                    <td>
                        <button><a class="a" href="includes/updateroomCottage.php?id=<?php echo $id; ?>">
                                Update</a></button>
                    </td>
                </tr>

                <?php
            }

            ?>

</div>

</body>

</html>