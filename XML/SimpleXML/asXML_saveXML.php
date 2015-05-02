<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>asXML & saveXML</title>
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

<h1>SimpleXMLElement::asXML  e  SimpleXMLElement::saveXML</h1>

<p class="nota"> asXML & saveXML sono simili</p>
<p class="codice">Nel file "Modifica_Valori_File.php" c'è un esempio sull'uso di <b>asXML</b></p>

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
 <again>
 	 meto 
 </again>
</a>
XML;

$xml = new SimpleXMLElement($string);

//echo $xml->asXML();  // UGUALE AL SUCCESSIVO
echo $xml->saveXML();  // UGUALE AL PRECEDENTE 




?>

<br />



</body>
</html>
