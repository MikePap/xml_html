<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inserimento, eliminazione e sostituzione nodi</title>
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

<h1>Inserimento, eliminazione e sostituzione nodi XML </h1>
<dl>
	<dt>Metodi di PHP DOM utilizzati</dt>
           
	<dd><b>preserveWhiteSpace</b>: Non tiene conto degli spazi vuoti</dd>
	<dd><b>loadXML</b>: carica l'XML</dd>
	<dd><b>documentElement</b>: ottiene l'elemento root</dd>
	<dd><b>childNodes->item(n)</b>: ottiene l'elemento figlio indicato nel paramtro 'n' (indice) </dd>
	<dd><b>createElement()</b>: crea un elemento   </dd>
	<dd><b>appendChild</b>: aggiunge un elemento </dd>
	<dd><b>createTextNode</b>: crea del testo da inserire nell'elemento</dd>
	<dd><b>insertBefore</b>: inserisce un nuovo nodo prima di un'altro</dd>
	<dd><b>replaceChild</b>: sostituzione di un nodo con un'altro</dd>
	<dd><b>removeChild</b>: rimuove un elemento </dd>
</dl>

<?php
// define XML data string
$xmlData = <<< END
<?xml version="1.0"?>
<favorites>
    <pet>Humphrey Hippo</pet>
    <flavor>chocolate</flavor>
    <movie>Star Wars</movie>
</favorites>
END;

// read XML data
$xml = new DOMDocument(); 
$xml->formatOutput = true;        // format output
$xml->preserveWhiteSpace = false; // Non tiene conto degli spazi (discount whitespace)
$xml->loadXML($xmlData) or die("ERROR: Cannot create DOMDocument object"); // carica l'XML 

// print the original XML tree
echo "<xmp>OLD:\n" . $xml->saveXML() . "</xmp>";		// visualizza l'XML 

// get document element
$root = $xml->documentElement;		// ottiene l'elemento root 'favorites'
// add a node before <movie>
$movie = $root->childNodes->item(2);	// ottiene il nodo 2. il terzo perchè il primo è il nodo 0 ('movie')
$book = $xml->createElement("book");	// si crea il nodo <book>
$root->insertBefore($book, $movie);		// Inserisce il nuovo nodo <book> prima di <movie> nella root 
$book->appendChild($xml->createTextNode("The Lord Of The Rings"));	// crea testo e lo inserisce all'interno di <book>
// add a node after <movie>
$toy = $xml->createElement("toy");		// si crea il nodo <toy>
$toy->appendChild($xml->createTextNode("Stuffed bear"));		// a <toy> si crea un nodo-testo 
$root->appendChild($toy);			// <toy> si inserisce nella root 
// replace <flavor> with <icecream>
$flavour = $root->childNodes->item(1);					// si ottiene il nodo 1 il secondo: 'flavour')
$icecream = $xml->createElement("icecream");				// si crea il nodo <icecream>
$icecream->appendChild($xml->createTextNode("strawberry"));		// ad <icecream> si inserisce un testo(nodo-testo) 
$root->replaceChild($icecream, $flavour);					// si sostituisce il nodo secondo($flavour) con <icecream>
// delete node <movie>
$movie = $root->childNodes->item(3);	// si ottiene il nodo 3 (da notare che $movie inizialmente era il nodo 2 ma siccome se ne aggiunto un'altro è diventato il nodo 3) 
$root->removeChild($movie);          // e lo si elimina  

// print the modified XML tree
echo "<xmp>NEW:\n" . $xml->saveXML() . "</xmp>";
?>






















</body>
</html>
