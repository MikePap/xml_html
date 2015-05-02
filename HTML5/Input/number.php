<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>Input number </title>
<style type="text/css">
h1{ color: #00F; font-size:24px;}
h3{ color:#663333; font-size:18px;}
dt{ color:#003399; margin-bottom:5px;}
dd{ color:#0066FF;}
.nota{ color:#FF6666;}
.codice{ color:#060}

.rosso{ color:#993300; }
.blu{ color:#0066FF; }

</style>
</head>
<body>

<h1>Input type:number  </h1>

<p>Provare ad inserire un numero maggiore o minore di quelli richiesti</p>
<p class="nota">Nell'esempio sono stati inseriti tutti e quattro gli attributi: <b>min - max - step - value </b>. <br />
<q>step</q> rappresenta l'intervallaggio e <q>value</q> rappresenta il valore di default. 
</p>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

Quantity (fra 5 e 50 ad intervalli di 5): <input type="number" name="quantity" min="5" max="50" step="5" value="10">

<input type="submit" name="sub"  value="Invia"/>
</form>

<?php

if(isset($_POST['sub'])){

$jk = $_POST['quantity']; 

echo $jk;


//$jk = $_POST['']; 
}; //  if(isset($_POST['sub'])){

?>


