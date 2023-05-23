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

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $create_datetime = date("Y-m-d H:i:s");
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'profile_pictures/'.$image;

    $query = mysqli_query($conn2, "insert into user(username, email, name, password, create_datetime, picture) values ('$username', '$email', '$name', '$password', '$create_datetime', '$image')");
    if($query){
        move_uploaded_file($image_tmp_name, $image_folder);
    echo "<script>alert('Registered successfully!');</script> ";
  
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
            $mail->addAddress($email, $name);  
            $mail->isHTML(true);                                 
            $mail->Subject = 'Haponesa Reservation';
            $mail->Body    = "You have successfully registered your account. <b>Welcome to Haponesa Garden Resort!</b> <br><a href='http://localhost/Haponesa%20Garden%20Resort%20Reservation%20System/login.php'>Click Here To Login</a>";
        
            $mail->send();
            echo 'Message has been sent';
            header('location:login.php');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
     }else{
        echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";

     }
}
?>
</div>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <style>

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
.content > p, .content > div {
	box-shadow: 0 0 5px 0 rgba(18, 119, 102, 0.637);
	margin: 25px 0;
	padding: 25px;
	background-color: #fff;
}
.content > p table td, .content > div table td {
	padding: 5px;
}
.content > p table td:first-child, .content > div table td:first-child {
	font-weight: bold;
	color: #4a536e;
	padding-right: 15px;
}
.content > div p {
	padding: 5px;
	margin: 0 0 10px 0;
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
h3 {
    font-weight: normal;
    text-align: center;
}





    </style>
</head>
        <title>Haponesa Registration</title>

    <body>
            <form method="POST" class="form" name="submit" id="submit" enctype="multipart/form-data">
        <h1 class="login-title">Haponesa Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Address" required>
        <input type="text" class="login-input" name="name" placeholder="Full Name" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <strong>Upload Profile Picture</strong>
        <input type="file" name="image" id="image"placeholder="Upload Picture" accept="image/jpg, image/jpeg, image/png">
        <div style = "height: 30px;"></div>
        <input type="submit" name="submit" value="Register" class="login-button" onclick="alert('Welcome to Haponesa Garden Resort, Please verify your email address')">
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
            </form>
    
    </body>
</html>