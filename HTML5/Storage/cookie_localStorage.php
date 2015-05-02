<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>cookie e localStorage  </title>
<style type="text/css">
h1{ color: #00F; font-size:24px;}
h3{ color:#663333; font-size:18px;}
dt{ color:#003399; margin-bottom:5px;}
dd{ color:#0066FF;}
.nota{ color:#F66;}
.codice{ color:#060}

#crea_cookie, #crea_localStorage{ display:none; }

</style>
<script type="text/javascript" src="../../../jQuery-1.6.min.js"> </script>
<!-- <script type="text/javascript" src="../Modernizr_v2.0.js"> </script> collegamneto locale al file -->
<script type="text/javascript" src="http://www.modernizr.com/downloads/modernizr-2.0.js"> </script>

</head>
<body>

<h1>Creazione di <q>localStorage</q> o di <q>cookie</q> (in alternativa) </h1>

<p class="nota">
I pulsanti relativi alla creazione del <b>localStorage</b> o del <b>cookie</b> sono visualizzati alternativamente a seconda se il metodo <b>localStorage</b> è supportato. <br />
Per vedere il risultato della creazione o eliminazione dei valori del <b>localStorage</b> e del <b>cookie</b> dopo aver cliccato sui relativi pulsanti  bisogna aggiornare la pagina. 
</p>


<script  type="text/javascript">
jQuery(document).ready(function(){

if(Modernizr.localstorage){		// se 'localStorage' è supportato ... 
$('#crea_localStorage').css('display', 'block');		// visualizzazione del pulsante per creare il 'localStorage' 

$('#crea_localStorage').click(function(){				// al click sul pulsante '#crea_localStorage' 
localStorage.MioNome = "Michele";					// si imposta chiave e valore del 'localStorage'  
}); // click 
$('#divo').text(localStorage.MioNome);				// si visualizza il valore di 'localStorage' nel <div>

}else{					// ... altrimenti si crea un cookie con php

$("#crea_cookie").css('display', 'block');		// si rende visibile il pulsante per creare il 'cookie'
indirizzo = "cuki.php";						// file a cui inviare la variabile per la creazione del cookie
var kk = "Mikele";						// valore della variabile che sarà il valore del cookie 
$('#crea_cookie').click(function(){
$.get(indirizzo, {creacookie:kk }  );			// invio della variabile 'creacookie' al file .php per la creazione del cookie
}); // click 
} // else 

/////////////////

/// Funzione che elimina il 'cookie' o il 'localStorage'
$('#elimina').click(function(){
indirizzo = "cuki.php";
var kk = "Mikele";
$.get(indirizzo, {elimina:kk} );		// invia la variabile GET['elimina'] per eliminare il cookie eventualmente creato

localStorage.removeItem("MioNome");		// elimina la coppia key/value che ha come chiave "MioNome"
//localStorage.clear();					// elimina tutte le coppie key/value 
}); // click 





}); // chiude ready 
</script>

<button id="crea_cookie">Imposta cookie</button>  &nbsp;&nbsp; <button id="crea_localStorage">Crea localStorage</button>

<br />

<button id="elimina">Elimina cookie e localStorage</button>

<div id="divo"></div><!-- visualizza il valore di 'locaStorage' -->


<?php 

if(isset($_COOKIE['MioNome'])){	// il 'cookie' è impostato nel file "cuki.php" 
$mostra = $_COOKIE['MioNome'];
echo $mostra;
}; 


?>



</body>
</html>
