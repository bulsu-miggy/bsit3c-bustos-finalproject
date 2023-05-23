<?php
require('dbconn.php');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>PAHINA AKLATAN</title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="asset/css/adminlte.min.css">
   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <!-- /.login-logo -->
         <div class="card card-outline card-primary">
            <div class="card-header text-center">
               <a href="" class="brand-link">
               <img src="asset/img/logo.png" alt="Library Logo" width="200">
               </a>
            </div>
            <div class="card-body">
               <form action="index.php" method="post">
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" placeholder="Username" Name="RollNo" required>
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-envelope"></span>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                     <input type="password" class="form-control" placeholder="Password" id="id_password" name="Password" required>
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <i class="far fa-eye" id="togglePassword"></i>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                     </div>
                     <div class="col-6">
                        <button type="submit" class="btn btn-info btn-block" name="signin">Sign In</button>
                     </div>
                     <div class="col-6">
                        <a href="register.php" class="text-center btn btn-info btn-block">Register Account</a>
                        <a href="forgot.php" name="forgot" class="text-center btn">Forgot Password?</a>
                     </div>
                  </div>
               </form>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.login-box -->
      <script>
         const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
      </script>

<?php
if(isset($_POST['signin']))
{$u=$_POST['RollNo'];
 $p=$_POST['Password'];

 $sql="select * from libraryv2.user where RollNo='$u'";

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Type'];
 // Check if the password stored in the database is an MD5 hash
 if (preg_match('/^[a-f0-9]{32}$/', $x)) {
   // The password is an MD5 hash, so we need to hash the user-provided password using the MD5 algorithm
   $hashed_password = md5($p);

   // Compare the hashed password with the one stored in the database
   if ($hashed_password === $x) {
       // The password is correct, so we can log the user in
       $_SESSION['RollNo'] = $u;
       if ($y == 'Admin') {
           echo header("Location:admin/index.php");
       } elseif ($y == 'librarian') {
           echo header("Location:admin/index.php");
       } else if ($y == 'Student') {
           echo header("Location:student/index.php");
       }
  }}
else 
 { echo "<script type='text/javascript'>alert('Incorrect Username or Password')</script>";
	header( "Refresh:0; url=index.php", true, 303);
}
if ($p === $x) {
  // The password is correct, so we can log the user in
  $_SESSION['RollNo'] = $u;
  if ($y == 'Admin') {
      echo header("Location:admin/index.php");
  } elseif ($y == 'librarian') {
      echo header("Location:admin/index.php");
  } else if ($y == 'Student') {
      echo header("Location:student/index.php");
  }
} else {
  echo "<script type='text/javascript'>alert('Incorrect Username or Password')</script>";
  header( "Refresh:0; url=index.php", true, 303);
}
}
?>

<div class="footer">
<b>&copy;2022 PAHINA AKLATAN<img src="asset/img/nightg.png" height="50px" width="50px" style="display:inline-block">NIGHTGANG</b>
		
	</div>

   </body>
</html>