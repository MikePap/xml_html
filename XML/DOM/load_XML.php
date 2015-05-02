<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>load</title>
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


<h1>DOMDocument::load</h1>
<p class="nota">Permette di caricare un file XML nel documento </p>

<?php

$doc = new DOMDocument();
$doc->load('../allegati/books.xml');

echo $doc->saveXML();						// VISUAIZZA SOLO I TESTI DEI NODI (SENZA I TAG)
//echo "<xmp>" .$doc->saveXML(). "</xmp>";			// VISUALIZZA tutto L'XML

?>

<h1>DOMDocument::loadXML</h1>
<p class="nota">Permette di caricare l'XML creato all'interno del documento </p>

<?php
$documento = new DOMDocument();
$documento->loadXML('<root><node/></root>');
//echo $documento->saveXML();
echo "<xmp>" .$documento->saveXML(). "</xmp>";

?>

<h1>DOMDocument::loadHTML</h1>
<p class="nota">Permette di visualizzare il valore dell'HTML </p>

<?php
$document = new DOMDocument();
$document->loadHTML("<html><body>Test<br> per esempio</body></html>");
echo $document->saveHTML();

?>






<br /><br />




</body>
</html>
