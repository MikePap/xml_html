<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recupero valori da file</title>
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

<h1>Recupero valori da un'altro file </h1>

<p class="nota">Il metodo <strong>simplexml_load_file()</strong> permette di leggere un file esterno e di recuperarne i valori</p>

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








</body>
</html>
