<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Elaborazione di XML</title>
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

<h1>Elaborazione di dati XML con funzione ricorsiva</h1>

<?php
// create XML data string
$xmlData =<<< END
<?xml version="1.0"?>
<movie>
    <title>The Matrix</title>
    <credits>
        <actor>
            <name>Keanu Reeves</name>
            <character>Neo</character>
        </actor>
        <actor>
            <name>Laurence Fishburne</name>    
            <character>Morpheus</character>
        </actor>
        <actor>
            <name>Carrie-Anne Moss</name>    
            <character>Trinity</character>
        </actor>
        <director>
            <name>Andy Wachowski</name>
        </director>
        <director>
            <name>Larry Wachowski</name>
        </director>
    </credits>
    <year>1999</year>
    <duration units="min">120</duration>
</movie>
END;

// read XML data
$xml = simplexml_load_string($xmlData) or die("ERROR: Cannot create SimpleXML object");

// function to recursively iterate over XML tree
function xmlTraverse($node){
foreach ($node->children() as $name => $data) {
if (trim($data) != "") {
echo "$name: [$data, " . strlen($data) . "]\n";
} // if
xmlTraverse($data);
} // foreach
} // chiude la funzione  

xmlTraverse($xml);

echo "<p class='nota'>Altro esempio con l'iteratore <b>new RecursiveIteratorIterator()</b> della libreria Standard PHP (<b>SPL</b>)</p>";


// read XML data
$xml02 = simplexml_load_string($xmlData, "SimpleXMLIterator") or die("ERROR: Cannot create SimpleXML object");

// recursively iterate over XML tree
foreach(new RecursiveIteratorIterator($xml02, true) as $name => $data){
if (trim($data) != ""){
echo "$name: [$data, " . strlen($data) . "]\n";
} // if 
} // foreach 

?>

<br />
<p class="nota">Altrimenti si può avere lo stesso risultato con due cilci "foreach"</p>

<?php 

$xml03 = simplexml_load_file("../../catalogoMusicale.xml") or die("ERROR: Cannot create SimpleXML object");
/*
function mostra_nodi($node) {
foreach ($node->children() as $name => $data) {
if (trim($data) != "") {
echo "$name: $data <br />";
 } // 
mostra_nodi($data);			// richiama se stessa per l'iterazione 
 } // chiude foreach
} // chiude funzione 

mostra_nodi($xml03);
*/


###### La funzione di cui sopra può essere sostituita con due foreach #############
foreach($xml03->children() as $primotag => $figli_primo_tag){  // si scorre fra i primi tag principali dell'albero per recuperarne i figli()
//foreach($xml2->children() as $figli_primo_tag){  // E' uguale alla prima 
foreach($figli_primo_tag->children() as $tag => $valore){ // si scorre nella seconda serie di tag(secondari figli dei primi)
echo "$tag: $valore <br />";
}
//echo "$tag: $valori <br />";
} // foreach  


?>




</body>
</html>
