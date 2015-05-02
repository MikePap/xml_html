<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Filtraggio di nodi</title>
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

<h1>Filtraggio di nodi XML</h1>

<p class="nota">Si utilizza il metodo <strong>xpath()</strong> di SimpleXML</p>


<?php
$xmlData =<<< END
<?xml version="1.0"?>
<data>
    <item>
        <id>20</id>
        <name>mangoes</name>
        <price>11</price>
    </item>
    <item>
        <id>22</id>
        <name>strawberries</name>
        <price>5</price>
    </item>
    <item>
        <id>23</id>
        <name>grapes</name>
        <price>25</price>
    </item>
</data>
END;

// read XML data
$xml = simplexml_load_string($xmlData) or die("ERROR: Cannot create SimpleXML object");
// create a custom collection of <name> nodes
// using an XPath query
foreach ($xml->xpath('//name') as $name) {  
    echo "$name - ";                      // result: "mangoes strawberries grapes "
} // foreach 

/*
$pop = $xml->xpath('//name'); // FUNZIONA 
echo $pop[1]; // result: strawberries
*/

?>

<br />
<p class="nota">Altro esempio con il costrutto <b>SimpleXMLElement</b> </p>


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
</a>
XML;

$xml = new SimpleXMLElement($string);
/* Search for <a><b><c> */
$result = $xml->xpath('/a/b/c');
while(list( , $node) = each($result)) {
    echo '/a/b/c: ',$node,"\n";
} // while
echo "<br />";
/* Relative paths also work... */
$result = $xml->xpath('b/c');
while(list( , $node) = each($result)) {
    echo 'b/c: ',$node,"\n";
} // while 

?>




















</body>
</html>
