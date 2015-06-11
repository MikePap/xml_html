<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

//$nextWeek = time() + (7 * 24 * 60 * 60);
//$next10 = time() + (10 * 1);
//$time = date('r');
//$time = date('s', $next10);		// secondi
$time = date('r');
//$time = date('s');		// secondi
//$time = date('i');		// minuti
//$time = date('H');		// ore 
// il retry imposta il tempo di riconnessione(in millesecondi). Di default è 3 secondi. Qui è impostato a 5

echo "
retry: 5000									
data: The server time is: {$time} ";			// questo output DEVE sempre incominciare con "data"

//echo "data: <br />\n\n"
//echo "data: fuck you";
flush();									// pare sia ininfluente 
?>



<!--
http://localhost/xml_html/HTML5/SSE/demo_sse.php
-->


