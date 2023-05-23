<?php
include 'database.php';
$id = $_GET['id'];
$sql = "select * from signup where id = $id ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$ownername = $row['ownername'];
$email = $row['email'];
$password = $row['password'];
$petname = $row['petname'];
$breed = $row['breed'];

if(isset($_POST['submit'])){
    $ownername = $_POST['ownername'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $petname = $_POST['petname'];
    $breed = $_POST['breed'];

    $query = "update signup set ownername='$ownername', email='$email', password='$password', petname='$petname', breed='$breed' where id=$id";
    $resultquery = mysqli_query($conn, $query);
    if($resultquery){
        header('location:retrieve.php');
        echo '<script></script>';
    }
    else{
        die(mysqli_error($conn));
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
        <title>MPS | Update</title>
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
                <h1>UPDATE</h1>
                <table>
                    <tr>
                        <td>Owner Name:</td>
                        <td><input type="text" id="ownername" name="ownername" class="Owner" placeholder="Enter your name here" value="<?php echo $ownername ?>"></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" id="email" name="email" class="email" placeholder="Enter your email here" value="<?php echo $email ?>"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" id="password" name="password" class="password" placeholder="Enter your password here" value="<?php echo $password ?>"></td>
                    </tr>
                    <tr>
                        <td>Pet name:</td>
                        <td><input type="text" id="petname" name="petname" class="petname" placeholder="Enter pet name" value="<?php echo $petname ?>"></td>
                    </tr>
                    </tr>
                    <tr>
                        <td>Breed:</td>
                        <td><input type="text" id="breed" name="breed" class="breed" placeholder="Enter pet Breed" value="<?php echo $breed ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Cancel" name="submit" a href="retrieve.php" onclick="return confirm('Are you sure you want to cancel?','Yes','No')"></td>
                       <td><input type="submit" value="Update" name="submit" onclick="alert('Data updated successfully')"></td>
                    </tr>
                </table>
    </form>