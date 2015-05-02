<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>estrazione dati</title>
<style type="text/css">
h1{ color: #00F; font-size:24px;}
h3{ color:#663333; font-size:18px;}
dt{ color:#003399; margin-bottom:5px;}
dd{ color:#0066FF;}
.nota{ color:#FF6666;}
.codice{ color:#060}

.arancia{ color:orange; }

</style>

</head>

<body>


<?php

//$xml->simplexml_load_file("allegati/books.xml") ; // carica l'XML 
if (file_exists('../allegati/books.xml')) {
    $xml = simplexml_load_file('../allegati/books.xml');

//$libro = $xml->book;  //["category"]; //== 'CHILDREN'){

//foreach ($xml->xpath("//book[@category='CHILDREN']") as $name) {  // Non da risultato perchè 'book' contiene solo elementi e non valori
foreach ($xml->xpath("//title") as $name) {  // Restituisce tutti i valori dei tag 'title'
//foreach ($xml->xpath("//book[@category='CHILDREN']/author") as $name) {  // Restituisce i valori dei tag 'author' di 'book' con attributo 'category'='CHILDREN'
//foreach ($xml->xpath("//book[@category='WEB']/author") as $name) {  // come sopra
//foreach ($xml->xpath("//book/author") as $name) {  // Restituisce i valori dei tag 'author' che stanno in 'book'
//foreach ($xml->xpath("//title[@lang]") as $name) {  // Restituisce tutti i valori dei tag 'title' che hanno l'attributo 'lang'
//foreach ($xml->xpath("//title[@lang='it']") as $name) {  // Restituisce tutti i valori dei tag 'title' che hanno l'attributo 'lang' uguale a 'it'
//foreach ($xml->xpath("//book[@category='CHILDREN']/title") as $name) {
//foreach ($xml->xpath("//bookstore/book[1]/title") as $name) {  //  UGUALE AL SUCCESSIVO
//foreach ($xml->xpath("//book[1]/title") as $name) {  // Restituisce il valore del tag 'title' del primo tag 'book' (vedere anche riga 127-128)
//foreach ($xml->xpath("//book[1]/title | //book[1]/author | //book[1]/year") as $name){ // Restituisce i valori dei tag (title-author-year) che stanno nel primo tag 'book' 
//echo "$name - ";
echo "<span class='arancia'>$name</span> <br />";
}// chiude foreach

/*
//$name = $xml->xpath("//bookstore/book/title"); // UGUALE AL SUCCESSIVO
$name = $xml->xpath("//book/title");
echo $name[1]; 		// Restituisce il valore del tag 'title' del primo tag 'book'
*/



} // chiude if(file_exists

?>




<br />

 








</body>
</html>
