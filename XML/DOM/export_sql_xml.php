<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Export SQL in XML</title>
</head>

<body>

<h3>Esportare un set di risultati SQL in un file XML con PHP</h3>

<?php 
require("../allegati/Conn_mysqli.php");

$sql = "SELECT  id_nabc, titolo_nabc, categoria_nabc FROM news_abc ";
/*
################ Metodo con $mysqli->query (da book purple) ####################
if($result = $mysqli->query($sql)){

$xml = new DOMDocument("1.0");
$root = $xml->createElement("resultset");
$xml->appendChild($root);

if($result->num_rows > 0){
while($row = $result->fetch_row()){
$record = $xml->createElement("record");
$root->appendChild($record);

$fieldCount = 0;
while($fieldCount < $mysqli->field_count){
$field = $xml->createElement("field");
$record->appendChild($field);
$field->appendChild($xml->createTextNode($row[$fieldCount]));
$fieldCount++;
} // chiude while 
} // chiude while 
} // chiude if num_rows
$result->close();
} // chiude if prepare 
*/
########################################  Metodo con prepared statement   #############################
if($result = $mysqli->prepare($sql)){

$xml = new DOMDocument("1.0");
$root = $xml->createElement("resultset");			// si crea l'elemento root di nome 'resultset' e ...
$xml->appendChild($root);					//... lo si inserisce nel documento 

$result->execute();
$result->bind_result($id, $titolo, $cat);
while($result->fetch()){
$record = $xml->createElement("record");			// si crea un elemento di nome 'record' e ... 
$root->appendChild($record);					//... lo si inserisce all'interno della root ('resultset')

$jk = array($id, $titolo, $cat);				// si definisce l'array 'jk' dal 'bind_result'

for($i=0; $i<count($jk); $i++){
$field = $xml->createElement("field");	// si crea un elemento di nome 'field'(in verità sono 3 perchè l'aarray è formato da 3 elementi') e .. 
$record->appendChild($field);						//... lo si inserisce all'interno dell'elemento 'record' 
$field->appendChild($xml->createTextNode($jk[$i]));		// si creano all'interno di ogni elemento 'field' dei nodi testo che fanno riferimento all'array 'jk' e sono quindi i valori estratti dal database
} // chiude for 
} // chiude while 
} // chiude if prepare 

$mysqli->close();

// Visualizzazione del set di risultati  XML come HTML 
$xml->formatOutput = true;
echo "<xmp>" .$xml->saveXML(). "</xmp>";

//$xml->save("allegati_DOM/results.xml");	// si salva il documento in un file col nome di "results.xml" nella cartella "allegati_DOM"
$xml->save("results.xml");			// si salva il documento in un file col nome di "results.xml" (stessa directory)

?>

<br /><br />

























</body>
</html>
