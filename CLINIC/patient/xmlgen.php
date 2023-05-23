<?php require "../connection.php"; ?>

<?php

/** create XML file */
$sql = "SELECT * from doctor ";
$result = mysqli_query($database, $sql);
$doctorsArray = array();
if ($result) {
   /* fetch associative array */
   while ($row = $result->fetch_assoc()) {
      array_push($doctorsArray, $row);
   }

   if (count($doctorsArray)) {
      createXMLfile($doctorsArray);
   }
   /* free result set */
   $result->free();
}

function createXMLfile($doctorsArray)
{

   $filePath = '../doctor/doctors.xml';

   if (!file_exists($filePath)) {
      $dom = new DOMDocument('1.0', 'utf-8');
      $dtd = new DOMImplementation();
      $dom->appendChild($dtd->createDocumentType('doctors', '', 'doc.dtd'));
      $root = $dom->createElement('doctors');

      $root = $dom->createElement('doctors');
      for ($i = 0; $i < count($doctorsArray); $i++) {

         $docId = $doctorsArray[$i]['docid'];
         $docEmail= htmlspecialchars($doctorsArray[$i]['docemail']);
         $docname = $doctorsArray[$i]['docname'];
         $docSpecial = $doctorsArray[$i]['specialties'];
         $docCategory = $doctorsArray[$i]['category'];
  
    

         //Start XML Generation
         $doctor = $dom->createElement('doctor');
         $doctor->setAttribute('category', $docCategory);

         $id = $dom->createElement('docid', $docId);
         $doctor->appendChild($id);

         $email = $dom->createElement('docemail', $docEmail);
         $doctor->appendChild($email);

         $name = $dom->createElement('docname', $docname);
         $doctor->appendChild($name);

         $specialties = $dom->createElement('specialties', $docSpecial);
         $doctor->appendChild($specialties);

         $root->appendChild($doctor);
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