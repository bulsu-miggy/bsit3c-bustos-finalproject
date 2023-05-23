<!DOCTYPE html>
<html>
<head>
    <title>Reservation List</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#">MPS | Reservation List</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container my-5">
        <div id="reservation-list" class="row">
            <!-- Reservation items will be dynamically added here -->
        </div>
    </div>
    <div class="container my-5">
        <div id="reservation-list" class="row">
            <!-- Reservation items will be dynamically added here -->
        </div>
    </div>

    <div id="display-template" class="col-4 pb-4 d-none">
        <div class="card">
            <div class="img-book-cover"></div>
            <div class="card-body">
                <h3 class="card-title"></h3>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <p class="card-text"></p>
            </div>
        </div>
    </div>

    <!-- Include the necessary JavaScript files -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        jQuery(document).ready(function($){

            $.get("xmlfiles/reservations.xml", function(data){
                var reservation_data = $(data).find('reservation');
                var display_template = $(document).find("#display-template");

                $(reservation_data).each(function(i, el){

                    var reservation_html = display_template.clone(); 
                    var reservationData = $("<ul></ul>");

                    var _name = $(el).children("name").text();
                    var _service = $(el).children("service").text();
                    var _date_reserved = $(el).children("date_reserved").text();
                    var _time_reserved = $(el).children("time_reserved").text();
                    var _lbs = $(el).children("lbs").text();
                    var _individual = $(el).children("individual").text();

                    $(reservation_html).attr("id", "reservation-" + i);

                    $(reservationData).append('<li>Name: ' + _name + '</li>');
                    $(reservationData).append('<li>Service: ' + _service + '</li>');
                    $(reservationData).append('<li>Date Reserved: ' + _date_reserved + '</li>');
                    $(reservationData).append('<li>Time Reserved: ' + _time_reserved + '</li>');
                    $(reservationData).append('<li>Weight: ' + _lbs + '</li>');
                    $(reservationData).append('<li>Individual: ' + _individual + '</li>');

                    $(reservation_html).find(".card-text").html(reservationData);

                    $(reservation_html).removeClass("d-none").appendTo("#reservation-list");

                });

            })

        });
    </script>
</body>
</html>



