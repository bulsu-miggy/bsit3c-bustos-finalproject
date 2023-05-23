<?php
include 'dbconnection.php';
?>

<!doctype html>
<html lang="en">
  <head>

  <link rel="stylesheet" href="style.css">
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

td { color:darkgreen; }


</style>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Home</title>
  </head>
  <body>
    <div>
    
<h1 style="color:lightgreen;">ADMIN PAGE</h1>


  <a href="adminusers.php" style="color:white;"><button  style="text-decoration:none" class="btn btn-success" type="button" name="gotouseraccounts">User Accounts</a>
  <a href="admin.php"  style="color:white;"><button  style="text-decoration:none" class="btn btn-success" name="gotoreservations" value="Reservations">Reservations</a>
  <a href="adminlogin.php" style="color:white;"><button  style="text-decoration:none" class="btn btn-success" type="button" >Log Out</a>

</div>
    </body>
</html> 