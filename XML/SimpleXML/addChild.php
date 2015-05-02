<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>addChild</title>
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

<h1>SimpleXMLElement::addChild</h1>
<p class="nota">Aggiunge un elemento figlio al nodo </p>


<dl>
	<dt><b>SimpleXMLElement::addChild</b> ( string $nome [, string $valore [, string $namespace ]] )</dt>
	<dd><b>$nome</b> è il nome del nodo da aggiungere </dd>
	<dd><b>$valore</b> (opzionale) è il valore-testo del nodo</dd>
	<dd><b>$namespace</b> (opzionale) è il namespace a cui il nodo appartiene</dd>
</dl>

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

$movie = $xml->addChild('movie');					// aggiunge l'elemento <movie> alla root <data> 
$movie->addChild('title', 'PHP2: More Parser Stories');	//qui oltre ad aggiungere l'elemento <title> a <movie> viene aggiunto anche un valore(testo) impostato nel secondo parametro
$nodi_root_data = $xml->children();					// qui si ottiene la root <data> perchè l'elemento figlio del file XML è proprio <data>   
//$jk = $xml->item[1]; 
foreach($nodi_root_data as $tag ){					// si valuta per primo <data> e poi ... 
foreach($tag->children() as $child => $valore){			// ... si scorre tra i suoi figli 
echo "$child: $valore <br />";
} // foreach
} // foreach  


?>







</body>
</html>
