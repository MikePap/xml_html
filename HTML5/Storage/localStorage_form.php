<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>Immagazzinare dati da un form</title>
<style type="text/css">
h1{ color: #00F; font-size:24px;}
h3{ color: #060; font-size:18px;}
dt{ color:#003399; margin-bottom:5px;}
dd{ color:#0066FF;}
.nota{ color:#FF6666;}
.codice{ color:#060}
.rosso{ color:#993300; }
.blu{ color:#0066FF; }

p.par{ color:red; /*display:none;*/ }
p.par1, p.par2{ color:red;  /*display: none*/ };

</style>
<script type="text/javascript" src="../../jQuery-1.6.min.js"></script>
</head>
<body>

<h1>Immagazzinare dati in <q>localStorage</q> da un form php  </h1>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<label>Nome</label>
<input type="text"  name="nome" size="20" maxlength="50" value="<?php echo $_POST['nome'] ?>" />
<br />

<label>Cognome</label>
<input type="text"  name="cognome" size="20" maxlength="50" value="<?php echo $_POST['cognome'] ?>" />
<br /> <br />

<input type="submit" name="sub" value="Invia"/>
</form>



<?php 

if(isset($_POST['sub'])){
$nome = $_POST['nome']; 
$cognome = $_POST['cognome'];

// echo "$nome <br /> $cognome";
printf("<p class='par'><span>%s</span> <span>%s</span></p>", $nome, $cognome);
//printf("<p class='par1'>%s</p>", $nome);
//printf("<p class='par2'>%s</p>", $cognome);

?>

<script  type="text/javascript">
jQuery(document).ready(function(){

//var nome =    $('p.par1').text();
//var cognome =  $('p.par2').text();
//var one = localStorage.name = nome;
//var two = localStorage.surname = cognome;
//$("div.divo").append(one+ " " +two).addClass("blu");

/*
$('p.par span').each(function(i, val){
var indice = $(this).index();
var one = $(this).text();
if(indice < 1)
alert(one);
return;		// restituisce solo il primo span
}) // each 
*/

var nome = $('p.par span').eq(0).text();
var cognome = $('p.par span').eq(1).text();
//alert(two);
var one = localStorage.name = nome;
var two = localStorage.surname = cognome;
$("div.divo").append(one+ " " +two).addClass("blu");


}); // chiude ready 
</script>


<?php 

} // if(isset)
?>



<div class="divo"></div> 





</body>
</html>
