<?php
// Include the database configuration file
include '../db_con.php';
$id = $_GET['id'];
$statusMsg = '';
// File upload path
$cottage_type= $_POST['cottage_type'];
$class= $_POST['class'];
$person = $_POST['person'];
$price=$_POST['price'];
$targetDir = "room_cottages/"; //specifies the directory where the file is going to be placed
$fileName = basename($_FILES["file"]["name"]);//basename is used to return filename(S_FILES["file button name"]["name"]-it is use to get the name of the file.
$targetFilePath = $targetDir . $fileName;
// $targetFilePath = $tragetDir.basename($_FILES["file"]["name"]); //specifies the path of the file to be uploaded
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
//$filetype = .docx

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        //(, newlocation)
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
             
            $insert = $conn->query("UPDATE cottage_room  set photo='$fileName',cottage_type='$cottage_type',class='$class',person='$person',price='$price' where CRid=('".$id."')");
            if($insert){
                header('location: ../RCs.php');
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
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
?>

