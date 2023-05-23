<?php
include 'db_con.php';
$id = $_GET['id'];
$sql = "select * from users where id= $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$date = $row['date'];

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];

    $query = "update users set name='$name', email='$email', date='$date' where id=$id";
    $resultquery = mysqli_query($conn, $query);
    if($resultquery){
        echo '<script></script>';
        header('location:user.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/update.css">
</head>
<body style="background-image: url('Photo/front.png');background-repeat: no-repeat; background-size:cover; ">
<form method="POST">
		<table>
            <h3>Update Record</h3>
			<tr>
			<td> 
                <label class="label" for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $name ?>"></td>
			</tr>
			<tr>
            <td>
            <label class="label" for="email">Email:</label>
            <input type="text" name="email" value="<?php echo $email ?>"></td>
			</tr>
			<tr>
			<td>
            <label class="label" for="date">Date:</label>
            <input type="text" name="date" value="<?php echo $date ?>"></td>
			</tr>
            </tr>
            <td><input type="submit" value="Update" class="submit cancel " name="submit" onclick="alert('Data updated successfully')">
            <button style="  background: red;
                             border: 0;
                             outline: 0;
                             width: 283px;
                             height: 50px;
                             font-size: 16px;
                             text-align: center;
                             cursor: pointer;
                             border-radius: 5px;
                            "><a href="user.php" class="cancel" onclick="return confirm('Are you sure you want to cancel?','Yes','No')">Cancel</a></button></td>
        </tr>
		</form>
	</div>
</body>
</html>