<?php
    include 'database.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\SIR RYAN FINAL PROJ 3C\PHPMailer\PHPMailer\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\SIR RYAN FINAL PROJ 3C\PHPMailer\PHPMailer\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\SIR RYAN FINAL PROJ 3C\PHPMailer\PHPMailer\PHPMailer\src\SMTP.php';

$mail = new PHPMailer(true);

if(isset($_POST['submit'])){
    $ownername = $_POST['ownername'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $petname = $_POST['petname'];
    $breed = $_POST['breed'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;

    $query = mysqli_query($conn, "insert into signup (ownername, email, password, petname, breed, image) values ('$ownername', '$email', '$password', '$petname', '$breed', '$image')");
    if($query){
        move_uploaded_file($image_tmp_name, $image_folder);
        $message[] = 'registered successfully!';
        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'webtestings80@gmail.com';                     
            $mail->Password   = 'fgijxdddjaahcpvm';                               
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;                                    
        
            $mail->setFrom('webtestings80@gmail.com', 'MPS | BULACAN');
            $mail->addAddress($_POST['email'], $_POST['ownername']);    
            $mail->isHTML(true);                                 
            $mail->Subject = 'Sample Email';
            $mail->Body    = 'You have successfuly registered your account. <b>Welcome to MPS BULACAN!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            echo 'Message has been sent';
            header('location:login.php');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
     }else{
        $message[] = 'registeration failed!';
     }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="registration.css">
        <title>MPS | Registration</title>
    </head>
    <body>
        <header>
            <ul>
                <li><img src="log in.png.png" class="logo"></li>
                <li><img src="paw.png.png" class="paw"></li>
                <li><a href="site.html">HOME</a></li>
                <li><a href="login.php">LOG IN</a></li>
            </ul>
        </header>
        <div class="owner">
            <form method="POST"  name="submit" id="submit" enctype="multipart/form-data">
                <h1>SIGN UP</h1>
                <table>
                    <tr>
                        <td>Owner Name:</td>
                        <td><input type="text" id="ownername" name="ownername" class="Owner" placeholder="Enter your name here" required></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" id="email" name="email" class="email" placeholder="Enter your email here" required></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" id="password" name="password" class="password" placeholder="Enter your password here" required></td>
                    </tr>
                    <tr>
                        <td>Pet name:</td>
                        <td><input type="text" id="petname" name="petname" class="petname" placeholder="Enter pet name" required></td>
                    </tr>
                    </tr>
                    <tr>
                        <td>Breed:</td>
                        <td><input type="text" id="breed" name="breed" class="breed" placeholder="Enter pet Breed" required></td>
                    </tr>
                    <tr>
                        <td>Insert avatar</td>
                        <td><input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Sign up" onclick="warning()"></td>
                    </tr>
                </table>
            </form>
            <script>
                function warning(){
                    var ownername = document.getElementById('ownername').value;
                    var email = document.getElementById('email').value;
                    var password = document.getElementById('password').value;
                    var petname = document.getElementById('petname').value;
                    var breed = document.getElementById('breed').value;
                    if(ownername == ''){
                        alert("Please fill up the Blank Fields!")
                    }
                    else if(email == ''){
                        alert("Please fill up the Blank Fields!")

                    }
                    else if(password == ''){
                        alert("Please fill up the Blank Fields!")

                    }
                    else if(petname == ''){
                        alert("Please fill up the Blank Fields!")

                    }
                    else if(breed == ''){
                        alert("Please fill up the Blank Fields!")

                    }
                    else{
                        alert("Data succesfully registered!")
                        
                    }
                }
            </script>
        </div>
        <div class="goldenret">
            <img src="gold.png">
        </div>
        <div class="persia">
            <img src="persian.png">
        </div>
        <div class="dogqoute">
            <img src="asoqoute.png">
        </div>
        <div class="catqoute">
            <img src="catqoute.png">
        </div>
    </body>
</html>