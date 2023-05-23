<?php
// Include the database configuration file
include 'db_con.php';
$statusMsg = '';
// File upload path
if(isset($_POST["create_submit"])){
$category ="Room/Cottage";
$cottage_type= $_POST['cottage_type'];
$class= $_POST['class'];
$person = $_POST['person'];
$price=$_POST['price'];
$targetDir = "./includes/room_cottages"; // specifies the directory where the file is going to be placed
$fileName = basename($_FILES["file"]["name"]); // basename is used to return filename (S_FILES["file button name"]["name"] - it is used to get the name of the file).
$targetFilePath = $targetDir . $fileName; // specifies the path of the file to be uploaded
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); // $filetype = .docx

if(isset($_POST["create_submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        //(, newlocation)
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
             
            $insert = $conn->query("INSERT INTO cottage_room (category, photo, cottage_type, class, person, price)
            VALUES ('$category', '$fileName', '$cottage_type', '$class', '$person', '$price');");
            if($insert){
                echo "<script>
                alert('Added'); 
                window.location.href='RCs.php';
                </script>";
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
} else {
    $statusMsg = 'Please select a file to upload.';
}}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Update Room and Cottages</title>

  <style>
  

    .container {
      margin: 5% auto;
      width: 350px;
      background-color: #f7c800;
      padding: 20px;
      border-radius: 10px;
    }

    .container table {
      margin-top: 20px;
      width: 100%;
    }

    .container th {
      text-align: center;
      color: black;
    }

    .container input[type="text"],
    .container input[type="file"] {
      width: 100%;
      height: 35px;
      margin-top: 5px;
      border: none;
    }

    .container .form-control {
      margin-top: 5px;
      border: none;
    }

    .container .submit-btn {
      margin-top: 20px;
      background: blue;
      color: white;
      border: none;
      width: 150px;
      height: 35px;
      cursor: pointer;
      font-size: 16px;
    }

    .container .cancel-btn {
      margin-top: 10px;
      background: red;
      color: white;
      border: none;
      width: 150px;
      height: 35px;
      cursor: pointer;
      font-size: 16px;
    }

    .container .cancel-btn a {
      text-decoration: none;
      color: white;
    }
  </style>
</head>

<body>
  <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
      <table>
        <tr>
          <th colspan="2">CREATE ROOM/COTTAGE</th>
        </tr>
        <tr>
          <td>Cottage Type:</td>
          <td><input type="text" name="cottage_type" ></td>
        </tr>
        <tr>
          <td>Class:</td>
          <td><input type="text" name="class" ></td>
        </tr>
        <tr>
          <td>Person:</td>
          <td><input type="text" name="person" ></td>
        </tr>
        <tr>
          <td>Price:</td>
          <td><input type="text" name="price"></td>
        </tr>
        <tr>
          <td>Select Image File:</td>
          <td><input class="form-control" type="file" name="file" id="formFile"></td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" class="submit-btn" name="create_submit" value="Create" onclick="return confirm('Are you sure you want to add?')">
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <button class="cancel-btn"><a href="../RCs.php" class="cancel" onclick="return confirm('Are you sure you want to cancel?')">Cancel</a></button>
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>

</html>
