<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>xpath</title>
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

<h1>SimpleXMLElement::xpath</h1>

<p class="nota">Filtraggio di nodi XML (Esegue una specie di query all'interno dell'XML)</p>


<?php
$xmlData =<<< END
<?xml version="1.0"?>
<data>
    <item>
        <id>20</id>
        <name>mangoes</name>
        <price>11</price>
    </item>
    <item>
        <id>22</id>
        <name>strawberries</name>
        <price>5</price>
    </item>
    <item>
        <id>23</id>
        <name>grapes</name>
        <price>25</price>
    </item>
</data>
END;

// read XML data
$xml = simplexml_load_string($xmlData) or die("ERROR: Cannot create SimpleXML object");

// create a custom collection of <name> nodes
// using an XPath query

foreach ($xml->xpath('//name') as $name){		// estrae tutti i valori dei tag <name>   
echo "$name - ";						// result: "mangoes strawberries grapes "
}

/*
$pop = $xml->xpath('//name'); // FUNZIONA 
echo $pop[1]; // result: strawberries
*/

?>

<br />
<p class="nota">Altro esmpio con il costrutto <b>SimpleXMLElement</b> </p>


<?php
$string = <<<XML
<a>
 <b>
  <c>text</c>
  <c>stuff</c>
 </b>
 <d>
  <c>code</c>
 </d>
</a>
XML;

$xml = new SimpleXMLElement($string);

/* Search for <a><b><c> */
$result = $xml->xpath('/a/b/c');

while(list( , $node) = each($result)) {
    echo '/a/b/c: ',$node,"\n";
}

echo "<br />";

/* Relative paths also work... */
$result = $xml->xpath('b/c');

while(list( , $node) = each($result)) {
    echo 'b/c: ',$node,"\n";
}
?>

<br /><br />
qw
<br /><br />

<?php

//$xml->simplexml_load_file("allegati/books.xml") ; // carica l'XML 
if (file_exists('../allegati/books.xml')) {
$xml = simplexml_load_file('../allegati/books.xml');

//$libro = $xml->book;  //["category"]; //== 'CHILDREN'){

foreach ($xml->xpath(" /bookstore/book/price/text() ") as $name) {	// Restituisce tutti i valori di <price> di ogni <book> presente in <bookstore>
//foreach ($xml->xpath("//book[@category='CHILDREN']") as $name) {  // Non da risultato perchè 'book' contiene solo elementi e non valori
//foreach ($xml->xpath("//title"  as $name) {  // Restituisce tutti i valori dei tag 'title'
//foreach ($xml->xpath("//book[@category='CHILDREN']/author") as $name) {  // Restituisce i valori dei tag 'author' di 'book' con attributo 'category'='CHILDREN'
//foreach ($xml->xpath("//book[@category='WEB']/author") as $name) {  // come sopra
//foreach ($xml->xpath("//book/author") as $name) {  // Restituisce i valori dei tag 'author' che stanno in 'book'
//foreach ($xml->xpath("//title[@lang]") as $name) {  // Restituisce tutti i valori dei tag 'title' che hanno l'attributo 'lang'
//foreach ($xml->xpath("//title[@lang='it']") as $name) {  // Restituisce tutti i valori dei tag 'title' che hanno l'attributo 'lang' uguale a 'it'
//foreach ($xml->xpath("//book[@category='CHILDREN']/title") as $name) {
//foreach ($xml->xpath("//bookstore/book[1]/title") as $name) {  //  UGUALE AL SUCCESSIVO
//foreach ($xml->xpath("//book[1]/title") as $name) {  // Restituisce il valore del tag 'title' del primo tag 'book' (vedere anche riga 127-128)
//foreach ($xml->xpath("/bookstore/book[price>35.00]/price") as $name) {	// Restituisce i valori di <price> che stanno in <book> che hanno un valore maggiore di '35.00'
//foreach ($xml->xpath("/bookstore/book[price>35.00]/title") as $name) {	// Restituisce i valori di <title> di <book> in cui i <price> hanno un valore maggiore di 35.00 
//foreach ($xml->xpath("//book[1]/title | //book[1]/author | //book[1]/year") as $name){ // Restituisce i valori dei tag (title-author-year) che stanno nel primo tag 'book' 
//foreach($xml->xpath("/bookstore/book[position()<3]/title") as $name){	// Restituisce il valore di <title> dei primi due <book> 
//echo "$name - ";
//foreach($xml->xpath($last_book."/title") as $name){ 
//foreach($xml->xpath("//bookstore/book[last()]/title") as $name){	// Restituisce il valore di <title> dell'ultimo <book>
//foreach($xml->xpath("//bookstore/book[last()-1]/title") as $name){	// Restituisce il valore di <title> del penultimo <book>

echo "<span class='arancia'>$name</span> <br />";
}// chiude foreach

/*
//$name = $xml->xpath("//bookstore/book/title"); // UGUALE AL SUCCESSIVO
$name = $xml->xpath("//book/title");
echo $name[1]; 		// Restituisce il valore del tag 'title' del primo tag 'book'
*/
} // chiude if (file_exists ... 

/////////////////////////////////


?>

<br /><br />


<p class="codice">Per un'ulteriore approfondimento della sintassi dell'<b>xpath</b>:  <a href="http://www.w3schools.com/xpath/xpath_syntax.asp">w3schools</a></p>


<?php


?>

<ul>

<script type="text/javascript">
/*
for ($x in doc("../allegati/books.xml")/bookstore/book){ 
order by $x/title
return $x/title
}
*/

for ( $x in (1 to 5)){ 
document.write($x[1]); 
}

</script>

</ul>



</body>
</html>
