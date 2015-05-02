// longjob.js
// function to simulate a long running job
// loops for approximately n seconds.
function longJob(n) {
	var start = new Date(); 
	var elapsedSeconds = 0;
	while(elapsedSeconds < n) {
		var v = 0;
		for (var i = 0; i < 1000000; i++) v += i;
		var end = new Date();
		elapsedSeconds = (end.getTime() - start.getTime())/1000.0;
	}
	return "All Done in " + elapsedSeconds + " seconds.";
}

// Our webworker registers for an message event so we can talk
// to it from our main thread and ask it to do something.
self.addEventListener('message', function(e) {

	// Invoke the longjob function within our worker thread
	// and pass in the parameter that was sent in.
	var result = longJob(e.data);

	//  Send a message back to the main thread with the result
	self.postMessage(result);
}, false);



