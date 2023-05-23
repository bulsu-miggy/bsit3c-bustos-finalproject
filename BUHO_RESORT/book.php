<?php
// Include the database configuration file
include 'db_con.php';
$id = $_GET['id'];
// Get images from the database
$query = "SELECT * FROM cottage_room Where CRid=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$cottage_type = $row["cottage_type"];
$class = $row["class"];
$person = $row["person"];
$price = $row["price"];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $schedule = $_POST['sched'];
    $sql = "INSERT INTO reservation(fname,email,contact_number,address,schedule,size,type,max_person,price) 
    VALUES ('" . $name . "','" . $email . "','" . $contact . "','" . $address . "','" . $schedule . "','" . $cottage_type . "','" . $class . "','" . $person . "','" . $price . "')";

    if (mysqli_query($conn, $sql)) {

        header("location: payment.php?name=$name ");

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }

        img {
            display: block;
            margin: 0 auto;
            max-width: 200px;
        }

        pre {
            white-space: pre-wrap;
            font-family: inherit;
            margin: 0;
        }
    </style>
    <title>Book now!</title>
</head>

<body>
    <div class="container">

        <h1 class="text-center">BOOKING</h1>
        <div class="text-center mb-4">
            <pre>  <b> NOTE:</b>

The payment process will only
be done via gcash app on this
          online booking.</pre>
        </div>
        <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><b>Name:</b></label>
                        <input type="text" class="form-control" placeholder="Enter your name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email"><b>Email:</b></label>
                        <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="contact"><b>Contact Number:</b></label>
                        <input type="tel" class="form-control" name="contact"
                            placeholder="Please enter exactly 11 digits" pattern="\d{11}"
                            title="Please enter exactly 11 digits" required>
                    </div>
                    <div class="form-group">
                        <label for="address"><b>Address:</b></label>
                        <input type="text" class="form-control" placeholder="Enter Address" name="address" required>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                        <label for="sched"><b>Schedule:</b></label>
                        <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" name="sched"
                            required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="Size"><b>Size:</b></label>
                            </div>
                            <div class="col-md-9">
                                <p class="form-control-static">
                                    <?php echo $cottage_type; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-3 col-form-label"><b>Type:</b></label>
                        <div class="col-md-9">
                            <p class="form-control-static">
                                <?php echo $class; ?>
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="max" class="col-md-3 col-form-label"><b>Max Person:</b></label>
                        <div class="col-md-9">
                            <p class="form-control-static">
                                <?php echo $person; ?>
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-md-3 col-form-label"><b>Price:</b></label>
                        <div class="col-md-9">
                            <p class="form-control-static">
                                <?php echo $price; ?>
                            </p>
                        </div>
                    </div>

                    <div class="text-center mt-5 pt-3">
                        <button type="submit" class="btn btn-success ">Proceed to payment</button>
                        <a class="btn btn-secondary" href="./buho_xml/index.php"
                            onclick="return confirm('Are you sure you want to cancel?')">Cancel</a>
                    </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>