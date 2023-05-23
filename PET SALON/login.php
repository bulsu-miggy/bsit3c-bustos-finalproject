<?php
    include 'database.php';
    if(isset($_POST["submit"])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = mysqli_query($conn, "SELECT * FROM signup WHERE email = '$email'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            if($password == $row["password"]){
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header("Location: prof.php");
            }
            else{
                echo
                "<script> alert('Wrong Password'); </script>";
            }
        }
        else{
            echo
            "<script> alert('User not Registered');</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MPS | Log in</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div class="header">
            <nav>
                <img src="log in.png.png" class="imlogo">
                <img src="paw.png.png" class="paw">
            </nav>
        </div>
        <form class="box"  method="post">
            <h1>Log in</h1>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Log in">
            <a href="registration.php">Create an account?</a>
            <br>
            <br>
        </form>
        <div class="paw2">
            <img src="qoute2.png">
        </div>
        <div class="paw3">
            <img src="qoute.png"  class="pix2">
        </div>
        <div class="catdog">
            <img src="catdog.png" class="pix">
        </div>
        <div class="but">
            <form action="site.html">
                <input type="submit" name="" value="Back">
            </form>
        </div>
    </body>
</html>