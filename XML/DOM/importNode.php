<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>importNode</title>
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




<h1>DOMDocument::importNode</h1>


<?php

$orgdoc = new DOMDocument;
$orgdoc->loadXML("<root><element><child>text in child</child></element></root>"); // crea dei nodi XML

// The node we want to import to a new document
$node = $orgdoc->getElementsByTagName("element")->item(0);  // è il primo nodo dell'elemento 'element'

// Create a new document
$newdoc = new DOMDocument;
$newdoc->formatOutput = true;

// Add some markup
$newdoc->loadXML("<root><someelement>text in some element</someelement></root>");  // crea dei nodi XML

echo "The 'new document' before copying nodes into it:\n";
//echo $newdoc->saveXML();					// VISUALIZZAZIONE SENZA TAG
echo "<xmp>" .$newdoc->saveXML(). "</xmp>";		// VISUALIZZAZIONE con TAG

// Import the node, and all its children, to the document
$node = $newdoc->importNode($node, true);			// Il documento 'newdoc' importa i nodi del documento 'node' (riga 32)  .... 
// And then append it to the "<root>" node
$newdoc->documentElement->appendChild($node);		// ... e li inserisce all'interno del suo documento  

echo "\nThe 'new document' after copying the nodes into it:\n";
//echo $newdoc->saveXML();					// VISUALIZZAZIONE SENZA TAG
echo "<xmp>" .$newdoc->saveXML(). "</xmp>";		// VISUALIZZAZIONE CON	TAG


?>























</body>
</html>
