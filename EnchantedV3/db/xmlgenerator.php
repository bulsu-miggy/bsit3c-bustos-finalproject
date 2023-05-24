<?php
$mysqli = new mysqli("localhost", "root", "", "testing1");

if ($mysqli->connect_errno) {
    echo "Connect failed " . $mysqli->connect_error;
    exit();
}

$query = "SELECT `product_id`, `category_id`, `product_name`, `product_image`  FROM `product` ";
$updateArray = array();

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        array_push($updateArray, $row);
    }

    if (count($updateArray)) {
        createXMLfile($updateArray);
    }

    $result->free();
}

$mysqli->close();

function createXMLfile($updateArray)
{
    $filePath = '../xmlfiles/update.xml';

    if (!file_exists($filePath)) {
        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->formatOutput = true;

        // Create the DOCTYPE declaration
        $implementation = new DOMImplementation();
        $dtd = $implementation->createDocumentType('product', '', 'update.dtd');
        $dom->appendChild($dtd);

        $root = $dom->createElement('product');
        $dom->appendChild($root);

        foreach ($updateArray as $productData) {
            $product = $dom->createElement('product');
            $root->appendChild($product);

            foreach ($productData as $key => $value) {
                $element = $dom->createElement($key, $value);
                $product->appendChild($element);
            }
        }

        $dom->save($filePath);
        echo "XML created successfully!\n";
        validateXML($filePath);
    } else {
        echo "XML file already exists!\n";
        validateXML($filePath);
    }
}

function validateXML($xml)
{
    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    $dom->load($xml);

    if ($dom->validate()) {
        echo "The XML document is valid!\n";
    } else {
        echo "The XML document is  valid.\n";
        foreach (libxml_get_errors() as $error) {
            
        }
    }
    libxml_clear_errors();
}
?>