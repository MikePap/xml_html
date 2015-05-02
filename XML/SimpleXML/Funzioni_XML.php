<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Funzioni XML</title>
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

<h1>simplexml_load_string</h1>
<p class="nota">Converte i dati XML in un oggetto "SimpleXML"</p>


<?php
$string = <<<XML
<?xml version='1.0'?> 
<document>
 <tit>Forty What?</tit>
 <from>Joe</from>
 <to>Jane</to>
 <body>
  I know that's the answer -- but what's the question?
 </body>
</document>
XML;

$xml = simplexml_load_string($string);
echo $xml->saveXML();  // UGUALE AL PRECEDENTE 
//print_r($xml);

?>


<h1>simplexml_load_file</h1>
<p class="nota">Permette di leggere un file esterno e di recuperarne i valori</p>

<?php
// The file test.xml contains an XML document with a root element
// and at least an element /[root]/title.

if (file_exists('../allegati/data.xml')) {
    $xml = simplexml_load_file('../allegati/data.xml');
//    print_r($xml);
//foreach ($xml->children() as $nodi) {  // Visualizza solo i valori 
//echo "$nodi <br />";
foreach ($xml->children() as $name => $data) {  // Visualizza tag e valori 
   echo "$name: $data <br />";
 } 
} else {
    exit('Failed to open data.xml.');
}
?>


<h1>simplexml_import_dom</h1>
<p class="nota">Ottiene un oggetto SimpleXMLElement da un nodo DOM di PHP</p>

<?php
$dom = new DOMDocument;
$dom->loadXML('<books><book><title>blah</title></book></books>');
if (!$dom) {
    echo 'Error while parsing the document';
    exit;
}
$s = simplexml_import_dom($dom);			// ottiene (carica) l'XML '

echo $s->book[0]->title;				// estrae il valore dell'elemento <title> dal primo elemento <book> 

?>


<h1>classe SimpleXMLElement </h1>

<p class="nota">
La classe <b>SimpleXMLElement</b> permette di gestire XML all'interno di PHP, sia esso creato all'interno dello stesso documento (vedi file <a href="addChild.php">addChild.php</a>) che ricavato da un file esterno (vedi file <a href="get_name.php">get_name.php</a>). 

</p>






</body>
</html>
