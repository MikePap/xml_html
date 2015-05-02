<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trasformazione con xsl</title>
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

<h1>Trasformazione di XML con xsl</h1>



<?php
// read XML data
$xml = new DOMDocument;
$xml->load('allegati/review.xml');

// read XSL stylesheet data
$xsl = new DOMDocument;
$xsl->load('allegati/review.xsl');

// initialize XSLT engine
$xslp = new XSLTProcessor;			// bisogna attivare l'estensione "xsl" dal file php.ini 

// attach XSL stylesheet object
$xslp->importStyleSheet($xsl); 

// perform transformation
echo $xslp->transformToXML($xml);
?>



















</body>
</html>
