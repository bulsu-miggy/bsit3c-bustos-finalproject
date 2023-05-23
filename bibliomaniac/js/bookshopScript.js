/** 
 
ONLY INTERNAL JAVASCRIPT IS APPLIED INSIDE THE INDEX FILE


jQuery(document).ready(function($){

    $.get("xmlfiles/book.xml", function(data){
        var book_data = $(data).find('book');
        var display_template = $(document).find("#display-template");

        $(book_data).children("book").each(function(i, el){
            console.log(el);

            var book_html = display_template.clone(); 
            var bookData = $("<ul></ul>");

            var _bookId = $(el).children("bookId").text();
            var _bookTitle = $(el).children("bookName").text();
            var _bookImg = $(el).children("bookCover").text();
            var _bookPrice = $(el).children("price").text();
            var _bookAuthor = $(el).children("author").text();
            var _bookgenre = $(el).attr("genre");


            $(book_html).attr("id", "book-"+ _bookId);
            $(book_html).find(".img-book-cover").html('<img class="card-img-top" src="images/'+ _bookImg +'" />');
            
            $(book_html).find(".card-title").text(_bookTitle);
            $(book_html).find(".card-subtitle").text(_bookPrice);

            $(bookData).append('<li>Author: '+ _bookAuthor +'</li>');
            $(bookData).append('<li>Category: '+ _bookgenre +'</li>');

            $(book_html).find(".card-text").html(bookData);

            $(book_html).removeClass("d-none").appendTo("#book-list");

        });

    })

}); **/