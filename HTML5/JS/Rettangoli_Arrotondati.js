/*
###	IMPOSTAZIONE DI GRADIENTE A 2 COLORI PER RETTANGOLO. RESTITUISCE UNA VARIABILE DA ASSEGNARE ALLA PROPRIETà "fillStyle" 	###
--- PARAMETRI:
- elem:		id dell'elemento <canvas>
- incl:		stabilisce una eventuale inclinazione del gradiente. Se impostato a zero il gradiente sarà verticale. 		
- fin:		deve essere uguale all'altezza dell'elemento <canvas>		
- color1:		rappresenta il primo colore del gradiente (dall'alto) 
- color2:		rappresenta il secondo colore del gradiente  
*/

function Lin_Gradiente2(elem,incl,fin,colore1,colore2){ 
var ctx = document.getElementById(elem).getContext('2d');
var lingrad = ctx.createLinearGradient(0,0,incl,fin);		// i primi 2 parametri rappresentano il punto iniziale del gradiente per cui 0 e 0 sono da considerarsi fissi. 
lingrad.addColorStop(0, colore1);	//il primo parametro stabilisce la posizione del gradiente; in questo caso, del primo colore, sarà per forza 0; 
lingrad.addColorStop(1, colore2);	// il primo parametro è fissato a 1 che rappresenta il punto massimo(finale) del gradiente 
return lingrad;
} // chiude la funzione "Lin_Gradiente"


/* 
###	CREAZIONE DI RETTANGOLO (PIENO O VUOTO) CHE OCCUPI INTERAMENTE L'ELEMENTO CANVAS	###

---	PARAMETRI FUNZIONI	---
- elem:		id dell'elemento canvas
- L:			larghezza del rettangolo 
- H:			altezza del rettangolo 
- radius:		angolatura 
- riempimento:	è il colore di riempimento del rettangolo (es: red or #F00 or rgb(255,0,0) )

NB: IMPOSTARE 'width' e 'height' DELL'ELEMENTO CANVAS  UGUALI RISPETTIVAMENTE A 'LARGHEZZA' E 'ALTEZZA' DEL RETTANGOLO   
*/

function Rettangolo_Arrotondato(elem,L,H,radius,riempimento){
var L_min = L - radius; 
var H_min = H - radius;  
var canvas = document.getElementById(elem);
var ctx = canvas.getContext('2d');
ctx.beginPath();
ctx.moveTo(0,radius);
ctx.lineTo(0,H_min);
ctx.quadraticCurveTo(0,H,radius,H);
ctx.lineTo(L_min,H);
ctx.quadraticCurveTo(L,H,L,H_min);
ctx.lineTo(L,radius);
ctx.quadraticCurveTo(L,0,L_min,0);
ctx.lineTo(radius,0);
ctx.quadraticCurveTo(0,0,0,radius);
ctx.fillStyle = riempimento; //  
ctx.fill();
}; // ########  chiude la funzione 'Rettangolo_Arrotondato' ###########

/////////////////////////////////////////////////////////////////////////////////////////

function Rettangolo_Arrotondato_vuoto(elem,L,H,radius){
var L_min = L - radius; 
var H_min = H - radius; 
var canvas = document.getElementById(elem);
var ctx = canvas.getContext('2d');
ctx.beginPath();
ctx.moveTo(0,radius);
ctx.lineTo(0,H_min);
ctx.quadraticCurveTo(0,H,radius,H);
ctx.lineTo(L_min,H);
ctx.quadraticCurveTo(L,H,L,H_min);
ctx.lineTo(L,radius);
ctx.quadraticCurveTo(L,0,L_min,0);
ctx.lineTo(radius,0);
ctx.quadraticCurveTo(0,0,0,radius);
ctx.stroke();
}; // ##### chiude la funzione  Rettangolo_Arrotondato_vuoto ######## 

