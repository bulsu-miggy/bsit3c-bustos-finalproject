<?php
    include 'database.php';
    $id = $_SESSION['id'];
    if(isset($_POST['update_profile'])){
        $update_ownername = mysqli_real_escape_string($conn, $_POST['update_ownername']);
        $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
        $update_petname = mysqli_real_escape_string($conn, $_POST['update_petname']);
        $update_breed = mysqli_real_escape_string($conn, $_POST['update_breed']);
        mysqli_query($conn, "UPDATE `signup` SET ownername = '$update_ownername', email = '$update_email', petname ='$update_petname', breed ='$update_breed' WHERE id = '$id'") or die('query failed');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile Update</title>
        <link rel="stylesheet" href="updateprof.css">
    </head>
    <header>
            <ul>
                <li><img src="log in.png.png" class="logo"></li>
                <li><img src="paw.png.png" class="paw"></li>
                <li><a href="services.php">SERVICES</a></li>
                <li><a href="prof.php">PROFILE</a></li>
                <li><a href="">LOG OUT</a></li>
            </ul>
        </header>
    <body>
        <div class="update-profile">
        <?php
                    $select = mysqli_query($conn, "SELECT * FROM signup WHERE id = '$id' ")
                    or die('query failed');
                    if(mysqli_num_rows($select) > 0){
                        $fetch = mysqli_fetch_assoc($select);
                    }
         ?>
                <form action="" method="post" enctype="multipart/form data">
                <?php
                    if( $fetch['image'] == '' ){
                        echo '<img src="default-avatar.png">';
                    }
                    else{
                        echo '<img src="uploaded_img/'.$fetch['image'].'">';
                    }
                ?>
                    <div class="flex">
                        <div class="inputBox">
                            <span>Owner name: </span>
                            <input type="text" name="update_ownername" value="<?php echo $fetch['ownername'] ?>" class="box">
                            <span>Email: </span>
                            <input type="text" name="update_email" value="<?php echo $fetch['email'] ?>" class="box">
                        </div>
                        <div class="inputBox">
                            <span>Petname: </span>
                            <input type="text" name="update_petname" value="<?php echo $fetch['petname'] ?>" class="box">
                            <span>Breed: </span>
                            <input type="text" name="update_breed" value="<?php echo $fetch['breed'] ?>" class="box">
                        </div>
                    </div>
                    <input type="submit" value="update profile" name="update_profile" class="btn">
                    <a href="prof.php" class="delete-btn">go back</a>
                </form>
        </div>
        </body>
</html>