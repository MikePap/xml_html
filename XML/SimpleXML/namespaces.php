<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>namespaces</title>
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


<h1>SimpleXMLElement::getNamespaces</h1>
<p class="nota">Restituisce il primo namespaces usato nel documento XML</p>

<?php 

$xml = <<<XML
<?xml version="1.0" standalone="yes"?>
<people xmlns:p="http://example.org/ns" xmlns:t="http://example.org/test">
    <p:person id="1">John Doe</p:person>
    <p:person id="2">Susie Q. Public</p:person>
</people>
XML;
 
$sxe = new SimpleXMLElement($xml);

$namespaces = $sxe->getNamespaces(true);
//var_dump($namespaces);   // array(1) { ["p"]=> string(21) "http://example.org/ns" } 
//print_r ($namespaces);  //  Array ( [p] => http://example.org/ns ) 

foreach($namespaces as $mostra){
echo ($mostra);					// http://example.org/ns 
}

?>

<h1>SimpleXMLElement::getDocNamespaces</h1>
<p class="nota">Restituisce tutti i namespaces usati nel documento XML</p>

<?php 

// fa riferimento all'XML descritto sopra 
$all_namespaces = $sxe->getDocNamespaces(true);		
foreach($all_namespaces as $mostra){
echo ($mostra . "<br />" );   // http://example.org/ns 
}

echo "<br /><br />";

$xml = <<<XML
<?xml version="1.0" standalone="yes"?>
<people xmlns:p="http://example.org/ns" xmlns:t="http://example.org/test">
    <p:person t:id="1">John Doe</p:person>
    <p:person t:id="2" a:addr="123 Street" xmlns:a="http://example.org/addr">
        Susie Q. Public
    </p:person>
</people>
XML;
 
$sxe = new SimpleXMLElement($xml);

$namespaces = $sxe->getDocNamespaces(TRUE);
//var_dump($namespaces);
//print_r($namespaces);

foreach($namespaces as $mostra){
echo "$mostra <br />";   // 
}




?>









</body>
</html>
