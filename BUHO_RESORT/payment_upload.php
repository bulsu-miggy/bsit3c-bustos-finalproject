<?php
include 'db_con.php';

$statusMsg = '';
$name=$_GET['name'];
$payment=$_POST['payment'];
$amount=$_POST['amount'];
$targetDir = "payment/"; 
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;

$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){

    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
 
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
   
            $query = "UPDATE reservation set type_of_payment='$payment', amount='$amount', gcash_screenshot='$fileName' WHERE fname=('".$name."')";
            $insert = mysqli_query($conn, $query);
            if($insert){
                header('location: thankyou.php');
                         }
            else{
                $statusMsg = "File upload failed, please try again.";
                 } 

        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}
else{
    $statusMsg = 'Please select a file to upload.';
    }

echo $statusMsg;
?>