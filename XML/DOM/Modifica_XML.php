<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>Creazione xml con POST  </title>
<style type="text/css">
body{  font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;}

h1{ color: #00F;}
h3{ color:#663333;}
dt{ color:#003399; margin-bottom:5px;}
dd{ color:#0066FF;}
.nota{ color:#FF6666;}
.codice{ color:#060}

</style>
</head>
<body>

<h1>Modifica di file XML mediante aggiunta e rimozione di elementi </h1>

<p class="nota">
In questo file vengono prima aggiunti dei nodi in tutti gli elementi <b>record</b> del file <q>results.xml</q> (creato dal file <q>export_sql_xml.php</q>) e poi rimossi.  <br />
C'è da notare che per aggiungere gli elementi ho utilizzato sia i metodi di <b>SimpleXML</b> ("simplexml_load_file", "addChild", "file_put_contents", asXML) che i metodi del <b>DOM</b> ("createElement", "appendChild", "createTextNode")  mentre per rimuoverli ho utilizzato metodi del <b>DOM</b> (removeChild). 
 
</p>

<?php

///////	AGGIUNTA DI ELEMENTI AL FILE "results.xml"	//////////////

//### Aggiunta di elementi utilizzando i metodi "SimpleXML" -- "file_put_contents" -- "asXML"
if (file_exists('results.xml')) {	
$xml = simplexml_load_file('results.xml');
$record = $xml->children();			// è il primo nodo(<record>) all'interno della root  <resultset>
//$nuovoEl = $xml->addChild("altro", "questo elemento è stato aggiunto successivamente");

// Aggiunta del nodo "nuovoElemento"
foreach($record as $tutti){
$nuovoEl = $tutti->addChild("nuovoElemento", "questo elemento è stato aggiunto successivamente");
} // foreach 

file_put_contents("results.xml", $xml->asXML())		// aggiorna il file 
or die("ERROR: Could not write to file");
echo "XML file successfully updated <br />";
}else{
exit('Il file non esiste');
} // else 

//### Aggiunta di elementi utilizzando i metodi del "DOM" 

$doc = new DOMDocument;
$doc->load('results.xml');
$doc->preserveWhiteSpace = false;	// Non utilizzando questo metodo dopo aver rimosso il/i nodi gli spazi vuoti rimarebbero

$parent = $doc->documentElement;	//  root 

//$record = $parent->getElementsByTagName('record')->item(0);		// primo elemento 'record'
//$record->appendChild($nuovo);							// aggiunge l'elemento 'nuovo' al primo elemento 'record'
$record = $parent->getElementsByTagName('record');
/*
// AGGIUNTA DI UN NUOVO ELEMENTO "nuovoElemento" A TUTTI I NODI 'record' 
foreach($record as $r){
$nuovo = $doc->createElement("nuovoElemento");
$nuovo->appendChild($doc->createTextNode("testo per nuovo elemento"));
$r->appendChild($nuovo);
} // 'foreach'
*/
/*
// RIMOZIONE DI ELEMENTI CREATI (vedi sopra)
//$dammi = $parent->getElementsByTagName('nuovoElemento')->item(0);
//$parent->removeChild($dammi); // questa soluzione si potrebbe utilizzare solo per un solo elemento che non sta all'interno di altri elementi
$dammi = $parent->getElementsByTagName('nuovoElemento');

// Metodo per rimuovere elementi che sono interni ad altri elementi 
$domElemsToRemove = array(); 
foreach ( $dammi as $domElement ) { 
  // ...do stuff with $domElement... 
  $domElemsToRemove[] = $domElement; 
} 
foreach( $domElemsToRemove as $domElement ){ 
  $domElement->parentNode->removeChild($domElement); 
} 
*/

//$dammi->parentNode->parentNode->removeChild($dammi->parentNode);	// mi elimina un elemento 'record' 

//while ($parent->childNodes->length) {
//$parent->removeChild($parent->childNodes->item(0));	// elimina tutti gli elementi all'interno della root $parent
//}


$doc->save("results.xml") or die("ERROR: Could not write to file");  // utilizzando il metodo 'save' non fa altro che riscrivere il file esistente con le modifiche apportate (in pratica lo sostituisce) 

// echo $doc->saveXML();	


?>





</body>
</html>
