<?php require "dbconnection.php"; ?>

<?php

/** create XML file */ 
$mysqli = new mysqli("localhost", "root", "", "offersandservices");
/* check connection */
if ($mysqli->connect_errno) {
   echo "Connect failed ".$mysqli->connect_error;
   exit();
}

$query = "SELECT offers,prc FROM haponesaoffer";
$offersArray = array();
if ($result = $mysqli->query($query)) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
       array_push($offersArray, $row);
    }
  
    if(count($offersArray)){
         createXMLfile($offersArray);
     }
    /* free result set */
    $result->free();
}
/* close connection */
$mysqli->close();

function createXMLfile($offersArray){
  
   $filePath = 'offers.xml';
   
   if(!file_exists($filePath)){
      $dom     = new DOMDocument('1.0', 'utf-8');

      $dtd = new DOMImplementation();

      $dom->appendChild($dtd->createDocumentType('service', '', 'offerandservices.dtd'));
      
      $root      = $dom->createElement('service'); 
      for($i=0; $i<count($offersArray); $i++){
      
      $offershaponesa      =  $offersArray[$i]['offers'];
      $prchp               =  $offersArray[$i]['prc'];
     
      
      //Start XML Generation
      $service      = $dom->createElement('services');

      $offers = $dom->createElement('offers', htmlentities($offershaponesa));
      $service->appendChild($offers);

      $prc = $dom->createElement('prc', $prchp); 
      $service->appendChild($prc);
   
      $root->appendChild($service);
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