<?php 
header('Content-Type: text/event-stream'); 
header('Cache-Control: no-cache');

$casuale = rand(1,8);

echo '
data: '.$casuale.'\n
';


/*
event: userlogon
data: {"username": "John123"}
event: update
data: {"username": "John123", "emotion": "happy"}


echo '
data: {
data: "msg": '.rand(1,10).'
data:}
';

*/
//flush();									// pare sia ininfluente 

?>
