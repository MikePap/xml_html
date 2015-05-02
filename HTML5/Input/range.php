<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>Input range </title>
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

<h1>Input type:range  </h1>

<p class="nota">Nell'esempio sono stati inseriti tutti e quattro gli attributi: <b>min - max - step - value </b>. <br />
<q>step</q> rappresenta l'intervallaggio e <q>value</q> è il valore di default rappresentato nella lunghezza della barra. 
</p>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

Points: <input type="range" name="points" min="1" max="100" step="10" value="20">

<input type="submit" name="sub"  value="Invia"/>
</form>

<?php

if(isset($_POST['sub'])){

$jk = $_POST['points']; 

echo $jk;


//$jk = $_POST['']; 
}; //  if(isset($_POST['sub'])){

?>


