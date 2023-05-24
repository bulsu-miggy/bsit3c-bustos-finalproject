jQuery(document).ready(function($){

    $.get("xmlfiles/update.xml", function(data){
        var update_data = $(update_data).find('product');
        var display_template = $(document).find("#display-product");

        $(update_data).children("strand").each(function(i, el){
            //console.log(el);

            var update_data = display_template.clone(); 
            var update_data= $("<ul></ul>");

            var _product_id= $(el).children("product_id").text();
            var _category_id= $(el).children("category_id").text();
            var _product_name= $(el).children("product_name").text();
            var _product_image= $(el).children("product_image").text();
           

            $(update_data).attr("product_id", "product"+ product_id);
            $(update_data).find(".image").html('<img class="card-img-top" src="images/'+ product_image+'" />');
            
            $(update_data).find(".text").text(product_name);

            $(update_data).removeClass("d-none").appendTo("#book-list");

        });

    })

});