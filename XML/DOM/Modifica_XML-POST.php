<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>Creazione xml con POST  </title>
<style type="text/css">
body{  font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;}

h1{ color: #00F;}
h3{ color:#663333;}
dt{ color:#003399; margin-bottom:5px;}
dd{ color:#0066FF;}
.nota{ color:#FF6666;}
.codice{ color:#060}

</style>
</head>
<body>

<h1>Modifica di file XML mediante modulo con POST </h1>

<p class="nota">
I dati inseriti nel form andranno a popolare il file <q>results.xml</q> aggiornandolo.
</p>

<?php
// Funzione che restituisce il primo <field> (fra i tre esistenti) dell'ultimo <record> di <resultset> da inserire nel campo "ID" del form  
function ultimo_id(){ 
if (file_exists('results.xml')) {
$xml = simplexml_load_file('results.xml');
//foreach($xml->xpath("//resultset/record[last()]/field[0]") as $name){			// NON FUNZIONA
foreach($xml->xpath("//resultset/record[last()]/field[last()-2]") as $name){	
echo $name + 1;
//return $name;
}// chiude foreach
} // if (file_exists('result.xml')) { 
} // chiude la funzione ultimo_id()

//ultimo_id();

?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
ID <input type="text"  name="iddi" size="3" maxlength="3" 
value="<?php ultimo_id() ?>" /> <br />
Categoria <input type="text"  name="categoria" size="31" maxlength="50" value="<?php echo $_POST['categoria']; ?>" />  <br />
Evento <textarea name="evento" rows="8" cols="31"> <?php echo $_POST['evento'] ?> </textarea>  <br />

<input type="submit" name="sub" size="" maxlength="" value="Invia"/>
</form>

<?php

if(isset($_POST['sub'])){

$iddi = $_POST['iddi'];
$categoria = $_POST['categoria'];
$evento = $_POST['evento'];

$doc = new DOMDocument;
$doc->load('results.xml');
$doc->preserveWhiteSpace = false;		// Non utilizzando questo metodo dopo aver rimosso il/i nodi gli spazi vuoti rimarebbero

$parent = $doc->documentElement;		// root 

$record = $doc->createElement('record');
$parent->appendChild($record);
$campo1 = $doc->createElement('field');
$campo2 = $doc->createElement('field');
$campo3 = $doc->createElement('field');

$campo1->appendChild($doc->createTextNode($iddi)); 
$record->appendChild($campo1);
$campo2->appendChild($doc->createTextNode($evento));
$record->appendChild($campo2);
$campo3->appendChild($doc->createTextNode($categoria));
$record->appendChild($campo3);

if($doc->save("results.xml")){ 
echo "<p class='nota'>I dati sono stati inseriti</p>";
}else{
die("ERROR: Could not write to file"); 
}
//$doc->save("results.xml") or die("ERROR: Could not write to file");  // utilizzando il metodo 'save' non fa altro che riscrivere il file esistente con le modifiche apportate (in pratica lo sostituisce) 

//echo $doc->saveXML();	


} // if(isset($_POST['sub'])){



?>


<!--
Non se ne può più. Anche gli agricoltori scendono sul campo di battaglia. Caro benzina, IMU, aumento materie prime sono ormai diventati insostenibili. Un esercito di coltivatori diretti è arrivato da tutta Italia per una manifestazione generale. Armati di pale, forconi e ... 
-->



</body>
</html>
