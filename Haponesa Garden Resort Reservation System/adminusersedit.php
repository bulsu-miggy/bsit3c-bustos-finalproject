<?php
include 'dbconnection.php';
$id = $_GET['id'];

$sql = "select * from user where id= $id";

$result = mysqli_query($conn2, $sql);
$row = mysqli_fetch_assoc($result);


$username = $row['username'];
$email = $row['email'];
$name = $row['name'];
$password = $row['password'];



if(isset($_POST['submit'])){


    $username = $_POST['username'];
    
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];



    $query = "update user set username='$username' , email='$email',name='$name', password='$password' where id=$id";

    $resultquery = mysqli_query($conn2, $query);
    if($resultquery){
        echo '<script></script>';
        header('location:adminusers.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
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
    <title>Admin User</title>
  </head>
  <body>
    <center>
        <div></div>

        <form method="POST">
        <table class="table table-success table-striped">
      <tr>
     <th>   <h2 style="color:darkgreen;" >Update Account</h2> </th>
     <td></td>
</tr>
                <tr>
                    <td style="color:darkgreen;" >UserName</td>
                    <td><input id="username" name="username"  type="text" value="<?php echo $username ?>"></td>
                </tr>
                <tr>
                    <td style="color:darkgreen;">Email</td>
                    <td><input type="Email" id="email" name="email"   value="<?php echo $email ?>"></td>
                </tr>

                <tr>
                    <td style="color:darkgreen;">Name</td>
                    <td><input id="name" name="name"  type="text" value="<?php echo $name ?>"></td>
                </tr>
                <tr>

                <tr>
                    <td style="color:darkgreen;">Password</td>
                    <td><input type="Password" id="password" name="password"   value="<?php echo $password ?>"></td>
                </tr>
             
          
               
                <tr>
                    <td></td>
                    <td>
                    <button class="btn btn-outline-warning" style="float:right;"><a href="adminusers.php" style="text-decoration:none" onclick="return confirm('Are you sure you want to cancel?','Yes','No')">Cancel</a></button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <input type="submit" style="float:left;"  class="btn btn-outline-info"value="Update" name="submit" onclick="alert('Data updated successfully')">
                    </td>
                </tr>
            </table>
            
        </form>
    </body>
</html> 