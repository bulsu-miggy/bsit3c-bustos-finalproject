<?php
include 'db_con.php';
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
 
    //Load Composer's autoloader
    require 'C:\xampp\htdocs\PHPMailer\PHPMailer\PHPMailer\src\Exception.php';
    require 'C:\xampp\htdocs\PHPMailer\PHPMailer\PHPMailer\src\PHPMailer.php';
    require 'C:\xampp\htdocs\PHPMailer\PHPMailer\PHPMailer\src\SMTP.php';
 
    if (isset($_POST["submit"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
 
        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
 
        try {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
 
            //Send using SMTP
            $mail->isSMTP();
 
            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';
 
            //Enable SMTP authentication
            $mail->SMTPAuth = true;
 
            //SMTP username
            $mail->Username = 'johnalbertd00@gmail.com';
 
            //SMTP password
            $mail->Password = 'ayeobktrzsdfrhez';
 
            //Enable TLS encryption;
            $mail->SMTPSecure = 'ssl';
 
            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 465;
 
            //Recipients
            $mail->setFrom('johnalbertd00@gmail.com', 'BUHO RESORT');
 
            //Add a recipient
            $mail->addAddress($email, $name);
 
            //Set email format to HTML
            $mail->isHTML(true);
 
            $code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
 
            $mail->Subject = 'Email verification';
            $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $code . '</b></p>';
 
            $mail->send();
            // echo 'Message has been sent';
			$sql = "INSERT INTO verify(code, email) VALUES ('" . $code. "', '" . $email . "')";
            mysqli_query($conn, $sql);
		} catch (Exception $e) {
           // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
			?>
<?php  

require "functions.php";

$errors = array();

if($_SERVER['REQUEST_METHOD'] == "POST")
{

	$errors = signup($_POST);

	if(count($errors) == 0)
	{
		header("Location: email-verify.php?email=" . $email);
		die;
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/signups.css?v=<?php echo time(); ?>">
</head>
<body >
<?php 
	include './buho_xml/header.php';
?>
<form method="post">
	<div class="container">
	<h1>Register</h1>
	
			<?php if(count($errors) > 0):?>
				<div class="errors_mes alert alert-warning text-danger">
				<?php foreach ($errors as $error):?>
					<?= $error?> <br>	
				<?php endforeach;?>
			<?php endif;?>
		</div>
		
		<table>
			<tr>
			<td><input type="text" name="name" class="form-control" placeholder="Name"></td>
			</tr>
			<tr>
			<td><input type="text" name="email" class="mt-1 form-control" placeholder="Email"></td>
			</tr>
			<tr>
			<td><input type="password" name="password" class="mt-1 form-control" placeholder="Password"></td>
			</tr>
			<tr>
			<td><input type="password" name="password2" class="mt-1 mb-2 form-control" placeholder="Retype Password"></td>
			</tr>
			<tr>
			<td><input type="submit" class="submit mb-2 " value="Sign Up" name="submit"></td>
			</tr>
			<tr>
                    <td><p class="link" >Already have an account? <a href="login.php">Login here</a></p></td>
            </tr>
		</form>
	</div>
</body>
</html>