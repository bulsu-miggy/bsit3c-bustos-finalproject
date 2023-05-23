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

            $(reservation_html).attr("id", "reservation-" + _id);

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
