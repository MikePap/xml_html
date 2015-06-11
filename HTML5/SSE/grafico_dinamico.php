<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
/*
echo 'data: {"data1": '. rand(1,10) . ',"data2": '. rand(1,10) . ',"data3": '.
rand(1,10) . ',"data4": '. rand(1,10) . '}' . PHP_EOL;
echo PHP_EOL;

// Questo esempio utilizza la costante predefinita PHP_EOL che da la possibilità di impostare su una unica riga, a differenza del seguente esempio. Da ricordare che l'utilizzo di \n, a fine riga, e \n\n, per l'ultima riga,  non è più consentito e in alcuni casi produce errore
*/

echo '
data: {
data: "data1": '.rand(1,10).', 
data: "data2": '.rand(1,10).', 
data: "data3": '.rand(1,10).',
data: "data4": '.rand(1,10).' 
data:}
';


/*

*/

?>




