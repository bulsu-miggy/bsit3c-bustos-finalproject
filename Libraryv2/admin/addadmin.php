<?php
require('dbconn.php');
require('checking.php');
?>
<?php
// if ($_SESSION['RollNo'] == 'admin') {
    $rollno = $_SESSION['RollNo'];
    $sql="select * from Libraryv2.user where RollNo='$rollno'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    
    $type = $row['Type'];
  
  if ($type == 'Admin') 
{
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>PAHINA AKLATAN</title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="../asset/css/adminlte.min.css">
      <link rel="stylesheet" href="../asset/css/style.css">

      <script type="text/javascript">
function valid()
{
if(document.signup.Password.value!= document.signup.ConfirmPassword.value)
{
alert("Password and Confirm Password Field do not match!");
document.signup.ConfirmPassword.focus();
return false;
}
return true;
}
</script>

<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

function checkusernameAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#username-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>  
   </head>
   <body class="hold-transition login-page">
      <div class="login-box" style="width: 50%">
         <!-- /.login-logo -->
         <div class="card card-outline">
            <section class="content">
               <div class="container-fluid">
                  <div class="card card-info">
                     <div class="card-header">
                        <h3 class="card-title">Profile Information</h3>
                     </div>
                     <!-- /.card-header -->
                     <!-- form start -->
                     <form method="post" onSubmit="return valid();" name="signup">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <img src="../asset/img/avatar.jpg" width="150" style="border-radius: 5px">
                                    <div class="input-group">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-9">
                                 <div class="card-header">
                                    <span class="fa fa-user"> Profile Information</span>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Full Name</label>
                                          <input type="text" class="form-control" placeholder="Full Name" Name="Name" required>
                                       </div>
                                    </div>
                                    <div class="col-md-5">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Contact</label>
                                          <input type="text" class="form-control" placeholder="contact" Name="PhoneNumber" minlength="11" maxlength="11" pattern="09.+" required>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Email</label>
                                          <input type="email" class="form-control" placeholder="sample@gmail.com" Name="Email" id="emailid" pattern=".+@gmail\.com" onBlur="checkAvailability()"  autocomplete="off" required />
                                          <span id="user-availability-status" style="font-size:12px;"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label>Type</label>
                                          <select class="form-control" name="type" id="Category">
                                          <option value="Admin">Admin</option>
                                          <option value="librarian">Librarian</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="card-header">
                                          <span class="fa fa-key"> Account</span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Username</label>
                                          <input type="text" class="form-control" placeholder="username" Name="RollNo" id="username" onBlur="checkusernameAvailability()" required>
                                          <span id="username-availability-status" style="font-size:12px;"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Password</label>
                                          <input type="password" class="form-control" placeholder="**********" Name="Password" pattern=".{8,}" required>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                       </div>
                              </div>
                              <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Confirm Password</label>
                                          <input type="password" class="form-control" placeholder="**********" Name="ConfirmPassword" required>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="row">
                        <div class="col-6">
                        <button type="submit" class="btn btn-info btn-block" name="signup" id="submit">Register</button>
                     </div>
                     <div class="col-6">
                        <a href="index.php" class="text-center btn btn-danger btn-block">Cancel</a>
                     </div>
                   </div><br>
                     </form>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </section>
         </div>
         <!-- /.card -->
      </div>
      <!-- /.login-box -->

      <?php

if(isset($_POST['signup']))
{
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$mobno=$_POST['PhoneNumber'];
	$rollno=$_POST['RollNo'];
   $category=$_POST['type'];
	$type=$_POST['type'];

	$sql="insert into Libraryv2.user (Name,Type,Category,RollNo,EmailId,MobNo,Password) values ('$name','$type','$category','$rollno','$email','$mobno','$password')";

	try
	{
		$conn->query($sql);
		echo "<script type='text/javascript'>alert('Registration Successful')</script>";
		echo "<script>window.location.href='index.php'</script>";
	}
	catch(Exception $e) {
		echo "<script type='text/javascript'>alert('User Already Exist')</script>";
	}
}

?>


<!-- CONTENT-WRAPPER SECTION END-->
    <script src="asset/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="asset/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="asset/js/custom.js"></script>

    <?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!')</script>";
	echo "<script>window.location.href='./index.php';</script>";
} ?>
   </body>
</html>