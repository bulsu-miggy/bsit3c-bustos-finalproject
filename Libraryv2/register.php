<?php
require('dbconn.php');
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($email,$vercode){
    require 'C:\xampp\htdocs\Libraryv2\PHPMailer\PHPMailer\PHPMailer\src\Exception.php';
	require 'C:\xampp\htdocs\Libraryv2\PHPMailer\PHPMailer\PHPMailer\src\PHPMailer.php';
	require 'C:\xampp\htdocs\Libraryv2\PHPMailer\PHPMailer\PHPMailer\src\SMTP.php';


    $mail = new PHPMailer(true);

    try {
                                    //Server settings                    
                                    //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'elibatbsu@gmail.com';                     //SMTP username
        $mail->Password   = 'vowfeewqotkzzdph';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('elibatbsu@gmail.com', 'E-Library');
        $mail->addAddress($email);     //Add a recipient
       // $mail->addAddress('ellen@example.com');               //Name is optional
       // $mail->addReplyTo('info@example.com', 'Information');
       // $mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
       // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification from E-Library';
        $mail->Body    = "Thanks for registration!
        Click the link below to verify your email 
        <a href='http://localhost/libraryv2/verify.php?email=$email&vercode=$vercode'>Verify</a>";

        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
       // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
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
      <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="asset/css/adminlte.min.css">
      <link rel="stylesheet" href="asset/css/style.css">

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
<style>
   label {
    font-weight: bold;
}

label a {
    text-decoration: underline;
}

</style>
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
                                    <img src="asset/img/avatar.jpg" width="150" style="border-radius: 5px">
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
                                          <label for="exampleInputEmail1">Contact (start with 9)</label>
                                          <input type="text" class="form-control" placeholder="+63" Name="PhoneNumber" minlength="10" maxlength="10" pattern="9.+" required>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Email</label>
                                          <input type="email" class="form-control" placeholder="sample@gmail.com" Name="Email" id="emailid" pattern=".+@(gmail|yahoo|outlook|bulsu)\.com$|.+@bulsu\.edu\.ph$" onBlur="checkAvailability()"  autocomplete="off" required />
                                          <span id="user-availability-status" style="font-size:12px;"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label>Department</label>
                                          <select class="form-control" name="Department" id="Category">
                                             <option value="BSIT">BSIT</option>
                                             <option value="EDEnglish">BSED - English</option>
                                             <option value="EDMath">BSED - Math</option>
                                             <option value="Drafting">CIT - Drafting</option>
                                             <option value="BSIE">Industrial Engineering</option>
                                             <option value="BSCPE">Computer Engineering</option>
                                          </select>
                                       </div>
                                    </div>
                                    <select name="Category" id="Category" style="background: whitesmoke" hidden>
                                    <option value="Student">Student</option>
                                    </select>
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
                                          <input type="password" class="form-control" placeholder="**********" Name="Password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                                          <div id="password-message"></div>
                                       </div>
                                     
                                    </div>
                                   

                                    <div class="col-md-6">
                                    

                                    <script>
                                      // Get the password input field
                                      var passwordInput = document.querySelector('input[name="Password"]');

                                      // Create a regular expression to check for a strong password
                                      var passwordRegex = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;

                                      // Add an event listener to the password input field
                                      passwordInput.addEventListener('input', function(event) {
                                        // Get the password from the input field
                                        var password = event.target.value;

                                        // Get the password message element
                                        var passwordMessage = document.querySelector('#password-message');

                                        // Check if the password is strong using the regular expression
                                        if (passwordRegex.test(password)) {
                                          // If the password is strong, display a message to the user
                                          passwordMessage.innerHTML = 'Strong password';
                                          passwordMessage.style.color = 'green';
                                          passwordMessage.style.fontSize = '10px';
                                          passwordMessage.style.position = 'absolute';

                                       } else {
                                          // If the password is not strong, display a message to the user
                                          passwordMessage.innerHTML = 'Weak password';
                                          passwordMessage.style.color = 'red';
                                          passwordMessage.style.fontSize = '10px';
                                          passwordMessage.style.position = 'absolute';
                                          

                                       }
                                    });
                                    </script>
                              </div>
                              <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="exampleInputEmail1">Confirm Password</label>
                                          <input type="password" class="form-control" placeholder="**********" Name="ConfirmPassword" required>
                                       </div>
                                    </div>
                                 </div>
                                 <label for="agreement">
                                 <input type="checkbox" name="agreement" value="1" required>
                                 I agree to the <a href="tnc.html">terms and conditions</a> and <a href="policy.html">policies</a>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="row">
                        <div class="col-6">
                        <button type="submit" class="btn btn-info btn-block" name="signup" id="submit">Register</button>
                     </div>
                     <div class="col-6">
                        <a href="index.php" class="text-center btn btn-success btn-block">Sign In</a>
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
   $md5_password = md5($password);
	$mobno=$_POST['PhoneNumber'];
	$rollno=$_POST['RollNo'];
   $category=$_POST['Category'];
	$department=$_POST['Department'];
	$type='Student';
   $image='../asset/img/avatar.jpg';
	
   $duplicate=mysqli_query($conn,"select * from libraryv2.user where RollNo='$rollno' or EmailId='$email'");
	$vercode = bin2hex(random_bytes(6));

	$sql="insert into libraryv2.user (Name,Type,Category,Department,RollNo,EmailId,MobNo,Password,vercode,verified,image) values ('$name','$type','$category','$department','$rollno','$email','$mobno','$md5_password','$vercode', '', '$image')";
   
	 if (mysqli_num_rows($duplicate)>0){
echo "<script type='text/javascript'>alert('User Already Exist')</script>";
}

elseif ($conn->query($sql) === TRUE && sendEmail($_POST['Email'],$vercode)) {
   echo "<script type='text/javascript'>alert('Registration Successful, Please check your Email for Verification')</script>";
   echo "<script>window.location.href='index.php'</script>";
   
   }
   else{
      echo "<script type='text/javascript'>alert('An Error has Occured')</script>";
   }
}

?>


<!-- CONTENT-WRAPPER SECTION END-->
    <script src="asset/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="asset/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="asset/js/custom.js"></script>

    <div class="footer">
<b>&copy;2022 PAHINA AKLATAN<img src="asset/img/nightg.png" height="50px" width="50px" style="display:inline-block">NIGHTGANG</b>
		
	</div>
   </body>
</html>