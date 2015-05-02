<?php 
// Connessione al database mylibrary
//$mysqli= new mysqli("localhost", "pr_08_lo", "my20pw88", "mylibrary");  

$mysqli= new mysqli("localhost", "$_SERVER[DB_USER]", "$_SERVER[DB_PASS]", "abcoliodoliva");  

if(mysqli_connect_errno())  {
echo "<p>Spiacente nessuna connessione!", mysqli_connect_error(),"</p>\n";
exit();
$mysqli->close();
}

?>
