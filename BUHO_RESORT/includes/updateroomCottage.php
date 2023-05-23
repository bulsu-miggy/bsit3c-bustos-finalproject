<?php
include '../db_con.php';
$id = $_GET['id'];
$sql = "SELECT * FROM cottage_room WHERE CRid = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$cottage_type = $row['cottage_type'];
$class = $row['class'];
$person = $row['person'];
$price = $row['price'];
$photo = $row['photo'];
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
    body {
      background-image: url('Photo/front.png');
      background-repeat: no-repeat;
      background-size: cover;
    }

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
    <form action="upload.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
      <table>
        <tr>
          <th colspan="2">UPDATE</th>
        </tr>
        <tr>
          <td>Cottage Type:</td>
          <td><input type="text" name="cottage_type" value="<?php echo $cottage_type ?>"></td>
        </tr>
        <tr>
          <td>Class:</td>
          <td><input type="text" name="class" value="<?php echo $class ?>"></td>
        </tr>
        <tr>
          <td>Person:</td>
          <td><input type="text" name="person" value="<?php echo $person ?>"></td>
        </tr>
        <tr>
          <td>Price:</td>
          <td><input type="text" name="price" value="<?php echo $price ?>"></td>
        </tr>
        <tr>
          <td>Select Image File:</td>
          <td><input class="form-control" type="file" name="file" id="formFile"></td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" class="submit-btn" name="submit" value="Update" onclick="return confirm('Are you sure you want to update?')">
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
