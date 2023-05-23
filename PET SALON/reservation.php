<?php
include 'database2.php';
include 'XMLGenerator.php';

if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $service = $_POST['service'];
    $date_reserved = $_POST['date_reserved'];
    $time_reserved = $_POST['time_reserved'];
    $lbs = $_POST['lbs'];
    $individual = $_POST['individual'];

    $query = mysqli_query($conn, "insert into reservations (name, service, date_reserved, time_reserved, lbs, individual) values ('$name','$service','$date_reserved','$time_reserved', '$lbs', '$individual')");

    if ($query) {
        $message[] = 'registered successfully!';
    } else {
        $message[] = 'registration failed!';
    }

    /* XML generation */
    $query = "SELECT name, service, date_reserved, time_reserved, lbs, individual FROM reservations";
    $reservationsArray = array();

    if ($result = $conn->query($query)) {
        while ($row = $result->fetch_assoc()) {
            array_push($reservationsArray, $row);
        }

        if (count($reservationsArray)) {
            createXMLfile($reservationsArray);
        }

        $result->free();
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MPS Reservation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/c82e9a37b7.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="reservation.css">
    <style>
        body {
            background: yellow;
            font-family: sans-serif;
        }
        header li{
            display: inline;
            padding-left: 90px;
        }
        header li a{
            color: #333;
            text-decoration: none;
            padding: 13px;
            transition: .3s ease;
        }
        header li a:hover{
            color: #2ecc71;
        }
        header li img{
            width: 180px;
            height: 100px;
            float: left;
            margin-top: -35px;
        }
        header li .paw{
            width: 95px;
            height: 90px;
            margin-top: -35px;
        }
    </style>
</head>

<body class="py-5">
    <header>
        <ul>
            <li><img src="log in.png.png" class="logo"></li>
            <li><img src="paw.png.png" class="paw"></li>
            <li><a href="services.php">SERVICES</a></li>
            <li><a href="prof.php">PROFILE</a></li>
            <li><a href="logout.php">LOG OUT</a></li>
        </ul>
    </header>
    <main class="container">
        <div class="row">
            <div class="offset-2 col-8 font-size-xl">
                <div class="bg-secondary text-light rounded  text-center p-3">
                    <h2 class="font-weight-bold">MPS Reservation</h2>
                    <h3>Bulacan</h3>
                </div>
                <form action="" method="post" id="submit" class="my-5">
                    <div class="form-group">
                        <label for="txtName">Name:</label>
                        <input type="text" class="form-control" name="name" id="name"required>
                    </div>
                    <div class="form-group">
                        <label for="txtServ">Services offered:</label>
                        <select class="form-control" name="service" id="service" required>
                            <option value="Full_Groom">Full Groom</option>
                            <option value="Bath_and_Blow_Dry">Bath and Blow Dry</option>
                            <option value="Individual_Treatments">Individual Treatments</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtDate">Date:</label>
                        <input type="date" class="form-control datepicker" name="date_reserved" id="date_reserved" required>
                    </div>
                    <div class="form-group">
                        <label for="txtTime">Time:</label>
                        <input type="time" class="form-control" name="time_reserved" id="time_reserved" required>
                    </div>
                    <div class="form-group">
                        <label for="txtLbs">lbs:</label>
                        <select class="form-control" name="lbs" id="lbs" required>
                            <option value="Under_20lbs">Under 20lbs</option>
                            <option value="20-40lbs">20-40lbs</option>
                            <option value="40-80lbs">40-80lbs</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtIndi">Individual treatment inclusion:</label>
                        <select class="form-control" name="individual" id="individual" required>
                            <option value="None">none</option>
                            <option value="P 150 Blueberry and vanilla facial">P 150 Blueberry and vanilla facial</option>
                            <option value="P 150 Shampoo and coat">P 150 Shampoo and coat</option>
                            <option value="P 200 tooth gel and breath freshner">P 200 tooth gel and breath freshner</option>
                            <option value="P 250 Facial Trims">P 250 Facial Trims</option>
                            <option value="P 300 Feet and face tidy">P 300 Feet and face tidy</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark" name="submit">Reserve Now!</button>
                </form>
            </div>
        </div>
        <img src="cute.png" class="shitzu">
    </main>
</body>
