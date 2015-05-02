<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Examples</title>
<style type="text/css">
h1{ color: #00F;}
h3{ color:#663333;}
dt{ color:#003399; margin-bottom:5px;}
dd{ color:#0066FF;}
.nota{ color:#FF6666;}
.codice{ color:#060}

#jk{ position:relative; width:60%; margin:10px; padding:5px 10px; background:rgb(250,250,100); border:1px solid #999;  }

</style>

<script type="text/javascript" src="allegati/jQuery-1.6.min.js" ></script>
<script type="text/javascript" src="allegati/loadxmldoc.js" ></script>
<script type="text/javascript" src="allegati/loadxmlstring.js" ></script>

</head>

<body>

<script  type="text/javascript">
$(document).ready(function(){

$.ajax({
type: "GET",
url: "allegati/books.xml",
dataType: "xml",
success: function(xml) {  

var book = $(xml).find('book');	
//var rr = $(xml).find('book').length;	
//alert(rr);
var sel = "<select>";
//$('#jk').html(sel);
//var sel_close = "</select>";

for(i=0; i<book.length; i++){
//var opzioni = "<option val="+i+"> book"  +i+ "</option>";
var opzioni = "<option> book"  +i+ "</option>";
//var opzioni = "<select><option> book"  +i+ "</option></select>";
//var op = "<option>";
//$('#jk').append("<select><option>"+i+'</option></select>');
//var uu = $('#jk').append("<option>"+i+'</option>');
//var uu = $('#jk').html("<option>"+i+'</option>');
//var opzioni = "book";
//$('#jk').append(opzioni);
//alert(i);
//$('#jk').append(sel + opzioni + sel_close);
//$('#jk').html(opzioni);
//$('#jk').append('<br>');
}

var sel_close = "</select>";
$('#jk').append( opzioni );

//$('#jk').html(sel + opzioni + sel_close);
//$('#jk').html(opzioni);

} // chiude success
}); // chiude ajax

/*
$("select#cambia").change(function () {
           var st = "";
          $("select#cambia option:selected").each(function () { // qui si individua ogni attributo selected della select
            st += $(this).val() + ""; // qui si instanzia una variabile che contiene il "valore testo" di selected (cioè le opzioni selezionate)


$.ajax({
type: "GET",
url: "allegati/books.xml",
dataType: "xml",
success: function(xml) {  

$('#jk').find('p').detach();  // Elimina i dati (contenuti nel tag 'p')
var autore = $(xml).find('book').eq(st).find('author');		
var title = $(xml).find('book').eq(st).find('title').text();
//var author = $(xml).find('book').eq(st).find('author').text();
var year = $(xml).find('book').eq(st).find('year').text();
var price = $(xml).find('book').eq(st).find('price').text();


$('#jk').append("<p class='codice'>Title: "+title+"</p>"); // 

$(autore).each(function(){
var autori = $(this).text();
var index = $(this).index();
$('#jk').append("<p class='codice'>Author-"+index+ ": " +autori+ "</p>"); // 
}); // chiude each

$('#jk').append("<p class='codice'>Year: "+year+"</p>"); // 
$('#jk').append("<p class='codice'>Price: "+price+"</p>"); // 
//}); // chiude each 	
} // chiude success
}); // chiude ajax


}); // chiude select 
}) // chiude change 

*/

/*
var sel = "<select>";
var u = "<option> UNO </option>";
var d = "<option> DUE </option>";
var sel_close = "</select>";

$('#jk').html(sel + u + d + sel_close );
*/


}); // chiude ready 
</script>






<div id="jk"></div>







<a href="allegati/books.xml"></a>


<br /><br /><br />
























</body>
</html>
