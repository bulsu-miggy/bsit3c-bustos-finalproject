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
 

    if (isset($_GET["email"]))
    {
        $email = $_GET["email"];
 
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
            $mail->addAddress($email);
 
            //Set email format to HTML
            $mail->isHTML(true);
 
            $code = 'Thank You! We recieved your Payment.';
            $confirm='Paid';
            $mail->Subject = 'NOTICE';
            $mail->Body    = '<p><b style="font-size: 30px;">' . $code . '</b></p>';
        
            $mail->send();
             header ("location: reservation.php");
		} catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
			?>
<?php  