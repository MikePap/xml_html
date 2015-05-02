<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>Lettore RSS </title>
<style type="text/css">

</style>
</head>
<body>

<?php

//$xml = simplexml_load_file("http://www.abcoliodoliva.com/News_abc/Feed_RSS.php") 
$xml = simplexml_load_file("http://feeds.punto-informatico.it/c/32288/f/438866/index.rss") 
or die("Errore: non è possibile creare un oggetto simpleXML");
	
echo "Channel: " . $xml->channel->title . "<br />";
echo "Descrizione: " . $xml->channel->description . "<br />";
echo "<br />";

$count = 1;
foreach($xml->channel->item as $item ){
echo "$count) " . strtoupper($item->title) . "<br />";
echo "URL: <a href=>" . $item->link . "'>" . $item->link . "</a><br /><br />";
//echo substr(strip_tags($item->description), 0, 200) . " ... <br /><br />";
echo substr($item->description, 0, 200) . " ... <br /><br />";

$count++;
} // foreach 

//http://feeds.feedburner.com/beppegrillo/atom
// http://localhost/xml_html/XML/DOM/%3Ehttp://www.abcoliodoliva.com/News_abc/box_news.php?news=220

?>





</body>
</html>
