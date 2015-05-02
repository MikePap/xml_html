<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>Aggiorna dati</title>
<style type="text/css">

</style>
</head>
<body>


<?php 

if(isset($_GET['titolo'])){
$titolo = $_GET['titolo'];
//echo $titolo; 
$xml = simplexml_load_file("../allegati/books.xml") or die("ERROR: Cannot create SimpleXML object");
$title = $xml->xpath("//bookstore/book/title");		// estrae tutti i <title> all'interno di <book>
//echo $title[1];							// Restituisce il valore del primo tag <title>
$title[1][0] = $titolo;						// Harry Potter
//$title[1][0] = "Harry Potter"; 

///// Aggiornamento del file "books.xml" /////
file_put_contents("../allegati/books.xml", $xml->asXML()) or die("ERROR: Could not write to file");	
//echo "XML file successfully updated <br />";


} // if isset $_GET

?>




</body>
</html>
