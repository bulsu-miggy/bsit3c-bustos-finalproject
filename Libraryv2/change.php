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

<script type="text/javascript">
      function valid()
{
if(document.forgot.password_update.value!= document.forgot.ConfirmPassword.value)
{
alert("Password and Confirm Password Field do not match!");
document.forgot.ConfirmPassword.focus();
return false;
}
return true;
}
</script>
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
            <form method="post" onSubmit="return valid();" name="forgot">
            <input type="hidden" name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>">
                  <div class="input-group mb-3">
                  <input type="password" class="form-control" id="id_password" placeholder="New Password" Name="password_update" pattern=".{8,}" required>
                     <div class="input-group-append">
                        <div class="input-group-text">
                        <i class="far fa-eye" id="togglePassword"></i>
                        </div>
                     </div>
                  </div>
                  <div class="input-group mb-3">
                  <input type="password" class="form-control" id="id_password" placeholder="Confirm Password" Name="ConfirmPassword" required>
                     <div class="input-group-append">
                        <div class="input-group-text">
                        <i class="fa fa-key" id="togglePassword"></i>
                        </div>
                     </div>
                  </div>
                  
                  <div class="row">
                     <div class="col-12">
                     </div>
                     <div class="col-6">
                        <button type="submit" class="btn btn-info btn-block" name="forgot">Forgot Password</button>
                     </div>
                     <div class="col-6">
                        <a href="index.php" name="back" class="text-center btn btn-info btn-block">Go Back</a>
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
     
     if(isset($_POST['password_update']))
     {
        $u=$_POST['email'];
        $sql="select * from Libraryv2.user where EmailId='$u'";

        $update_password = mysqli_real_escape_string($conn, $_POST['password_update']);
        $update_password = "UPDATE user SET Password='$update_password' WHERE EmailId ='$u'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if ($conn->query($update_password) === TRUE){
            echo "<script type='text/javascript'>alert('Succesfully Changed!')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
        else {
            echo "<script type='text/javascript'>alert('Error!')</script>";
            }
     }
     ?>
   </body>
</html>