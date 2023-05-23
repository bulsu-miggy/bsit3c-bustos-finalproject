
<div style="display: none;">
<?php
include 'dbconnection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\Haponesa Garden Resort Reservation System\PHPMailer\PHPMailer\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\Haponesa Garden Resort Reservation System\PHPMailer\PHPMailer\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\Haponesa Garden Resort Reservation System\PHPMailer\PHPMailer\PHPMailer\src\SMTP.php';

$mail = new PHPMailer(true);
$email = $_POST['Email'];


try {
 
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                   
    $mail->SMTPAuth   = true;                                
    $mail->Username   = 'haponesagardenresort@gmail.com';                     
    $mail->Password   = 'irbgkwaynhbckkld';                            
    $mail->SMTPSecure = 'ssl';
	
    $mail->Port       = 465;                                    

 
    $mail->setFrom('haponesagardenresort@gmail.com', 'Haponesa Garden Resort');
    $mail->addAddress($email); 
     
    $mail->isHTML(true);                                  
    $mail->Subject = 'Haponesa Reservation';
    $mail->Body    = 'You can now reset your password <br> <a href="http://localhost/Haponesa%20Garden%20Resort%20Reservation%20System/editaccount.php">Click here to Reset</a> ';
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
</div>
<html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <style>
 .navtop {
	background-color: #2f3947;
	height: 60px;
	width: 100%;
	border: 0;
}
.navtop div {
	display: flex;
	margin: 0 auto;
	width: 1000px;
	height: 100%;
}
.navtop div h1, .navtop div a {
	display: inline-flex;
	align-items: center;
}
.navtop div h1 {
	flex: 1;
	font-size: 24px;
	padding: 0;
	margin: 0;
	color: #eaebed;
	font-weight: normal;
}
.navtop div a {
	padding: 0 20px;
	text-decoration: none;
	color: #c1c4c8;
	font-weight: bold;
}
.navtop div a i {
	padding: 2px 8px 0 0;
}
.navtop div a:hover {
	color: #eaebed;
}
body.loggedin {
	background-image: url(pictures/haponesa overview.png);
}
.content {
	width: 1000px;
	margin: 0 auto;
}
.content h2 {
	margin: 0;
	padding: 25px 0;
	font-size: 22px;
	border-bottom: 1px solid #e0e0e3;
	color: #4a536e;
}

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
.form {
    margin: 50px auto;
    width: 300px;
    padding: 30px 25px;
    background: white;
}
h1.login-title {
    color: #666;
    margin: 0px auto 25px;
    font-size: 25px;
    font-weight: 300;
    text-align: center;
}
.login-input {
    font-size: 15px;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 25px;
    height: 25px;
    width: calc(100% - 23px);
}
.login-input:focus {
    border-color:#6e8095;
    outline: none;
}
.login-button {
    color: #fff;
    background: #55a1ff;
    border: 0;
    outline: 0;
    width: 100%;
    height: 50px;
    font-size: 16px;
    text-align: center;
    cursor: pointer;
}
.link {
    color: #666;
    font-size: 15px;
    text-align: center;
    margin-bottom: 0px;
}
.link a {
    color: #666;
}



    </style>

</head>
<body>
<form class="form" method="post" name="login">
        <h3 class="login-title">You can now go back to Log In page</h3>
       
        <center><button><a href="login.php" style="color:black;">Click Here to Log In</a>
  </form>

</body>

</html>