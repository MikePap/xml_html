<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Filtraggio nodi con Namespace</title>
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



<h1>Filtraggio di nodi XML per namespace</h1>

<p class="nota">Utilizzando il metodo <b>children</b> di SimpleXML con URI (Universal Resource Identifier, Identificatore di Risorse Universale) </p>

<?php
// define XML data string
// containing namespaces
$xmlData = <<< END
<?xml version="1.0"?>
<data xmlns:home="http://www.some.domain/xmlns/home" xmlns:work="http://www.some.domain/xmlns/work">
    <home:file>music.txt</home:file>
    <work:file>accounts.dat</work:file>
    <work:file>inbox.mbx</work:file>
    <home:file>expenses.xls</home:file>
    <home:file>addressbook.doc</home:file>
</data>
END;

// read XML data
$xml = simplexml_load_string($xmlData);

// process nodes in "work" namespace -> result: "accounts.dat inbox.mbx " 
foreach ($xml->children("http://www.some.domain/xmlns/work") as $file) {  

// process nodes in "file" namespace result -> music.txt expenses.xls addressbook.doc
//foreach ($xml->children("http://www.some.domain/xmlns/home") as $file){    
echo "$file - ";
} // foreach 

?>


















</body>
</html>
