<?php 
require_once("config.php");
if(!empty($_POST["RollNo"])) {
  $rollno= strtoupper($_POST["RollNo"]);
 
    $sql ="SELECT Name,verified FROM Libraryv2.user WHERE RollNo=:RollNo";
$query= $dbh -> prepare($sql);
$query-> bindParam(':RollNo', $rollno, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
foreach ($results as $result) {
if($result->verified==0)
{
echo "<span style='color:red'> Student is not verified </span>"."<br />";
echo "<b>Student Name: </b>" .$result->Name;
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else {
?>


<?php  
echo htmlentities($result->Name);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
 else{
  
  echo "<span style='color:red'> Invaid Username. Please Enter Valid Username .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}



?>
