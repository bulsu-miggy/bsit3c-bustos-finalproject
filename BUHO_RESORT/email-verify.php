<?php
  include 'db_con.php';
  //submit button
 if (isset($_POST["verify_email"])){
    $email=$_POST['email'];
    //verified email
     $sql = "UPDATE users SET email_verified = NOW() WHERE email = ('" . $email . "')";
     $result  = mysqli_query($conn, $sql);

     //for code validation
    $query = "SELECT * FROM verify Where email=('".$_GET['email']."')";
    $resultquery = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($resultquery) ;
    $code = $row["code"];
    $codem=$_POST['codes'];

       if($code == $codem){
        $sql = "DELETE FROM verify WHERE email=('" . $email . "')";
        mysqli_query($conn, $sql);
        echo "<script type='text/javascript'>alert('Succesfully Registered!');
        window.location='login.php.';
        </script>";
    } 
       else{
        echo "<script type='text/javascript'>alert('Invalid OTP code');
        window.location='email-verify.php?email=$email';
        </script>";
    }

     exit();
    }
//cancel button
    if (isset($_POST["cancel"])){
        echo "<script type='text/javascript'>confirm('Are you sure you want to cancel?','Yes','No');
        window.location='signup.php.';
        </script>";
        exit();
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Verify</title>
 <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap'); 
.container{
    position:relative;
    top:200px;
    left:550px;
    background-color:rgb(212, 212, 212);
    width:350px;
    height:150px;
}
input{
    position:relative;
    top:25px;
    left:10px;
    width: 150px;
    height:30px;
    border:none;
}
.align{
position:relative;
top:-10px;
left:10px;
}
h3{
    position:relative;
    top:25px;
    font-family: 'Poppins', sans-serif;
    margin-left:20px;
}
.cancel{
    position:relative;
    left: 168px;
    top:30px;
    background-color:red;
    color:white;
    font-family: 'Poppins', sans-serif;
}
.verify{
    position:relative;
    background-color:blue;
    color:white;
    font-family: 'Poppins', sans-serif;
}
 </style>
</head>
<body>
 <form method="POST">
<div class="container">
    <div class="align">
    <h3>ENTER CODE FROM YOUR EMAIL</h3>
 <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" />
 <input type="text" name="codes" placeholder="Enter verification code"  />
 <input type="submit" name="verify_email" value="Verify Email" class="verify">
 <input type="submit" name="cancel" value="Cancel" class="cancel">


</div>
 </div>
</form>
 
</body>
</html>