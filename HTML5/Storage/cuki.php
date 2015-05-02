<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>prova cookie  </title>
<style type="text/css">

</style>
</head>
<body>


<?php 


if(isset($_GET['creacookie'])){
$cuki =  $_GET['creacookie'];		// creacookie: Mikele

setcookie("MioNome", $cuki, time()+3600);

} // if(isset($_GET['creacookie'])){



if(isset($_GET['elimina'])){
$cuki = $_GET['elimina'];

setcookie("MioNome", $cuki, time()-3600);		// eleminazione cookie 
// setcookie("MioNome", $cuki, time());		// anche in questo modo si elimina il cookie 

} // if(isset($_GET['elimina'])){


?>



</body>
</html>
