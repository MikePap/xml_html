<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>prova  </title>
<style type="text/css">

</style>
</head>
<body>

<table>
<?php

$books = array(
array("title"=>"Everyday Italian", "autore"=>"Giada De Laurentiis", "year"=>"2005", "price"=>"30.00"),
array("title"=>"Harry Potter", "autore"=>"J K. Rowling", "year"=>"2005", "price"=>"29.90")
//array("stella", "sole", "ruota", "fiore", "macchia"),		// questo è $shapes [0][1]
//array(50, 100, 25, 125, 150),						// questo è $shapes [0][1]
); // array  

/*
for($a =0 ; $a <count($books[0]); $a++){		// si itera l'array $shapes[0]
  $titolo1 = $books[0][$a];				// raccoglie i valori del primo array all'interno di $shapes[0] 
  $titolo2 = $books[1][$a];				// raccoglie i valori del secondo array all'interno di $shapes[0] 
echo("<tr><td>$titolo1</td><td>$titolo2</td></tr>");
} // chiude for
*/
/*
for($a=0; $a< count($books[0]); $a++ ){
echo $books[0][$a]. " ";
} // for 
*/

/*
ksort($books[0]);	
ksort($books[1]);

foreach($books[0] as $a=>$b){
echo "$a:$b - ";
} // foreach

echo "<br />";

foreach($books[1] as $a=>$b){
echo "$a:$b - ";
} // foreach
*/

/*
//foreach($books as $libri){
foreach($libri as $a=>$b){
echo "$a:$b<br />";
} // foreach
} // foreach
*/

?>
</table>



<?php

if (file_exists('../allegati/books.xml')) {
$xml = simplexml_load_file('../allegati/books.xml');	
/*
//$jk = $xml->book[0]->title[0];
$jk = $xml->book->title;
//ksort($jk);
foreach($jk as $j){  
echo $j;
}
*/

foreach ($xml->children() as $name ){			// 
//foreach($name as $a=>$b){
foreach($name as $a){
//echo "$a:$b <br />";
echo "$a <br />"; 
}
}
}else{
exit('Failed to open books.xml.');
}



?>



<!--
http://localhost/xml_html/XML/SimpleXML/prova.php
-->



</body>
</html>
