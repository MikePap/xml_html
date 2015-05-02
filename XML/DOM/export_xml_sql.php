<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Export XML in SQL </title>
</head>

<body>

<h3>Esportare un set di risultati XML in un database </h3>



<?php 
require("../allegati/Conn_mysqli.php");

###########   FUNZIONA  (se l'operazione si ripete non funziona perchè il campo "titolo_nabc" ha indice "unico")  #################

$xmlData =<<< END
<?xml version="1.0"?>

<data>
	<item>
    		<idrif>6</idrif>
            <titolo>Scadenza concorso Orciolo d'0ro</titolo>
            <notizia>Attenzione sta per scadere l'iscrizione per il concorso premio Orciolo d'oro 2011</notizia>
            <categoria>Eventi_fiere</categoria>
            <data>2011-04-07</data>
     </item>
            
	<item>
    		<idrif>1</idrif>
            <titolo>Scadena concorso Premio Olio Capitale </titolo>
            <notizia>Occhio ragazzi sta per scadere l'iscrizione per l'evento Olio capitale 2011</notizia>
            <categoria>Eventi_fiere</categoria>
            <data>2011-04-07</data>
     </item>

</data>            
END;

$xml = simplexml_load_string($xmlData) or die("ERROR: Cannot create SimpleXML object");

$sql = "INSERT INTO news_abc(idrif_nabc, titolo_nabc, notizia_nabc, categoria_nabc, data_nabc) 
		VALUES(?,?,?,?,?) "; // VALUES('$id', '$titolo', '$notizia', '$categoria', '$data') ";
if($result = $mysqli->prepare($sql)){
$result->bind_param('dssss', $id, $titolo, $notizia, $categoria, $data);

foreach($xml->item as $item){
$id = $item->idrif;
$titolo = $item->titolo;
$notizia = $item->notizia;
$categoria = $item->categoria;
$data = $item->data;
$result->execute();
} // foreach
} // if(prepare)   


?>


<!-- 
*** ATENZIONE: 
UNA VOLTA ESEGUITO L'INSERIMENTO (dopo aver caricato la pagina) NON SI POTRA' PIU' AVERE UN'ALTRO INSERT PERCHE' IL CAMPO 'titolo' E' UNIVOCO 
-->



</body>
</html>
