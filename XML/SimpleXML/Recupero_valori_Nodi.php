<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recupero valori</title>
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


<h1>Recupero di valori di nodi e attributi</h1>
<p class="nota"><strong>simplexml_load_string</strong> converte i dati XML in un oggetto "SimpleXML"</p>


<?php
// define XML data string
$xmlData = <<< END
<?xml version="1.0"?>
<data>
    <color red="128" green="0" blue="128">purple</color>
</data>
END;

// read XML data string
$xml = simplexml_load_string($xmlData) or die("ERROR: Cannot create SimpleXML object");

// read attribute values
$hexColor = sprintf("#%02x%02x%02x", $xml->color['red'], $xml->color['green'], $xml->color['blue']);

// read node data
// result: "The color purple is #800080 in hexadecimal"
echo "The color " . $xml->color . " is " . $hexColor . " in hexadecimal";
?>


<br />
<p class="nota">Se sono presenti più elementi con lo stesso nome possono essere recuperati con un ciclo "foreach" come se fosse un array</p>

<?php
// create XML data string
$xmlData =<<< END
<?xml version="1.0"?>
<collection>
    <color>red</color>
    <color>blue</color>
    <color>green</color>
    <color>yellow</color>
</collection>
END;
// read XML data
$xml = simplexml_load_string($xmlData) or die("ERROR: Cannot create SimpleXML object");
foreach ($xml->color as $color) {  // result: "red blue green yellow"
    echo "$color <br />";
}

?>
<p class="nota">In alternativa se non si conosce il nome dell'elemento si può utilizzare il metodo <strong>children()</strong> per scorrere in tutti i figli di un nodo</p>

<?php
// create XML data string
$xmlData =<<< END
<?xml version="1.0"?>
<collection>
	<color>red</color>
	<color>blue</color>
	<color>green</color>
	<color>yellow</color>
	<diverso>melone</diverso>	
	<diverso>cocomero</diverso>
</collection>
END;

// read XML data
$xml = simplexml_load_string($xmlData) or die("ERROR: Cannot create SimpleXML object");

// in questo modo estrae solo il valore del primo elemento <diverso> (melone)
$diverso = $xml->diverso;		
echo $diverso. "<br />";

// Mentre per recuperare il valore di più elementi aventi lo stesso nome c'è bisogno di un ciclo 'foreach'  
foreach ($xml->children() as $name => $data) {
echo "<b>$name</b>: $data ";					// result: "color: red color: blue color: green color: yellow "
} // foreach


?>

<br />
<p class="nota">Si può inoltre recuperare gli attributi di un nodo con il metodo <strong>attributes()</strong></p>

<?php
// define XML data string
$xmlData = <<< END
<?xml version="1.0"?>
<data>
    <elemento shape="rectangle" height="10" width="5" length="7" />
</data>
END;

// read XML data string
$xml = simplexml_load_string($xmlData) or die("ERROR: Cannot create SimpleXML object");

// Estrazione del valore di un solo attributo passato al metodo "attributes()" 
$unosolo = $xml->elemento->attributes()->shape;			// restituisce "rectangle" che è il valore dell'attributo 'shape' 
echo $unosolo. "<br />";

foreach ($xml->elemento->attributes() as $name => $data){
echo "$name: $data; ";			// result: "shape: rectangle; height: 10; width: 5; length: 7; "
} // foreach 

?>

<br />
<p class="nota">In questo esempio si recuperano i nodi dell'elemento "document" in un array </p>

<?php
$string = <<<XML
<?xml version='1.0'?> 
<document>
 <title>Forty What?</title>
 <from>Joe</from>
 <to>Jane</to>
 <body>
  I know that's the answer -- but what's the question?
 </body>
</document>
XML;

$xml = simplexml_load_string($string);
//print_r($xml);

//foreach ($xml->children() as $nodi) {  // Visualizza solo i valori 
//echo "$nodi <br />";
foreach ($xml->children() as $name => $data) {  // Visualizza tag e valori 
    echo "$name: $data <br />";
} // foreach 

?>







</body>
</html>
