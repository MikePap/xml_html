<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DOMProcessingInstruction</title>
<style type="text/css">
h1{ color: #00F; font-size:24px;}
h3{ color:#663333; font-size:18px;}
dt{ color:#003399; margin-bottom:5px;}
dd{ color:#0066FF;}
.nota{ color:#FF6666;}
.codice{ color:#060}

</style>

</head>

<body>

<h1>DOMProcessingInstruction</h1>
<p class="nota">
E' utilizzato per inserire nel documento delle istruzioni (sript o tag ) </p>

<?php

$dom = new DOMDocument('1.0', 'UTF-8');
$html = $dom->appendChild(new DOMElement('html'));
$body = $html->appendChild(new DOMElement('body'));
$pinode = new DOMProcessingInstruction('php', 'echo "Hello World"; ');		// crea uno script PHP 
$body->appendChild($pinode);

$dom->formatOutput = true;

//echo $dom->saveXML();					// l'output non mostrerà niente perche è stato inserito del codice 'php'
echo "<xmp>" .$dom->saveXML(). "</xmp>";		// mostra il documento XML creato 


?>

<h1>DOMDocument::createProcessingInstruction</h1>

<?php
/*
// "Create" the document.
$xml = new DOMDocument( "1.0", "ISO-8859-15" );

//to have indented output, not just a line
$xml->preserveWhiteSpace = false;
$xml->formatOutput = true;

//creating an xslt adding processing line (viene creato il tag per collegare il file xslt al documento)
$xslt = $xml->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="../base.xsl"');
//adding it to the xml
$xml->appendChild($xslt);

//adding some elements
$root = $xml->createElement("list");
$node = $xml->createElement("contact", "John Doe");
$root-> appendChild($node);
$xml-> appendChild($root);

//creating the file
$xml-> save("output.xml");

// display final tree as HTML...
echo "<xmp>" .$xml->saveXML(). "</xmp>";
*/

?>















</body>
</html>
