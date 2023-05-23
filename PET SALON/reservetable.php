<?php
include 'database2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MPS Reservation Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/c82e9a37b7.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
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
.but{
    position:absolute;
    left:240px;
}
        </style>
    </head>
    <body class="py-5">
    <header>
            <ul>
                <li><img src="log in.png.png" class="logo"></li>
                <li><img src="paw.png.png" class="paw"></li>
                <li><a href="retrieve.php">USERS</a></li>
                <li><a href="reservetable.php">RESERVATIONS</a></li>
            </ul>
        </header>
        <form action="printreport.php" method="post" >
                    <button class="but" name="submit">Print Report</button>
<div class="row mt-5">
            <div class="offset-2 col-8 mt-5">
                <table class="table table-striped table-bordered" id="datatable">
                    <legend class="bg-secondary p-3 text-light text-center rounded">
                        <h2 class="m-0">Reservations Table</h2>
                        </legend>
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>lbs</th>
                        <th>individual</th>
                    </thead>
                    <tbody>
                    <?php                         
                            // Display database table data
                            if ($stmt = $conn->prepare("SELECT * FROM `reservations`")) {
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>".
                                            "<td>".$row["id"]."</td>".
                                            "<td>".$row["name"]."</td>".
                                            "<td>".$row["service"]."</td>".
                                            "<td>".$row["date_reserved"]."</td>".
                                            "<td>".$row["time_reserved"]."</td>".
                                            "<td>".$row["lbs"]."</td>".
                                            "<td>".$row["individual"]."</td>".
                                        "</tr>";
                                }
                                $stmt->close();
                            } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
        <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
                startDate: 'today',
            });

            $('#datatable').DataTable();

            $('#txtDate').keypress(function(e) {
                e.preventDefault();
            });
        });
    </script>
</body>
</html>