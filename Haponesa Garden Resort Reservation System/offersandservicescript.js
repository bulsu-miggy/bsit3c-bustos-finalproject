jQuery(document).ready(function($){

$.get("offers.xml", function(data){
    var offer_data = $(data).find('service');
    var services = $(document).find("#services");

    $(offer_data).children("services").each(function(i, el){

        var offer_html = services.clone(); 
        var offerData = $("<div></div>");

        var _offers = $(el).children("offers").text();
        var _prc = $(el).children("prc").text();
        
        $(offer_html).attr("id", "service-"+ _offers);

        $(offer_html).find(".offers").text(_offers);
        $(offer_html).find(".prc").text(_prc);

        $(offer_html).append('<h2>'+ _offers +'</h2>');
        $(offer_html).append('<p>'+ _prc +'</p>');
      

        $(offer_html).find(".offersandserv").html(offerData);

        $(offer_html).removeClass("d-none").appendTo("#services");

    });

});

});



