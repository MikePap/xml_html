<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>prova  </title>
<style type="text/css">

</style>
<script type="text/javascript"  src="../../../jQuery-1.6.min.js"> </script>

</head>
<body>



<script  type="text/javascript">
$(document).ready(function(){

indirizzo = "cuki.php";
var kk = "Mikele";

$('#crea_cookie').click(function(){
/*
$.get(indirizzo, {cok:kk }, function(data){  
$("#divo").html(data);
}); // get  
*/
$.get(indirizzo, {creacookie:kk }  );
}); // click 


$('#elimina_cookie').click(function(){
$.get(indirizzo, {elimina:kk}  );

}); // click 



}); // chiude ready 
</script>


<button id="crea_cookie">Imposta cookie</button>  &nbsp;&nbsp; <button id="elimina_cookie">Elimina cookie</button>

<div id="divo"></div>



<?php 

if(isset($_COOKIE['MioNome'])){

$gimmi = $_COOKIE['MioNome'];
echo $gimmi;
}; 


?>















</body>
</html>
