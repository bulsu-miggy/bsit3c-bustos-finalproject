jQuery(document).ready(function($){

    $.get("xmlfiles/strand.xml", function(data){
        var strand_data = $(data).find('strands');
        var display = $(document).find("#display_strand");

        $(strand_data).children("strand").each(function(i, el){
            //console.log(el);

            var strand_html = display.clone(); 
            var strandData = $("<div></div>");

            var _strandImg = $(el).children("media").text();
            var _strandTitle = $(el).children("title").text();
            var _stranddesc = $(el).children("description").text();


            $(strand_html).attr("id","strands-"+ _strandTitle);
            $(strand_html).find(".icon").html('<img class="card-img-top" src="Images/'+ _strandImg +'" />');
            
            $(strand_html).find(".title").text(_strandTitle);
            $(strand_html).find(".description").text(_stranddesc);

            $(strand_html).append('<h3>Title: '+ _strandTitle +'</h3>');
            $(strand_html).append('<p>description: '+ _stranddesc +'</p>');
            

            $(strand_html).find(".container").html(strandData);

            $(strand_html).removeClass("d-none").appendTo("#strandsection")

        });

    })

});