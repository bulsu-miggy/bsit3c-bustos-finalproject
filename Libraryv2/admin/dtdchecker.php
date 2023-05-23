<?php function validateXML($xml)
{
    try {
        if (file_exists($xml)) {
            $dom = new DOMDocument;
            $dom->load($xml);

            libxml_use_internal_errors(true);
            $dom->validate();

            $errors = libxml_get_errors();
            if (empty($errors)) {
                echo "This document is valid!\n";
            } else {
                echo "This file is not valid. Check your DTD!\n";
                foreach ($errors as $error) {
                    echo "Error: " . $error->message . "\n";
                }
            }

            libxml_clear_errors();
        } else {
            echo "Oops! File does not exist.\n";
        }
    } catch (Exception $e) {
        echo "Some error occurred during the process: " . $e->getMessage() . "\n";
    }
}

validateXML("book_data.xml"); ?>
