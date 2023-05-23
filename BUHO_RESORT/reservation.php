<?php
include 'db_con.php';
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/reserv.css">
        <title>Rooms/Cottages</title>
    </head>
    <body>

        <div class="left-container">
       <img class="img"src="Photo/logo.png">

       <div style="margin-left:10px;">
        <p style="color:black; font-family:Courier New;">MAIN MENU</p>
        <hr>
        <ul class="bullet">
            <li ><a href="admin.php">DashBoard</li></a>
            <li ><a href="user.php">User</li>
            <li ><a href="RCs.php">Rooms/Cottages</li></a>
            <li class="hover"><a href="reservation.php">Reservation</li>
            <li><a href="./buho_xml/index.php">Log out</li></a>
        </ul>
       </div>

        </div>

        <div class="top-container">
        <h1 class="title">Buho Resort System</h1>
        </div>
    
       

    </body>
    </html> <div class="user-container">
        <form method="post">
 
        <table class="boxing">
   
    
    <tr>
      <th>ID</th>
      <th>PHOTO</th>
      <th>NAME</th>
      <th>EMAIL</th>
      <th>CONT.NO.</th>
      <th>ADDRESS</th>
      <th>SCHED</th>
      <th>R & C Type</th>
      <th>Class</th>
      <th>Max Person</th>
      <th>Total</th>
    </tr>
    
    <?php
        $sql = "SELECT * from reservation";
        //select * from tablename 
        $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result)){
                $imageURL = 'payment/'.$row["gcash_screenshot"];
                $id = $row['id'];
                $name = $row['fname'];
                $email = $row['email'];
                $contact = $row['contact_number'];
                $address = $row['address'];
                $sched = $row['schedule'];
                $size = $row['size'];
                $type = $row['type'];
                $person = $row['max_person'];
                $price = $row['price'];
    ?>
         <tr>
             <td><?php echo $id ?></td>
             <td><img src="<?php echo $imageURL; ?>" alt="" style="width:90px;height:100px;margin-left:5px;"/> </td>
             <td><?php echo $name ?></td>
             <td><?php echo $email ?></td>
             <td><?php echo $contact ?></td>
             <td><?php echo $address ?></td>
             <td><?php echo $sched ?></td>
             <td><?php echo $size ?></td>
             <td><?php echo $type ?></td>
             <td><?php echo $person ?></td>
             <td><?php echo $price ?></td>
        <td>
        <button name="submit"><a class="a"href="confirm_admin.php?email=<?php echo $email; ?> "onclick="return confirm('Confirm Successfully!')"> confirm</a></button>
        <button class="b"><a class="a" href="delete_reser.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete?')"> delete</a></button>
        </td></tr>
    
     <?php
           }
        
    ?>
        </div>
        <div><button class="submit"  style="background-color:green"><a class="a" href="printreport.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to print?')"> Print Report</a></button></div>

    </body>
    </html>