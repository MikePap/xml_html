<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

function OraLegale() {
$time = localtime();
$look = $time[2] . ":" . $time[1] . ":" . $time[0];
//return "sono le ore <b>$look</b>";				// 
return "sono le ore $look";
} // "OraLegale" 
$look = OraLegale();

$date = getdate(); 


$time = date('r');
$secondi = date('s');		// secondi
$minuti = date('i');		// minuti
$ore = date('H');			// ore 
//$orario = $ore.":".$minuti.":".$secondi; 
$orario = date("H:i:s");				// uguale al precedente 

// il retry imposta il tempo di riconnessione(in millesecondi). Di default è 3 secondi. In questo caso è stato impostato ad un secondo per ottenere l'effetto dell'orologio

echo "
retry: 1000\n									
data: ore: {$orario} \n\n
";			
// data: The server time is: {$time}  \n\n 
//data: {$look} \n\n
flush();									// pare sia ininfluente 


?>



<!--
http://localhost/xml_html/HTML5/SSE/orologio_sse.php
-->


