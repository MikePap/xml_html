<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recupero più valori</title>
<style type="text/css">
h1{ color:#006600;}
h3{ color:#663333;}
dt{ color:#003399; margin-bottom:5px;}
dd{ color:#0066FF;}
.nota{ color:#FF6666;}
.codice{ color:#060}

</style>

</head>

<body>



<?php
// The file test.xml contains an XML document with a root element
// and at least an element /[root]/title.

//$xml = simplexml_load_file('allegati/books.xml');
include 'allegati/books.xml';
$xml = new SimpleXMLElement();		// "$xmlstr" è la variabile che contiene XML nel file "example.php"

foreach ($xml->children() as $nodi){			// ottiene la root <bookstore>
//echo "$nodi <br />";
foreach ($nodi->children() as $name => $data){		// 
echo "$name: $data <br />";
} // 2° foreach  
} // 3° foreach



?>









</body>
</html>
