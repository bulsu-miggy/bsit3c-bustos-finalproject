<?php require 'header.php' ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body{
            background-image: url("bookbackground.png");  
            background-color: grey;
            background-blend-mode: multiply;
            content: center;
        }
        .card {
            width: 200px;
            margin:10px;
            margin-left:6px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: inline-block;
        }
        .book{
	        text-align: center;
	        width: auto;
	        height: 50px;
	        margin-top: 25px;
        }
        .book {
	        padding: 15px 25px;
	        margin-bottom: 10px;
	        border: unset;
	        border-radius: 15px;
	        color: #212121;
	        z-index: 1;
	        background: #e8e8e8;
	        position: relative;
	        font-weight: 1000;
	        font-size: 12px;
	        -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
	        box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
	        transition: all 250ms;
	        overflow: hidden;
        }
        .book::before {
	        content: "";
	        position: absolute;
	        top: 0;
	        left: 0;
	        height: 100%;
	        width: 0;
	        border-radius: 15px;
	        background-color: #212121;
	        z-index: -1;
	        -webkit-box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
	        box-shadow: 4px 8px 19px -3px rgba(0,0,0,0.27);
	        transition: all 250ms
        }
        .book:hover {
	        color: #e8e8e8;
        } 
        .book:hover::before {
	        width: 100%;
        }
        .butt{
	        text-align: middle;
	        font-size: 15px;
	        margin-bottom: 5px;
         }
         .banner-area {
	        width: 100%;
	        height: 100%;
	        margin: -31px 0 50px;
	        position: relative;
	        top: 80px;
	        background-image: url(backG.jpg);
	        -webkit-background-size: cover;
	        background-size: cover;
	        background-position: center;
         }
        .span1{
	        font-family: poppins;
	        color: white;
	        font-weight: 500;
	        font-size: 14px;
	        text-align: justify;
	        padding-left: 300px;
	        padding-right: 300px;
	        padding-top: 30px;
            text-align: center;
        }
        .bookemoji{
            padding-left: 300px;
	        padding-right: 300px;
            text-align: center;
            color: white;
        }
        .content-area {
	        width: 100%; 
	        position: relative;
	        top: 100px;
	        background: #f5f1ed;
	        height: 100%;                 
        }
    </style>
</head>
<body>
<center>
<div class="banner-area">
            <center><img src="logo.png" height="300px" weight="250px"></center>
			<div class="bookemoji">Bibliophile - a person who collects or has a great love of books. <br>
            ----- 📖 -----</div>
			<div>
			<p class="span1">Welcome to Bibliomaniac, the ultimate online book store that brings the joy of 
                reading directly to your screen. With our web-based system, you can explore a vast collection 
                of captivating books, curated for every literary taste. Discover new authors, engage in an active 
                reading community, and access your favorite titles seamlessly across devices. Bibliomaniac is your 
                virtual gateway to a world of literature, where bibliophiles unite and stories come alive with a click 
                of a button.</p>
            </div>
                
<div id="book-list" class="content-area">
    
</div>

</div>
    
<script>
    jQuery(document).ready(function($){
        $.ajax({
            type: "GET",
            url: "xmlfiles/book.xml",
            dataType: "xml",
            success: function(data) {
                var books = $(data).find('book');

                $(books).each(function(i, el){
                    var bookId = $(el).find("bookId").text();
                    var bookCover = $(el).find("bookCover").text();
                    var bookName = $(el).find("bookName").text();
                    var price = $(el).find("price").text();
                    var author = $(el).find("author").text();
                    var genre = $(el).attr("genre");

                    var bookCard = $('<div class="card"></div>');
                    bookCard.append('<img class="card-img-top" src="uploads/' + bookCover + '" alt="Book Cover" width="150px" height="250px">');
                    bookCard.append('<div class="card-body">');
                    bookCard.append('<h5 class="card-title">' + bookName + '</h5>');
                    bookCard.append('<p class="card-text">Price: ₱ ' + price + '</p>');
                    bookCard.append('<p class="card-text">Author: ' + author + '</p>');
                    bookCard.append('<p class="card-text">Genre: ' + genre + '</p>');
                    bookCard.append('<input type="number" name="quantity" class="form-control" value="1" min="1" style="text-align:center"> ');
                    bookCard.append('<center><button  class="book"><h5 class="butt">Add to Cart</h5></button></center>');
                    bookCard.append('</div>');

                    $("#book-list").append(bookCard);
                });
            }
        });
    });
</script>
</center>
</body>
</html>
