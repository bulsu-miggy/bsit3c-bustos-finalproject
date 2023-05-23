<?php
include 'database.php';
$id = $_SESSION['id'];

if(!isset($id)){
    header('location:login.php');
};
if(isset($_GET['logout'])){
    unset($id);
    session_destroy();
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <link rel="stylesheet" href="prof.css">
    </head>
    <body>
    <header>
            <ul>
                <li><img src="log in.png.png" class="logo"></li>
                <li><img src="paw.png.png" class="paw"></li>
                <li><a href="services.php">SERVICES</a></li>
                <li><a href="prof.php">PROFILE</a></li>
                <li><a href="">LOG OUT</a></li>
            </ul>
        </header>
        <div class="container">
            <div class="profile">
                <?php
                    $select = mysqli_query($conn, "SELECT * FROM signup WHERE id = '$id' ")
                    or die('query failed');
                    if(mysqli_num_rows($select) > 0){
                        $fetch = mysqli_fetch_assoc($select);
                    }
                    if( $fetch['image'] == '' ){
                        echo '<img src="default-avatar.png">';
                    }
                    else{
                        echo '<img src="uploaded_img/'.$fetch['image'].'">';
                    }
                ?>
                <h3><?php echo $fetch['ownername']; ?></h3>
                <a href="update-profile.php" class="btn">update profile</a>
                <a href="prof.php?logout=<?php echo $id; ?>" class="delete-btn">logout</a>
            </div>
        </div>
    </body>
</html>
