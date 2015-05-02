// File di riferimento per i files della cartella "XML_DOM-Javascript"
// Permette di carica il file .xml 'dname'  
function loadXMLDoc(dname)
{
	if (window.XMLHttpRequest)
	{
		xhttp=new XMLHttpRequest();
	}
	else
	{
		xhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xhttp.open("GET",dname,false);
	xhttp.send(null);
	return xhttp.responseXML;
} 


