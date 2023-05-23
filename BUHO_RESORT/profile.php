<?php
 include 'db_con.php';

 $querylogin = "SELECT * FROM session Where session=1";
 $resultlogin = mysqli_query($conn, $querylogin);
 $login = mysqli_fetch_assoc($resultlogin) ;
 $session = $login["session"];

$name='';
$email='';

 if(isset($_GET['email'])){
 $email =$_GET['email'];
 $query = "SELECT * FROM users Where email=('".$email."')";
 $result = mysqli_query($conn, $query);
 $row = mysqli_fetch_assoc($result) ;
 $name = $row["name"];
 $email = $row["email"];
 }

 if(isset($_GET['submit'])){
    $email='';
 }
  ?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap');
*{
    font-family: 'Poppins', sans-serif;
}
.container{
    width:500px;
    height:400px;
    background: rgba(228, 228, 228, 0.651);
    margin: 40px 33%;
}
.img {
  border-radius: 50%;
  width:150px;
  position: relative;
  left: 50px;
  top: 50px;
}
h1{
    float:left;
    position: relative;
    left: 20px;
    top: 10px;
    color:whitergb(53, 53, 53);
}
.txt{
    margin:70px 50px;
    font-size:20px;
}
.input{
    position:relative;  
    left: 200px;
    border:none;
    width: 120px;
    height:30px;
    background-color:blue;
    color:white;
    font-size:15px;
    border-radius:20px;
}
.logout{
    position:relative;
    left: 200px;
    border:none;
    width: 120px;
    height:30px;
    background-color:red;
    color:white;
    font-size:15px;
    border-radius:20px;
}
.log{
    color:white;
    text-decoration:none;
}
</style>
</head>
<body>
    <?php 
	include('index.php');
     ?>
<form>
    <div class="container">
    <h1>PROFILE</h1>
    <img class="img" src="photo/logobuho.jpg" alt="Avatar"/>

    <div class="txt">
        <p>Name: &nbsp;&nbsp;&nbsp;<?php echo $name?></p>
        <p>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $email?></p> </p>
    </div>
        <input type="submit" value="Update Profile" class="input" name="submit">
        <button name="submit"class="logout"><a class="log" href="publicpage.php" class="cancel" onclick="return confirm('Are you sure you want to log out?','Yes','No')">log out</a></button></td>
    </div>
<form>
</body>
</html>

