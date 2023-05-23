<?php
include "db_con.php";
require "functions.php";

$errors = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$email = $_POST['email'];
	$errors = login($_POST);

	if (count($errors) == 0) {
		header("Location: profile.php?email=$email");
		die;
	}
}

?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query = $conn->query("SELECT * FROM `admin` WHERE `email` = '$email' && `password` = '$password'") or die(mysqli_error());
	$fetch = $query->fetch_array();
	$row = $query->num_rows;

	if ($row > 0) {
		session_start();
		$_SESSION['email'] = $fetch['email'];
		header('location:./admin.php');
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>

</head>
<?php
include './buho_xml/header.php';
?>

<body>

	<form method="POST">
		<div class="container mt-5 pt-5 mb-5">
			<div class="row justify-content-center ">
				<div class="col-md-6  bg-light pt-5 pb-5">
					<h1 class="text-center">Login</h1>
					<?php if (count($errors) > 0): ?>
						<div class="errors_mes alert alert-warning text-danger">
							<?php foreach ($errors as $error): ?>
								<?= $error ?> <br>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Email address</label>
						<input type="text" class="form-control" name="email">
					</div>
					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Password</label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="text-center mt-3">
						<p>Already have an account? <a href="signup.html" class="text-primary">register here</a></p>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-success " style="width:545px;" >Submit</button>
					</div>
				</div>
			</div>
		</div>
	</form>

</body>
</html>