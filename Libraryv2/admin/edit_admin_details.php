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

// if ($type == 'Admin') 
if ($type !== 'Student')
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
if(document.editdtls.Password.value!= document.editdtls.ConfirmPassword.value)
{
alert("Password and Confirm Password Field do not match!");
document.editdtls.ConfirmPassword.focus();
return false;
}
return true;
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
                    <?php
  $rollno = $_SESSION['RollNo'];
  $sql="select * from Libraryv2.user where RollNo='$rollno'";
  $result=$conn->query($sql);
  $row=$result->fetch_assoc();

  $name=$row['Name'];
  $email=$row['EmailId'];
  $mobno=$row['MobNo'];
  $pswd=$row['Password'];
  $mobno=$row['MobNo'];
  $rollno=$row['RollNo'];
  $image=$row['image'];
  ?>   
                     <form method="post" onSubmit="return valid();" name="editdtls" action="edit_admin_details.php?id=<?php echo $rollno ?>" enctype="multipart/form-data">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <img src="<?php echo $image ?>" width="150" style="border-radius: 5px" id="preview">
                                    <div class="input-group">
                                    <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="exampleInputFile" name="image" onchange="updateFileName(this)">
                                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                             
   <script>
function updateFileName(input) {
    // Get the selected file
    var file = input.files[0];
    
    // Create a FileReader instance
    var reader = new FileReader();
    
    // Add an onload event listener to the FileReader instance
    reader.onload = function() {
        // Get the preview img element
        var previewImg = document.getElementById("preview");
        
        // Update the src attribute of the img element to the data URL
        // of the selected image
        previewImg.src = this.result;
    }
    
    // Read the selected file as a data URL
    reader.readAsDataURL(file);
    
    var fileName = input.files[0].name;
    
     // Get the label element
     var label = input.nextElementSibling;
    
     // Update the label's innerHTML to the file name
     label.innerHTML = fileName;
   }
</script>
                              <div class="col-md-9">
                                 <div class="card-header">
                                    <span class="fa fa-user"> Profile Information</span>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Full Name</label>
                                          <input type="text" class="form-control" placeholder="Full Name" Name="Name" value="<?php echo $name ?>" required>
                                       </div>
                                    </div>
                                    <div class="col-md-5">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Contact (start with 9)</label>
                                          <input type="text" class="form-control" placeholder="Contact" Name="MobNo" minlength="10" maxlength="10" pattern="9.+" value="<?php echo $mobno ?>" required>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Email</label>
                                          <input type="email" class="form-control" placeholder="sample@gmail.com" Name="EmailId" id="EmailId" pattern=".+@(gmail|yahoo|outlook|bulsu)\.com$|.+@bulsu\.edu\.ph$" value="<?php echo $email ?>"  autocomplete="off" required />
                                          <span id="user-availability-status" style="font-size:12px;"></span>
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
                                          <input type="text" class="form-control" placeholder="username" Name="RollNo" id="username" value="<?php echo $rollno ?>" disabled>
                                          <span id="username-availability-status" style="font-size:12px;"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="currentPassword">Current Password</label>
                                    <input type="password" class="form-control" placeholder="Enter your current password" name="currentPassword" required>
                                    </div> </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Password</label>
                                          <input type="password" class="form-control" placeholder="**********" Name="Password" pattern=".{8,}" >
                                       </div>
                                    </div>
                              <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Confirm Password</label>
                                          <input type="password" class="form-control" placeholder="**********" Name="ConfirmPassword"  >
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="row">
                        <div class="col-6">
                        <button type="submit" class="btn btn-info btn-block" name="editdtls" id="editdtls">Edit Details</button>
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
if(isset($_POST['editdtls']))
{
    $rollno = $_GET['id'];
    $name=$_POST['Name'];
    $email=$_POST['EmailId'];
    $mobno=$_POST['MobNo'];
    $pswd=$_POST['Password'];


    // get the existing value for the Image field from the database
$existing_value_query = "SELECT image FROM user WHERE RollNo = '$rollno'";
$result = mysqli_query($conn, $existing_value_query);
$row = mysqli_fetch_assoc($result);
$existing_value_from_database = $row['image'];

      // code to save the uploaded image
      if (!empty($_FILES["image"]["name"])) {
         // code to save the uploaded image
         $path_parts = pathinfo($_FILES["image"]["name"]);
         $file_name = uniqid() . '.' . $path_parts['extension'];
         $target_dir = "../uploads/";
         $target_file = $target_dir . $file_name;
         move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
       } else {
         // code to use the existing value in the database for the Image field
         $target_file = $existing_value_from_database;
       }

 // Retrieve the user's current password from the database
$currentPasswordQuery = "SELECT password FROM user WHERE RollNo = '$rollno'";
$result = mysqli_query($conn, $currentPasswordQuery);
$row = mysqli_fetch_assoc($result);
$currentPassword = $row['password'];

// Compare the current password from the database to the password entered in the form
if ($currentPassword == $_POST['currentPassword']) {
   // Update the user's password in the database
   $newPassword = $_POST['Password'];
   
   // Update the user's password in the database
if (empty($_POST['Password'])) {
   $newPassword = $currentPassword;
} else {
   $newPassword = $_POST['Password'];
}

$sql1="update Libraryv2.user set Name='$name', EmailId='$email', MobNo='$mobno', Password='$newPassword', image='$target_file' where RollNo='$rollno'";



try{
  $conn->query($sql1);
echo "<script type='text/javascript'>alert('Success')</script>";
echo "<script>window.location.href='edit_admin_details.php'</script>";
}
catch(Exception $e)
{
echo "<script type='text/javascript'>alert('Error')</script>";
}
}else {
   // Alert the user that the current password they entered was incorrect
   echo "<script type='text/javascript'>alert('Incorrect current password')</script>";
 }}
?>

  </body>

  <?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!')</script>";
} ?>


<!-- CONTENT-WRAPPER SECTION END-->
    <script src="asset/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="asset/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="asset/js/custom.js"></script>
   </body>
</html>