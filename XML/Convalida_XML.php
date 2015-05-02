<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Convalida di XML</title>
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


<h1>Convalida di XML rispetto a uno schema DTD o XML</h1>

<p class="nota"> Utilizzo del metodo <b>validate()</b> di DOM </p>

<?php 
// read XML data
$xml = new DOMDocument(); 
$xml->load("allegati/data-1.xml") or die("ERROR: Cannot create DOMDocument object"); 
//$xml->load("allegati/data-10.xml");// or die("ERROR: Cannot create DOMDocument object"); 
// validate XML against DTD
// result: "Valid data"
echo $xml->validate() ? "Dato valido" : "Dato invalido";

?> 

<br />
<p class="nota">Utilizzo del metodo <b>schemaValidate()</b> di DOM</p>

<?php 
// read XML data
$xml = new DOMDocument(); 
$xml->load("allegati/data-2.xml") or die("ERROR: Cannot create DOMDocument object"); 

// validate XML against XML Schema
// result: "Valid data"
echo $xml->schemaValidate("allegati/data.xsd") ? "Valid data" : "Invalid data";


?>













</body>
</html>
