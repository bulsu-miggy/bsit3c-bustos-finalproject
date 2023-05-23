<?php
function createXMLfile($reservationsArray)
{
    $filePath = 'xmlfiles/reservations.xml';

    $dom = new DOMDocument('1.0', 'utf-8');
    $dom->formatOutput = true;

    $impl = new DOMImplementation();
    $dtd = $impl->createDocumentType('reservations', '', 'reservations.dtd');
    $dom->appendChild($dtd);

    $root = $dom->createElement('reservations');
    foreach ($reservationsArray as $reservationData) {
        $reservation = $dom->createElement('reservation');

        foreach ($reservationData as $key => $value) {
            $element = $dom->createElement($key, $value);
            $reservation->appendChild($element);
        }

        $root->appendChild($reservation);
    }

    $dom->appendChild($root);
    $dom->save($filePath);

    echo "XML created Successfully!\n";

    validateXML($filePath);
}


function validateXML($xml)
{
    try {
        if (file_exists($xml)) {
            $dom = new DOMDocument();
            $dom->load($xml);
            if ($dom->validate()) {
                echo "This document is valid!\n";
            } else {
                echo "This file is not valid. Check your XML!\n";
            }
        } else {
            echo "Oops, the file does not exist!\n";
        }
    } catch (Exception $e) {
        echo "Some error occurred during the validation process: " . $e->getMessage() . "\n";
    }
}
?>
