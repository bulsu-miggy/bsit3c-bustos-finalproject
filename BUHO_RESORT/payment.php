<?php 
$name=$_GET['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/payment.css">
    <title>Payment</title>
</head>
<body>
    <div><img src="photo/logo.png"></div>
    <h1>PAYMENT</h1>

 <form action="payment_upload.php?name=<?php echo $name ?>" method="POST" enctype="multipart/form-data">
    <div class="container"> 

    <div class="table">
        <table>
            <tr>
                <th>BUHO RESORT DRT GCASH NO.</th>
                <th>0912-887-4569</th>
            </tr>
            <tr>
        <td><label for="payment"><b>Type of payment:</b></label></td>
        <td><select name="payment">
         <option value="Down-payment">Down-Payment</option>
        <option value="Full-payment" >Full-Payment</option>
        </select>
        </tr>
            <tr>
                <td><label for="amount"><b>Amount:</b></label></td>
                <td><input type="text"  name="amount" required></td>
            </tr>
            <tr>
                <td><label for="file"><b>Send Proof of screenshot:</b></label></td>
                <td><input type="file" placeholder="Enter contact number" name="file" required></td>         
            </tr>


            <tr>
                <td></td>
                <td><button name="submit" ><a class="cancel"onclick="return confirm('Are you sure you want to submit?','Yes','No')">Book now</button>
                <button class="button"><a class="cancel" href="book.php"onclick="return confirm('Are you sure you want to cancel?','Yes','No')">cancel</button></td>
            </tr>
        </table>
    </div>

    </div>
</form >
    
</body>
</html>