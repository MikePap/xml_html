<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Attributi</title>
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

<h1>SimpleXMLElement::attributes e SimpleXMLElement::addAttribute</h1>

<h3>Esempio di aggiunta di attributi e successivo recupero</h3>

<?php
$string = <<<XML
<a>
 <foo name="one" game="lonely">1</foo>
 <foo name="due" game="doppio">2</foo>
</a>
XML;

$xml = simplexml_load_string($string);

$xml->foo[0]->addAttribute('tipo', 'strano');			// aggiunge un attributo (nome=valore) al primo nodo "foo"
//$xml->foo[1]->addAttribute('tipi', 'brillanti');


foreach($xml->foo[0]->attributes() as $a => $b){	// si scorre fra gli attributi del primo elemento <foo>	 		
//foreach($xml->foo[1]->attributes() as $a => $b){	// name="due" game="doppio" 
echo $a,'="',$b,"\"\n";						// 
//echo $a.'="'.$b."\"\n";
} // foreach 

?>

<br />
<h3> Esempio di un listato che mostra sia il valore che l'attributo di un elemento </h3>


<?php


$xml = new SimpleXMLElement('

<data>
   <item ID="30001">
      <Company>Navarro Corp.</Company>
   </item>
   <item ID="30002">
      <Company>Performant Systems</Company>
   </item>
   <item ID="30003">
      <Company>Digital Showcase</Company>
   </item>
</data> ');


//$xml->addAttribute('type', 'stars');

foreach ($xml->children() as $node) {
        $arr = $node->attributes();			// return un array
        print ("ID=".$arr["ID"]);			// ottiene il valore dell'attributo 'ID' 
        print ("  Company=".$node->Company);	// ottiene il valore del nodo <Company> 
        print ("<p><hr>");
}


?>

<br /><br />









</body>
</html>
