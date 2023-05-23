<?php 
require_once("config.php");
// code user email availablity
if(!empty($_POST["emailid"])) {
	$email= $_POST["emailid"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "error : You did not enter a valid email.";
	}
	else {
		$sql ="SELECT EmailId FROM user WHERE EmailId=:Email";
$query= $dbh -> prepare($sql);
$query-> bindParam(':Email', $email, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
 
if($query -> rowCount() > 0)
		
{
echo "<span style='color:red'> Email already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
else{
	
	echo "<span style='color:green'> Email available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}

//Code check user name
if(!empty($_POST["username"])) {
	$RollNo=$_POST["username"];
	$sql ="SELECT RollNo FROM user WHERE RollNo=:RollNo";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':RollNo', $RollNo, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	 
	if($query -> rowCount() > 0){
	 echo "<span style='color:red'> Username already exists .</span>";
	 echo "<script>$('#submit').prop('disabled',true);</script>";
	}
		else {
	echo "<span style='color:green'> Username Available.</span>";
	echo "<script>$('#submit').prop('disabled',false);</script>";
	}}
	// End code check username

	

?>
