<?php //require "connection.php"; ?>

<?php

/** create XML file */ 
$mysqli = new mysqli("localhost", "root", "", "bibliomaniac");
/* check connection */
if ($mysqli->connect_errno) {
   echo "Connect failed ".$mysqli->connect_error;
   exit();
}

$query = "SELECT * FROM upload";
$booksArray = array();
if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
       array_push($booksArray, $row);
    }
  
    if(count($booksArray)){
         createXMLfile($booksArray);
     }
    /* free result set */
    $result->free();
}
/* close connection */
$mysqli->close();

function createXMLfile($booksArray){
  
   $filePath = '../xmlfiles/book.xml';
   
   if(!file_exists($filePath)){
      $dom     = new DOMDocument('1.0', 'utf-8');

      $dtd = new DOMImplementation();

      $dom->appendChild($dtd->createDocumentType('books', '', 'Bookstore.dtd'));
      
      $root      = $dom->createElement('books'); 
      for($i=0; $i<count($booksArray); $i++){
      
      $bookId                =  $booksArray[$i]['id'];
      $bookCover             =  $booksArray[$i]['bookCover']; 
      $bookName              =  htmlspecialchars($booksArray[$i]['bookName']);
      $price                 =  $booksArray[$i]['price'];
      $genre                 =  $booksArray[$i]['genre']; 
      $author                =  $booksArray[$i]['author']; 
      
     
      
      //Start XML Generation
      $book      = $dom->createElement('book');
      $book->setAttribute('genre', $genre);

      $id        = $dom->createElement('bookId', $bookId); 
      $book->appendChild($id);

      $cover      = $dom->createElement('bookCover', $bookCover); 
      $book->appendChild($cover);

      $name      = $dom->createElement('bookName', $bookName); 
      $book->appendChild($name);

      $bookPrice     = $dom->createElement('price', $price); 
      $book->appendChild($bookPrice);

      $bookAuthor    = $dom->createElement('author', $author); 
      $book->appendChild($bookAuthor);
   
      $root->appendChild($book);
      }

      $dom->appendChild($root); 
      $dom->save($filePath);

      echo "XML created Successfully!\n";
   } else {
      echo "XML file already exists!<br>";
   }
   
   validateXML($filePath);

 }

 /**
  * DTD Checker
  */
 function validateXML($xml){

   try{
      if(file_exists($xml)){
         $dom = new DOMDocument;
         $dom->load($xml);
         if ($dom->validate()) {
            echo "This document is valid!\n";
         } else {
            echo "This file is not valid. Check your DTD!";
         }
      } else {
         echo "Oops File not exists";
      }
   } catch(Exception $e){
      echo "Some Error in process occured". $e->getMessage();
   }

 }

 ?>