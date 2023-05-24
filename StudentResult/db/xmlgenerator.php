<?php require "dbconnection.php"; ?>

<?php

$mysqli = new mysqli("localhost", "root", "", "strand_db");

if ($mysqli->connect_errno) {
    echo "Connect failed ".$mysqli->connect_error;
    exit();
 }

 $query = "SELECT  media_type,title,descp FROM strands";
 $strandsArray = array();
 if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        array_push($strandsArray, $row);
     }

     if(count($strandsArray)){
        createXMLfile($strandsArray);
    }
   /* free result set */
   $result->free();
}

$mysqli->close();

function createXMLfile($strandsArray){
    $filePath = '../xmlfiles/strand.xml';

    if(!file_exists($filePath)){
        $dom     = new DOMDocument('1.0', 'utf-8');
  
        $dtd = new DOMImplementation();

        $dom->appendChild($dtd->createDocumentType('strands', '', 'studentresult.dtd'));

        $root      = $dom->createElement('strands'); 
        for($i=0; $i<count($strandsArray); $i++){

       
        $strandMedia             =  $strandsArray[$i]['media_type']; 
        $strandTitle             =  $strandsArray[$i]['title']; 
        $strandDescp             =  $strandsArray[$i]['descp']; 

         $strandoffers      = $dom->createElement('strand');

         $title = $dom->createElement('title', htmlentities($strandTitle));
         $strandoffers->appendChild($title);

         $description = $dom->createElement('description', $strandDescp); 
         $strandoffers->appendChild($description);

         $media = $dom->createElement('media', $strandMedia); 
         $strandoffers->appendChild($media);

         $root->appendChild($strandoffers);
         

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