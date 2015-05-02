<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>Input url </title>
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

<h1>Input type:url  </h1>

<p class="nota">
Valuta <q>true</q> se l'url inserito abbia <q>http://</q> oppure <q>https://</q>   
</p>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

Add your homepage: <input type="url" name="homepage"><br>

<input type="submit" name="sub"  value="Invia"/>
</form>

<?php

if(isset($_POST['sub'])){

$jk = $_POST['homepage']; 

echo $jk;


//$jk = $_POST['']; 
}; //  if(isset($_POST['sub'])){

?>


