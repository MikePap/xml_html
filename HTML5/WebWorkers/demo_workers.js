var i=0;

function timedCount(){
i=i+1;
postMessage(i);				// questo metodo is used to posts a message back to the HTML page.
setTimeout("timedCount()",500);
}

timedCount();

