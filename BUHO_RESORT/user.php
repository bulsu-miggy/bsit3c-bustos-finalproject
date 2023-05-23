<?php
include 'db_con.php';
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/dashboards.css">
        <link rel="stylesheet" href="css/user.css">
        <title>Admin</title>
    </head>
    <body>

        <div class="left-container">
       <img class="img"src="Photo/logo.png">

       <div style="margin-left:10px;">
        <p style="color:black; font-family:Courier New;">MAIN MENU</p>
        <hr>
        <ul class="bullet">
            <li ><a href="admin.php">DashBoard</li></a>
            <li class="hover">User</li>
            <li><a href="RCs.php">Rooms/Cottages</li></a>
            <li><a href="reservation.php">Reservation</li>
            <li><a href="./buho_xml/index.php">Log out</li></a>
        </ul>
       </div>

        </div>

        <div class="top-container">
        <h1 class="title">Buho Resort System</h1>
        </div>

        <div class="user-container">
        <form method="post">
 
        <table class="boxing">
        <tr><td colspan="6">
        <button class="adduser_button"><a class="but" href="signup.php" > Add User</a></button></td></tr>

    <tr>
      <th>#</th>
      <th>ID</th>
      <th>NAME</th>
      <th>EMAIL</th>
      <th>DATE</th>
    </tr>
    
    <?php
        $sql = "select * from users";
        $result = mysqli_query($conn, $sql);
        if($result -> num_rows > 0){ 
        
        while($row= $result -> fetch_object()){ 
           
            ?>
          
</tr>
            <th><input type="checkbox" name="id[]" value="<?=$row-> id?>"></th>
            <th><?=$row -> id ?></th>
            <th><?=$row -> name ?></th>
            <th><?=$row -> email ?></th>
            <th><?=$row -> date ?></th>
        <td>
        <button><a class="but" href="update.php?id=<?php echo $row->id; ?>"> Update</a></button>
        <button class="deleteButton"><a class="but" href="delete.php?id=<?php echo $row-> id; ?> "onclick="return confirm('Are you sure you want to delete?')">Delete</a></button>
        </td></tr>
    
     <?php
           }
        }
        else{
            die(mysqli_error($conn));
        }
    ?>
    <tr> 
         <td><button class="downButton"><a class="but" href="deleteall.php" onclick="return confirm('Are you sure you want to delete?')">Delete All</button></td>
    </tr>

        </div>

    </body>
    </html>