<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DOM saveXML</title>
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

<h1>Metodo saveXML di DOM</h1>


<?php

$doc = new DOMDocument('1.0');
// we want a nice output
$doc->formatOutput = true;

$root = $doc->createElement('book');				// creazione del primo elemento che sarebbe la root del documento ('book') ...
$root = $doc->appendChild($root);					// .. che viene inserito nel documento 

$title = $doc->createElement('title');				// creazione di un altro elemento ('title') che ... 
$title = $root->appendChild($title);				// viene inserito all'interno della root 'book'

$text = $doc->createTextNode('This is the title');		// creazione di testo che ... 
$text = $title->appendChild($text);					// ... viene assegnanto all'elemento 'title'

echo "Saving all the document:\n";

echo "<xmp>" . $doc->saveXML() . "</xmp>";			// visualizzazione del documento creato 

echo "<br />";

echo "Saving only the title part:\n";
echo "<xmp>" .$doc->saveXML($title). "</xmp>";			// visualizzazione soltanto di una parte del XML creata (elemento 'title')

?>





















</body>
</html>
