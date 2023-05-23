<?php
include 'dbconnection.php';

?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    
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
    <center><h1 style="color:darkgreen;"> HAPONESA ADMIN  </h1>
    <h2 style="color:darkgreen;"> User Accounts  </h2>
<table class="table table-success table-striped">
    <tr>
       
</tr>



<tr></tr>

    <tr>

      <th scope="col">Account Number</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Name</th>
      <th scope="col">Password</th>
      <th scope="col">CreateDate</th>
      <button class="btn btn-outline-info"><a href="adminloginpage2.php" style="text-decoration:none">Back</a></button>
 
      <th> </th>
    </tr>
    
    <?php
        $sql = "select * from user";
   
        $result = mysqli_query($conn2, $sql);
        if($result -> num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $Id = $row['ID'];
                $username = $row['username'];
                $email = $row['email'];
                $name = $row['name'];
                $password = $row['password'];
                $createdate = $row['create_datetime'];
            

                
    ?>
    
         <tr>

             <td scope="row"><?php echo $Id ?></td>
             <td><?php echo $username?></td>
             
             <td><?php echo $email ?></td>
             <td><?php echo $name?></td>
             <td><?php echo $password ?></td>
             <td><?php echo $createdate ?></td>
        

        
             <td>
                 <button class="btn btn-outline-info"><a href="adminusersedit.php?id=<?php echo $Id; ?>" style="text-decoration:none" >Edit</a></button>
                 <button class="btn btn-outline-warning"><a href="delete2.php?id=<?php echo $Id; ?>" style="text-decoration:none" onclick="return confirm('Are you sure you want to delete?')">Delete</a></button>
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
        <form action="printreport2.php" method="post" >
            <tr>
                
                    <button class="btn btn-success text-light" name="submit">Print Report</button>
    </tr>
            </form>
</table>


 
</body>
</html>