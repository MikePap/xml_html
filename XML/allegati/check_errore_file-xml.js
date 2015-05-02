// Funzione che permette di controllare se un file XML contiene errori (valida sia in Internet Explorer che in Firefox)

function loadXMLDocErr(dname){
// "dname" è il file da controllare

try //Internet Explorer
  {
  xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
  xmlDoc.async=false;
  xmlDoc.load(dname);

  if (xmlDoc.parseError.errorCode != 0)
    {
    alert("Error in line " + xmlDoc.parseError.line +
    " position " + xmlDoc.parseError.linePos +
    "\nError Code: " + xmlDoc.parseError.errorCode +
    "\nError Reason: " + xmlDoc.parseError.reason +
    "Error Line: " + xmlDoc.parseError.srcText);
    return(null);
    }
  }
catch(e)
  {
  try //Firefox
    {
    xmlDoc=document.implementation.createDocument("","",null);
    xmlDoc.async=false;
    xmlDoc.load(dname);
    if (xmlDoc.documentElement.nodeName=="parsererror")
      {
      alert(xmlDoc.documentElement.childNodes[0].nodeValue);
      return(null);
      }
    }
  catch(e) {alert(e.message)}
  }
try
  {
  return(xmlDoc);
  }
catch(e) {alert(e.message)}
return(null);
} // chiude la funzione  

