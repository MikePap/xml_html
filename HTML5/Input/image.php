<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>Input  image</title>
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

<h1>Input type:image  </h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

First name: <input type="text" name="fname"><br>
Last name: <input type="text" name="lname"><br>
<input type="image" src="../img/frecciaAv.png" alt="Submit" width="48" height="48">

</form>

<?php

//if(isset($_POST['Submit'])){	// NON FUNZIONA COSI 

$nome = $_POST['fname']; 
$cognome = $_POST['lname']; 

echo "$nome - $cognome";


//$jk = $_POST['']; 
//}; //  if(isset($_POST['sub'])){

?>


