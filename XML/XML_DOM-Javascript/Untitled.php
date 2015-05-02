<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>untitled  </title>
<style type="text/css">

table{ border-collapse:collapse; margin:10px; background:rgb(220,220,255); }

</style>
<script type="text/javascript" src="../allegati/jQuery-1.6.min.js"></script> 
</head>
<body>

<script  type="text/javascript">
jQuery(document).ready(function(){
//$('p').css('color', 'red');



}); // chiude ready 
</script>

<table id="table" width="50%" border="1" cellspacing="6" cellpadding="3">
<?php 

$parole = array(
"tambien"=>"anche",
"a"=>"",
"gennaio"=>"ienero",
"molto"=>"mucho",
"giorno"=>"dia",
"b"=>"",
"notte"=>"noche",
"lettera"=>"carta",
"affittare"=>"alquilar",
"domenica"=>"domingo"
); // array 
ksort($parole);						// ordina per chiave
//asort($parole);						// ordina per valori
//echo "<table border='1'>";
foreach($parole as $ita=>$spain){
//echo "$ita:$spain <br />";
echo "<tr>";
if(strlen($ita) == 1){							// nel caso di aprole di una sola lettera (A, B, C ecc...)
echo "<td colspan='2'><b>" .strtoupper($ita). "</b></td>";
}else{
echo "<td>" .$ita. "</td><td>" .$spain. "</td>";
}

echo "</tr>"; 
} // foreach 
//echo "</table>";

?>
</table>


































</body>
</html>
