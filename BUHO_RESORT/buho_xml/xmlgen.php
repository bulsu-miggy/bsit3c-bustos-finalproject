<?php require "../db_con.php"; ?>

<?php

/** create XML file */
$sql = "SELECT * from cottage_room ";
$result = mysqli_query($conn, $sql);
$roomsArray = array();
if ($result) {
   /* fetch associative array */
   while ($row = $result->fetch_assoc()) {
      array_push($roomsArray, $row);
   }

   if (count($roomsArray)) {
      createXMLfile($roomsArray);
   }
   /* free result set */
   $result->free();
}

function createXMLfile($roomsArray)
{

   $filePath = './xmlfiles/rooms.xml';

   if (!file_exists($filePath)) {
      $dom = new DOMDocument('1.0', 'utf-8');

      $dtd = new DOMImplementation();

      $dom->appendChild($dtd->createDocumentType('rooms', '', 'room.dtd'));

      $root = $dom->createElement('rooms');
      for ($i = 0; $i < count($roomsArray); $i++) {

         $roomId = $roomsArray[$i]['CRid'];
         $cottage_type = htmlspecialchars($roomsArray[$i]['cottage_type']);
         $roomClass = $roomsArray[$i]['class'];
         $roomperson = $roomsArray[$i]['person'];
         $roomPrice = $roomsArray[$i]['price'];
         $roomCategory = $roomsArray[$i]['category'];
         $roomphoto = $roomsArray[$i]['photo'];
         $roomMediaType = $roomsArray[$i]['media_type'];

         //Start XML Generation
         $room = $dom->createElement('room');
         $room->setAttribute('category', $roomCategory);

         $id = $dom->createElement('CRid', $roomId);
         $room->appendChild($id);

         $cot = $dom->createElement('cottage_type', $cottage_type);
         $room->appendChild($cot);

         $class = $dom->createElement('class', $roomClass);
         $room->appendChild($class);

         $person = $dom->createElement('person', $roomperson);
         $room->appendChild($person);

         $price = $dom->createElement('price', $roomPrice);
         $room->appendChild($price);

         $photo = $dom->createElement('photo', $roomphoto);
         $room->appendChild($photo);
         $photo->setAttribute('type', $roomMediaType);

         $root->appendChild($room);
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
function validateXML($xml)
{

   try {
      if (file_exists($xml)) {
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
   } catch (Exception $e) {
      echo "Some Error in process occured" . $e->getMessage();
   }

}

?>