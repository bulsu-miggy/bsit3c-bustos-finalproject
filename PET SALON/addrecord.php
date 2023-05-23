<?php
    include 'database.php';
if(isset($_POST['submit'])){
    $ownername = $_POST['ownername'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $petname = $_POST['petname'];
    $breed = $_POST['breed'];

    $query = "insert into signup (ownername, email, password, petname, breed) values ('$ownername', '$email', '$password', '$petname', '$breed')";

    $resultquery = mysqli_query($conn, $query);
    if($resultquery){
        header("Location: retrieve.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="update.css">
        <title>MPS | Add Record</title>
    </head>
    <body>
        <header>
            <ul>
                <li><img src="log in.png.png" class="logo"></li>
                <li><img src="paw.png.png" class="paw"></li>
            </ul>
        </header>
        <div class="owner">
            <form method="POST" name="submit" id="submit">
                <h1>Add Record</h1>
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
                </table>
                <input type="submit" value="Add" name="submit" onclick="warning()">
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
                        alert("Data succesfully added!")
                        
                    }
                }
            </script>
             <div class="but">
            <form action="retrieve.php">
                <input type="submit" name="" value="Back">
            </form>
        </div>
        </body>
    </html>