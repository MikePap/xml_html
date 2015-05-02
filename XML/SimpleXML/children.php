<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Figli dell'elemento</title>
<style type="text/css">
h1{ color: #00F; font-size:24px;}
h3{ color:#663333; font-size:18px;}
dt{ color:#003399; margin-bottom:5px;}
dd{ color:#0066FF;}
.nota{ color:#FF6666;}
.codice{ color:#060}
pre, code{ color:#060;}

</style>

</head>

<body>


<h1>SimpleElement::children</h1>
<p class="nota">Ricerca i nodi di un elemento</p>

<dl>
	<dt><b>SimpleXMLElement::children</b> ([ string $ns [, bool $is_prefix = false ]] )</dt>
    	<dd><b>$ns</b> (opzionale) è un namespace XML</dd>
        <dd><b>$is_prefix</b> (opzionale). Se TRUE sarà trattato come prefisso. Se FALSE(default) come un namespace URL </dd>
</dl>


<p class="codice">
<code><pre>
$xml = <example xmlns:foo="my.foo.urn"> // 'foo="my.foo.urn"' -> è un namespace URL
  <foo:a>Apple</foo:a>  // 'foo:a' -> è un prefisso
  <foo:b>Banana</foo:b>
  <c>Cherry</c>
</example>;
</pre>
</code>

</p>


<?php
$xml = new SimpleXMLElement(
'<person>

 <child role="son">
  	<child role="daughter"/>
 </child>
 
 <child role="daughter">
  	<child role="son">
   			<child role="son"/>
    </child>
 </child>

</person>');

/*
foreach ($xml->children() as $second_gen) {
    echo ' The person begot a ' . $second_gen['role']; // si recupera il valore del primo nodo(<child>=>son) dell'elemento <person>

    foreach ($second_gen->children() as $third_gen) {
        echo ' who begot a ' . $third_gen['role'] . ';'; // si recupera il valore del secondo nodo (<child>=>daughter) dell'elemento <person>
//echo "<br />";
        foreach ($third_gen->children() as $fourth_gen) {
            echo ' and that ' . $third_gen['role'] .
                ' begot a ' . $fourth_gen['role'];
        }
    }
}
*/


$primo = $xml->child[0]['role'];							// son
$secondo = $xml->child[1]['role'];							// daughter 
echo "Il primo figlio è ".$primo." e il secondo figlio è " .$secondo;
//$daughter_figlio = $secondo->child[0]['role'];				// NON FUNZIONA
$daughter_figlio = $xml->child[1]->child[0]['role'];
echo "<br />";
echo "Il figlio di " .$secondo. " è " .$daughter_figlio;
echo "<br />";
$ultimo = $xml->child[1]->child->child['role'];
echo "Il figlio di " .$daughter_figlio. " è " . $ultimo; 

?>
<br /><br /><br /><br />

<?php

if (file_exists('../allegati/books.xml')) {
    $xml = simplexml_load_file('../allegati/books.xml');
//    print_r($xml);
foreach ($xml->children() as $nodi){			// Percorre i figli dell'elemento root "bookstore" che sono i nodi <book>
//echo "$nodi <br />";
//foreach ($nodi->children() as $data){			// Visualizza solo i valori dei figli di "bookstore" che sono i nodi "book"
//echo "$data <br />";
foreach ($nodi->children() as $name => $data){		// Visualizza tag e valori dei figli di <book> (<title> <author> <year> <price>)
echo "$name: $data <br />";
} // chiude foreach
} // chiude foreach
}else{
exit('Failed to open books.xml.');
}

?>














</body>
</html>
