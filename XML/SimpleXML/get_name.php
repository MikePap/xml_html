<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nome elemento XML </title>
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


<h1>SimpleElement::get_name</h1>

<p class="nota">Permette di ottenere i nomi degli elementi di una struttura XML che sta all'interno di un file php  </p>

<?php

// PER USARE LA CLASSE "SimpleXMLElement()" DOVENDO CARICARE l'XML DA UN FILE PHP SI USA APPUNTO "include"
include '../allegati/example.php';				// Caricamento di file PHP che contiene XML  
$nome_elem = new SimpleXMLElement($xmlstr);		// "$xmlstr" è la variabile che contiene XML nel file "example.php"

echo "<b>", $nome_elem->getName() , "</b>";		// "movies" (è il nome del primo nodo dell'albero, la root)
echo "<br />";
foreach ($nome_elem->children() as $child){
echo "<b>", $child->getName() . "</b><br />";			// "movie"  secondo_nodo (sono i nomi dei nodi figli di <movies>)
foreach ($child as $figli_child){
echo $figli_child . "<br />";				// scorre tra i valori dei figli di <movie> che sono <title> e i due <rating>
foreach($figli_child as $ff_child){
echo $ff_child . "<br />";					// come terza discendenza incontra <great-lines> che mostra il suo valore
foreach($ff_child as $fff_child){	// come quarta discendenza incontra i valori degli elementi interni a <character> che sono <name> e <actor>
echo $fff_child . "<br />";
} // 4° foreach
} // 3° foreach
} // 2° foreach
} // 1° foreach 

?>

<br /><br /><br />




















</body>
</html>
