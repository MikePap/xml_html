<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8" />
<title>Input color</title>
<style type="text/css">
h1{ color: #00F; font-size:24px;}
h3{ color:#663333; font-size:18px;}
dt{ color:#003399; margin-bottom:5px;}
dd{ color:#0066FF;}
.nota{ color:#FF6666;}
.codice{ color:#060}

.rosso{ color:#993300; }
.blu{ color:#0066FF; }

</style>
</head>
<body>

<h1>Input type: color</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

Select your favorite color: <input type="color" name="favcolor"><br>
<input type="submit" name="sub" size="" maxlength="" value="Invia"/>
</form>

<?php

if(isset($_POST['sub'])){

$jk = $_POST['favcolor']; 

echo $jk;


//$jk = $_POST['']; 
}; //  if(isset($_POST['sub'])){

?>





</body>
</html>
