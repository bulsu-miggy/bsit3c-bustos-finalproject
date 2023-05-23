<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
        <script src="./js/jquery-3.6.4.min.js"></script>
        <script src="./js/reservationScript.js"></script>
  
</head>

<body>

    <?php include 'header.php' ?>

    <div class="wrapper">
        <div class="container mt-5">
            <div class="text-center list-inline">
                <img src="./img/buhologo.png" alt="BUHO RESORT Logo" class="img-fluid list-inline-item">
                <h2 class="list-inline-item ">BUHO RESORT</h2>
            </div>
            <div class="bg-info text-white py-1 mt-5 text-left">
                <h3 class=" ms-3">Room and Cottage</h3>
            </div>

            <div class="container row">

                <div class="container my-5">
                    <div id="room-list" class="row">

                    </div>
                </div>

                <div id="display-template" class="col-sm-4 pb-4 d-none">
                    <div class="card">
                        <div class="img-book-cover"></div>
                        <div class="card-body">
                            <h3 class="card-title"></h3>
                            <p class="card-text0"></p>
                            <p class="card-text1"></p>
                            <p class="card-text2"></p>
                            <span class="btn float-end"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php include 'footer.php' ?>
    

</body>

</html>