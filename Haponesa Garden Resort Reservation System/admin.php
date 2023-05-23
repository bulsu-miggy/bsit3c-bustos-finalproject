<?php
include 'dbconnection.php';

?>
<!DOCTYPE html>
<html lang="en">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haponesa Admin</title>
    
<style>
body, html {
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: url(pictures/haponesalog.jpg);
    background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
    column-gap: 30px;
}


</style>
    
</head>
<body class="p-3 mb-2 bg-info text-dark">
    <center><h1 style="color:lightgreen;"> HAPONESA ADMIN </h1>
<table class="table table-success table-striped">
    <tr>
       
</tr>



<tr></tr>

    <tr>

    <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">EMAIL</th>
      <th scope="col">Phone</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Offers</th>
      <th scope="col">Rooms</th>
      <th scope="col">Cottages</th>
      <th> </th>
    </tr>
    <button class="btn btn-outline-info"><a href="adminloginpage2.php" style="text-decoration:none">Back</a></button>
    <?php
        $sql = "select * from reserved";
   
        $result = mysqli_query($conn, $sql);
        if($result -> num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $Id = $row['ID'];
                $name = $row['Name'];
                $email = $row['Email'];
                $phone = $row['Phone'];
                $StartDate = $row['start_date'];
                $EndDate = $row['end_date'];
                $Offers = $row['Offers'];
                $rooms = $row['rooms'];
                $cottage = $row['cottage'];

                
    ?>
    
         <tr>

             <td scope="row"><?php echo $Id ?></td>
       
             <td><?php echo $name?></td>
             <td><?php echo $email ?></td>
             <td><?php echo $phone ?></td>
             <td><?php echo $StartDate ?></td>
             <td><?php echo $EndDate ?></td>
             <td><?php echo $Offers ?></td>
             <td><?php echo $rooms ?></td>
             <td><?php echo $cottage ?></td>
             <td>
                 <button class="btn btn-outline-info"><a href="adminedit.php?id=<?php echo $Id; ?>" style="text-decoration:none">Edit</a></button>
                 <button class="btn btn-outline-warning"><a href="delete.php?id=<?php echo $Id; ?>" style="text-decoration:none" onclick="return confirm('Are you sure you want to delete?')">Delete</a></button>
             </td>
         </tr> 

        <tr>
        
            </tr>
     <?php
           }
        }
        else{
            die(mysqli_error($conn));
        
    ?>
  
        
                                    <?php
        }
        ?>
        <form action="printreport.php" method="post" >
            <tr>
                
                    <button class="btn btn-success text-light" name="submit">Print Report</button>
    </tr>
            </form>
</table>


 
</body>
</html>