<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
body, html {
    height: 100vh;
    width: 100%;
    display: flex;
    text-align:center;
    align:center;
    align-items: center;
    background-image: url(pictures/haponesalog.jpg);
    background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
    column-gap: 30px;
}
form{
		
        border: 2px solid #008CBA ;
        border-radius: 12px;
        padding: 50px;
        width: 800px;
       background: linear-gradient(45deg, #20BF55, #01BAEF);
        background-size: 600% 100%;
        animation: gradient 5s linear infinite;
        animation-direction: alternate;
        font-family:Comic Sans MS;

}
@keyframes gradient{
   0%{background-position: 0%}
   100%{background-position: 100%}

}

</style>

</head>
<body>
    <header>
 
    </header>

    <div align="center">

            <h3 style="color:lightgreen;">Update User Information</h3>
     
        <div class="row">
            <div class="col-md-6 offset-3">
                <?php ?>
          
                    <?php
                    session_start();

                    require 'dbconnection.php';

                        $currentUser = $_SESSION['username'];
                       
      
                        $sql = "SELECT * FROM user WHERE username ='$currentUser'";

                        $gotResuslts = mysqli_query($conn2,$sql);

                        if($gotResuslts){
                            if(mysqli_num_rows($gotResuslts)>0){
                                while($row = mysqli_fetch_array($gotResuslts)){
                                    //print_r($row['user_name']);
                                }
                                    ?>
                                    
<?php
$result = mysqli_query($conn2, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['ID'];
$username = $row['username'];
$email = $row['email'];
$name = $row['name'];
$password = $row['password'];



if(isset($_POST['submit'])){



    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
       $query = "update user set  email='$email',name='$name', password='$password' where ID=$id";
   $results = mysqli_query($conn2,$query);
   header('location:home.php');
}}
                            }
?>
                                    
<center>
            <form method="POST">
            <div class="form-group">
                             
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label>Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label>Name</label>
                                            <input type="name" name="name" class="form-control" value="<?php echo $row['name']; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label>Password</label>
                                            <input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>">
                                        </div>
<div>
                                        <label>Avatar</label>

<?php
$select = mysqli_query($conn2, "SELECT * FROM user WHERE id = '$id' ")
or die('query failed');
if(mysqli_num_rows($select) > 0){
    $fetch = mysqli_fetch_assoc($select);
}
?>
<form action="" method="post" enctype="multipart/form data">
<?php
if( $fetch['picture'] == '' ){
    echo '<img src="pictures/default dp.jpg">';
}
else{
    echo '<img src="profile_pictures/'.$fetch['picture'].'" style="height:100px; width: 100px;">';
}
?>

                                        </div>
                              

                                        <div class="form-group">
                                            <input type="submit" name="submit"  class="btn btn-info" value="submit" onclick="return confirm('Are you sure you want to update?')">
                                            <a href="home.php" style="color:white;"><button  style="text-decoration:none" class="btn btn-success" type="button" >back</a>
                                        </div>
                                        </div>
                                        <center>
                                    <?php
                                
                            
                        
                        

                    ?>
                
           </form>
                
            </div>
            
        </div>


    </div>
                
</body>
</html>