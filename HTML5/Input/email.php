<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>Input  email</title>
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

<h1>Input type: email</h1>

<p>Inserire un indirizzo email sbagliato per vedere la risposta del browser</p>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

E-mail: <input type="email" name="usremail">

<input type="submit" name="sub"  value="Invia"/>
</form>

<?php

if(isset($_POST['sub']) ){

$jk = $_POST['usremail']; 

echo $jk;


//$jk = $_POST['']; 
}; //  if(isset($_POST['sub'])){

?>


