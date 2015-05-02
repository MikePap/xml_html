<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>registerXPathNamespace</title>
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

<h1>SimpleXMLElement::registerXPathNamespace</h1>
<p class="nota">Crea un prefisso per un contesto di una ricerca con <b>xpath</b></p>

<dl>
	<dt>public bool <b>SimpleXMLElement::registerXPathNamespace</b>( string $prefix , string $ns )</dt>
    	<dd><b>$prefix</b> è il nome del prefisso da usare in una query <b>xpath</b> per il <b>namespace $ns</b> </dd>
        <dd><b>$ns</b> è il namespace a cui si fa riferimento con la query <b>xpath</b>. Deve far riferimento ad un namespace usato nel documento </dd>
</dl>
<?php

$xml = <<<EOD
<book xmlns:chap="http://example.org/chapter-title">
    <title>My Book</title>
    <chapter id="1">
        <chap:title>Chapter 1</chap:title>
        <para>Donec velit. Nullam eget tellus vitae tortor gravida scelerisque. 
            In orci lorem, cursus imperdiet, ultricies non, hendrerit et, orci. 
            Nulla facilisi. Nullam velit nisl, laoreet id, condimentum ut, 
            ultricies id, mauris.</para>
    </chapter>
    <chapter id="2">
        <chap:title>Chapter 2</chap:title>
        <para>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin 
            gravida. Phasellus tincidunt massa vel urna. Proin adipiscing quam 
            vitae odio. Sed dictum. Ut tincidunt lorem ac lorem. Duis eros 
            tellus, pharetra id, faucibus eu, dapibus dictum, odio.</para>
    </chapter>
</book>
EOD;

$sxe = new SimpleXMLElement($xml);

$sxe->registerXPathNamespace('c', 'http://example.org/chapter-title'); // crea il prefisso "c" del namespace impostato nel secondo parametro
$result = $sxe->xpath('//c:title');  // ricerca all'interno del documento il 'title' che ha come prefisso quello precedentemente creato

foreach ($result as $title) {
  echo $title . "\n";  // restituisce i valori di 'title' con prefisso 'c'
}



?>














</body>
</html>
