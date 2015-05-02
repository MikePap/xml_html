<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>mipiace non mi piace</title>
<style type="text/css">

</style>
</head>
<body>

<h3>mipiace.php </h3>


<?php 

if(isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c']) ){

$mipiace = $_GET['a'];			// valore aggiornato dell'elemento <mipiace> 
$nopiace = $_GET['b'];			// valore aggiornato dell'elemento <nopiace> 
$totale = $_GET['c'];			// valore aggiornato dell'elemento <totale> 

// read XML tree
$xml = simplexml_load_file("mipiace.xml") or die("ERROR: Cannot create SimpleXML object");	// carica il file 
	
$xml->mipiace = $mipiace;		// imposta l'elemento <mipiace> 
$xml->nopiace = $nopiace;		// imposta l'elemento <nopiace> 
$xml->totale = $totale;			// imposta l'elemento <totale>

file_put_contents("mipiace.xml", $xml->asXML())		// riscrive il file aggiornandolo con i nuovi valori 
or die("ERROR: Could not write to file");
// echo "XML file successfully updated <br />";


/*
$piace = 8;
$nopiace = 10;
$totale = 18;
*/
/*
$xml = simplexml_load_file('mipiace.xml');
foreach ($xml->children() as $name => $data) {  // Visualizza tag e valori 
   echo "$name: $data <br />";
} // foreach 
*/

/*
$doc = new DOMDocument;
$doc->load('mipiace.xml');
$doc->preserveWhiteSpace = false;	// Non utilizzando questo metodo dopo aver rimosso il/i nodi gli spazi vuoti rimarebbero
$parent = $doc->documentElement;	// root (like)

$jk = $parent->childNodes->item(2); // ottiene il nodo 2 (il terzo perchè il primo è il nodo 0)
//$jk = $doc->getElementsByTagName('like');
//echo $jk;

$hh = $doc->createTextNode($totale);


foreach ($jk as $name => $data) {  // Visualizza tag e valori 
   echo "$name: $data <br />";
} // foreach 


//echo $jk.firstChild();

$doc->save("mipiace.xml") or die("ERROR: Could not write to file");  // utilizzando il metodo 'save' non fa altro che riscrivere il file esistente con le modifiche apportate (in pratica lo sostituisce) 
*/



} // if(isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c']) ){

?>



<!--
http://localhost/xml_html/XML/DOM/mipiace.php
-->



</body>
</html>


