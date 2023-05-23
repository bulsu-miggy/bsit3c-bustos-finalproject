jQuery(document).ready(function($){

    $.get("xmlfiles/rooms.xml", function(data){

        var room_data = $(data).find('rooms');
        var display_template = $(document).find("#display-template");

        $(room_data).children("room").each(function(i, el){

            var room_html = display_template.clone(); 

            var _roomId = $(el).children("CRid").text();
            var _roomCottage_type = $(el).children("cottage_type").text();
            var _roomClass = $(el).children("class").text();
            var _roomPerson = $(el).children("person").text();
            var _roomPrice = $(el).children("price").text();
            var _roomImg = $(el).children("photo").text();


            $(room_html).attr("id", "room-"+ _roomId);
            $(room_html).find(".img-book-cover").html('<img class="card-img-top" src="../includes/room_cottage/'+ _roomImg +' " width="120" height="180" />');
            $(room_html).find(".card-title").text(_roomCottage_type);
            $(room_html).find(".card-text0").text(_roomClass);
            $(room_html).find(".card-text1").html('Max Occupancy: <b>'+_roomPerson+'</b>');
            $(room_html).find(".card-text2").html('Price: <b>'+_roomPrice+'</b>');
            $(room_html).find(".btn").html('<a href="../book.php?id='+_roomId+'" class="btn btn-success">Book now</a>');
            $(room_html).removeClass("d-none").appendTo("#room-list");

        });

    })

});