<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modifica valori</title>
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

<h1>Modifica i valori di un nodo o di un attributo in un file XML esterno</h1>

<p class="nota">Il metodo <strong>simplexml_load_file()</strong> permette di leggere in un file.xml esterno. L'oggetto creato con tale metodo ci permette di modificare i valori dei nodi o dei suoi attributi e con il metodo <strong>asXML()</strong> inserito all'interno della funzione <strong>file_put_contents</strong> inseriamo i valori modificati. <br />
</p>

<?php

// read XML tree
$xml = simplexml_load_file("../allegati/data.xml") or die("ERROR: Cannot create SimpleXML object");

//$xml->weight = 8000;			// modifica il valore del nodo <weight>
$xml->weight[0] = 8000;			// modifica il valore del primo nodo <weight>

// modifica il valore dell'attributo <weight units=>
$xml->weight['units'] = "gmk";

// Riscrive il nuovi valori modificati   (write modified tree back to file as XML string) 
file_put_contents("../allegati/data.xml", $xml->asXML()) or die("ERROR: Could not write to file");
echo "XML file successfully updated <br />";
######### IN UBUNTU PER FAR QUESTA MODIFICA HO DOVUTO DARE I PERMESSI DI SCRITTURA AI FILE ALL'INTERNO DELLA CARTELLA -> chmod -R  777   /var/www/XML_book-purple/
 
// Lettura dei nuovi valori modificati del file data.xml 
if (file_exists('../allegati/data.xml')) {
    $xml = simplexml_load_file('../allegati/data.xml');
//    print_r($xml);
foreach ($xml->children() as $name => $data){			// Visualizza tag e valori 
foreach ($xml->$name->attributes() as $attr => $jk ){		// Visualizza l'atributo ed il suo valore
echo "$attr: $jk <br />";
} // chiude foreach  
echo "$name: $data <br />";
} // chiude foreach  
} else {
exit('Failed to open data.xml.');
} // else 


?>


















</body>
</html>
