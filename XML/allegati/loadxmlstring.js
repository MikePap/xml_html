// File di riferimento per i files della cartella "XML_DOM-Javascript" 
// Permette di eseguire xml creato all'interno del file .html (vedi --> Traversing.html)
function loadXMLString(txt)
{
	if (window.DOMParser)
	{
		parser=new DOMParser();
		xmlDoc=parser.parseFromString(txt,"text/xml");
	}
	else
	{	
		xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
		xmlDoc.async="false";
		xmlDoc.loadXML(txt);
	}
	return xmlDoc;
} // "loadXMLString"


