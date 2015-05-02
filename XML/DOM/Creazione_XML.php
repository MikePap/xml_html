<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Creazione di XML</title>
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

<h1>Creazione di documento  XML</h1>
<p class="nota">Viene impiegata l'estensione <b>DOM</b> di PHP per creare un albero DOM dinamicamente e aggiungere nodi ad esso</p>

<dl>
	<dt>Metodi di PHP DOM utilizzati</dt>
    	<dd><b>createElement</b>: crea un elemento nodo</dd>
        <dd><b>appendChild</b>: inserisce un elemento nodo (a seguito della creazione con <b>createElement?</b></dd>
        <dd><b>createTextNode</b>: crea un text-node(un valore testo) all'interno del nodo in questione)</dd>
        <dd><b>createComment</b>: crea un commento</dd>
        <dd><b>setAttribute</b>: stabilisce un attributo per un nodo</dd>
        <dd><b>createCDATASection</b>: crea una sezione CDATA </dd>
        <dd><b>createProcessingInstruction</b>: crea un oggetto DOMProcessingInstruction</dd>
        <dd><b>save</b>: crea un file XML dal documento creato con i metodi di DOM </dd>

</dl>

<?php
// initialize DOM object
$xml = new DOMDocument("1.0");

// (add root node <recipe>
$root = $xml->createElement("list");					// crea il nodo root di nome <list>
$xml->appendChild($root);  // e lo inserisce nel DOM 

$root->setAttribute("fik", "100");

// add element <description> to root
$desc = $xml->createElement("description");				// crea un nodo di nome <descrption>
$root->appendChild($desc);							// e lo inserisce nella root <list> (viene creata una gerarchia)

// add <description> content
$desc->appendChild($xml->createTextNode("Sam's Shopping List"));	// si crea il testo per  <descrption> e glie lo si aggiunge

// add comment
$root->appendChild($xml->createComment("item list follows"));	// si crea un commento nella root e la si inserisce

// add <item> child element add quantities as attributes
$items = $xml->createElement("items");					// si crea un nodo <items>
$root->appendChild($items);							// e lo si inserisce nella root 

$item = $xml->createElement("item");					// si crea un nodo <item>
$items->appendChild($item);							// e lo si inserisce in <items> (viene creata un'altra gerarchia)
$item->appendChild($xml->createTextNode("eggs"));			// si crea un  nodo-testo per <item>
$item->setAttribute("units", 3);						// si crea un attributo per <item>
unset($item);									// non l'ho capito
// viene creato un'altro elemento come sopra 
$item = $xml->createElement("item");
$items->appendChild($item);
$item->appendChild($xml->createTextNode("salt"));
$item->setAttribute("units", "100 gm");

// add CDATA block
$items->appendChild($xml->createCDATASection("You can't make an omelette without <b>breaking eggs</b>"));	// si crea un blocco CDATA e lo si inserisce in <items> 
// add PI
$root->appendChild($xml->createProcessingInstruction("xml-dummy-pi", "shop('now')"));

// display final tree as HTML...
$xml->formatOutput = true;
echo "<xmp>" . $xml->saveXML() . "</xmp>";	// visualizza l'XML interamente con tutti i tags 
//echo $xml->saveXML();					// visualizza solo i valori dei tags (la parte testo)

// ...or write it to a file as XML
$xml->save("list.xml") or die("ERROR: Could not write to file");			// crea il file XML "list.xml" nella stessa directory 
//$xml->save("allegati_DOM/list.xml") or die("ERROR: Could not write to file");		// crea il file XML in un'altra cartella 

?>


<!--

http://localhost/xml_html/XML/DOM/list.xml

http://www.abcoliodoliva.com/Annunci/create_sitemapAnnunci.php

-->




















</body>
</html>
