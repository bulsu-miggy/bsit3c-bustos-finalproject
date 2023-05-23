<?php
include 'dbconnection.php';
$id = $_GET['id'];

$sql = "select * from reserved where id= $id";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);



$name = $row['Name'];
$email = $row['Email'];
$phone = $row['Phone'];
$StartDate = $row['start_date'];
$EndDate = $row['end_date'];
$Offers = $row['Offers'];
$rooms = $row['rooms'];
$cottage = $row['cottage'];



if(isset($_POST['submit'])){

    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $StartDate = $_POST['start_date'];
    $EndDate = $_POST['end_date'];
    $Offers = $_POST['offersandservices'];
    $rooms = $_POST['rooms'];
    $cottage = $_POST['cottage'];
    $b=implode(',',$Offers);

    $query = "update reserved set Name='$name', Email='$email', Phone='$phone', start_date='$StartDate', end_date='$EndDate', Offers='$b', rooms='$rooms', cottage='$cottage' where id=$id";

    $resultquery = mysqli_query($conn, $query);
    if($resultquery){
        echo '<script></script>';
        header('location:admin.php');
    }
    else{
        die(mysqli_error($conn));
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
body, html {
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: url(pictures/haponesalog.jpg);
    background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
    column-gap: 30px;
}


</style>
    <title>Admin Update</title>
  </head>
  <body>
  <center>
        <div></div>
        <h2 style="color:darkgreen;">Admin Update</h2>
        <form method="POST">
        <table class="table table-success table-striped">
                <tr>
                    <td style="color:darkgreen;">Name</td>
                    <td><input id="Name" name="Name"  type="text" value="<?php echo $name ?>"></td>
                </tr>
                <tr>
                    <td style="color:darkgreen;">Email</td>
                    <td><input type="Email" id="Email" name="Email"   value="<?php echo $email ?>"></td>
                </tr>
                <tr>
                    <td style="color:darkgreen;">Phone Number</td>
                    <td><input type="Phone" id="Phone" name="Phone"   value="<?php echo $phone ?>"></td>
                </tr>
                <tr>
                    <td style="color:darkgreen;"> Start Date</td>
                    <td><input type="Date" id="Date" name="start_date"   value="<?php echo $StartDate ?>"></td>
                </tr>
                <tr>
                    <td style="color:darkgreen;"> End Date</td>
                    <td><input type="Date" id="Time" name="end_date"   value="<?php echo $EndDate ?>"></td>
                </tr>
                <tr>
                    <td style="color:darkgreen;">Offers</td>
                   <!-- <td><input type="Text" id="Offers" name="Offers"   value="<?php echo $Offers ?>"></td> !-->
                   <td>

                   <input type="checkbox" name="offersandservices[]" value="Private Pool">Private Pool P 6,000 1 Day <br>
              <input type="checkbox" name="offersandservices[]" value="Event Hall and Private Pool">Event Hall and Private Pool P 11,000 <br>
              <input type="checkbox" name="offersandservices[]" value="Rooms">Rooms P 1,800 per night   <select name="cottage" style="width: 60px; height: 45px;">
              <option value=''>No Cottage</option>
              <option value='1'>1 Cottage</option>
   <option value='2'>2 Cottages</option>
   <option value='3'>3 Cottages</option>
   <option value='4'>4 Cottages</option>
   <option value='5'>5 Cottages</option>
   <option value='6'>6 Cottages</option><br>
            
</select>
<br>

              <input type="checkbox" name="offersandservices[]" value="Cottages">Cottages P 500 per cottage              <select name="rooms" style="width: 60px; height: 45px;">
              <option value=''>No Room</option>
              <option value='1'>1 Room</option>
   <option value='2'>2 Rooms</option>
   <option value='3'>3 Rooms</option>
   <option value='4'>4 Rooms</option>
   <option value='5'>5 Rooms</option>
   <option value='6'>6 Rooms</option>
   <option value='7'>7 Rooms</option>
   <option value='8'>8 Rooms</option>
</select> <br>

</td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                    <button style="float:right;" class="btn btn-outline-info"><a href="admin.php" style="text-decoration:none" onclick="return confirm('Are you sure you want to cancel?','Yes','No')">Cancel</a></button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <input type="submit" class="btn btn-outline-warning" value="Update" name="submit" onclick="alert('Data updated successfully')">
                    </td>
                </tr>
            </table>
</center>
        </form>
    </body>
</html> 