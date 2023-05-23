<?php
include 'database.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="retrieve.css">
        <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
        <title>Dashboard</title>
    </head>
    <body>
        <header>
            <ul>
                <li><img src="log in.png.png" class="logo"></li>
                <li><img src="paw.png.png" class="paw"></li>
                <li><a href="site.html">LOG OUT</a></li>
                <li><a href="reservetable.php">RESERVATIONS</a></li>
                <li><a href="adminservice.php">EDIT SERVICES</a></li>

            </ul>
        </header>
        <div class="bg">
    
            <div class="Section_top">
                <h1>MARIE'S PET SALON DASHBOARD</h1>
            </div>

            <div class="vertical">
                
            </div>
    
            <div class="container">
                <h2 class="txtstud">USER INFORMATION</h2>
        <form action="deleteall.php" class="ads" method="POST">
            <table class="table">
                <tr><td colspan="7"><button class="btnAdd"><a href="addrecord.php"> Add Record</a></button></td></tr>
                <tr></tr>
    
                <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">OWNER NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">PET NAME</th>
                <th scope="col">BREED</th>
                </tr>
                <?php
                $no_per_page = 5;
                 $sql = "select * from signup";
                 $result = mysqli_query($conn, $sql);
                 $number_of_rows= mysqli_num_rows($result);
                 $number_of_pagination = ceil ($number_of_rows / $no_per_page);

                 if(!isset ($_GET['page'])){
                    $page = 1;
                 }else{
                    $page = $_GET['page'];
                 }

                 $starting_page_number = ($page-1)*$no_per_page;
                 if($result -> num_rows > 0){
                $sql = "select * from signup limit $starting_page_number, $no_per_page";
                $result = mysqli_query($conn, $sql);
                while($row = $result->fetch_object()){

            ?>
            <tr>
             <td><input type="checkbox" name="ids[]" value="<?=$row ->id ?>"></td>
             <th><?=$row ->id ?></th>
             <th><?=$row ->ownername ?></th>
             <th><?=$row ->email ?></th>
             <th><?=$row ->petname ?></th>
             <th><?=$row ->breed ?></th>
             <td>
                 <button style="background-color: black;"><a href="update.php?id=<?=$row ->id ?>" style="text-decoration:none">Edit</a></button>
                 <button style="background-color: black;"><a href="delete.php?id=<?=$row ->id ?>" style="text-decoration:none">Delete</a></button>
             </td>
         </tr> 
    <?php
        }
                }else{
                    die(mysqli_error($conn));
                }
    ?>       
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <?php
                    for($page = 1; $page<= $number_of_pagination; $page++){
                        echo '<td><a href = "retrieve.php?page=' . $page . '"> Page ' . $page . ' </a>';
                    }
                ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Delete"></td>
            </tr>
            </table>
            </div>
    </body>
</html>