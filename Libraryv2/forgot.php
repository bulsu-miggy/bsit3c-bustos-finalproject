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
        $mail->setFrom('elibatbsu@gmail.com', 'E-Library Forgot Password');
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
        $mail->Subject = 'Reset You Password';
        $mail->Body    = "Forgot your password?
        Click the link below to Reset your Password 
        <a href='http://localhost/libraryv2/change.php?email=$email&vercode=$vercode'>Link</a>";

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
            <form action="forgot.php" method="post">
                  <div class="input-group mb-3">
                     <input type="email" class="form-control" placeholder="Enter Email" Name="Email" required>
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <span class="fas fa-envelope"></span>
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
      <?php
if(isset($_POST['forgot']))
{
 $u=$_POST['Email'];
 $vercode = bin2hex(random_bytes(6));

 
 $sql="select * from libraryv2.user where EmailId='$u'";
 $sql1="update libraryv2.user set vercode ='$vercode' where EmailId='$u'";

$result = $conn->query($sql);
$row = $result->fetch_assoc();



if ($conn->query($sql1) === TRUE && sendEmail($_POST['Email'],$vercode)) {
    
    echo "<script type='text/javascript'>alert('Forgot Password Link has been sent to your Email')</script>";
    echo header ("Refresh: 0.01;");
    } else {
    echo "<script type='text/javascript'>alert('Error!')</script>";
    }

  }

?>
<div class="footer">
<b>&copy;2022 PAHINA AKLATAN<img src="asset/img/nightg.png" height="50px" width="50px" style="display:inline-block">NIGHTGANG</b>
		
	</div>
   </body>
</html>