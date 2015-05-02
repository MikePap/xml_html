navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

var constraints = {audio: false, video: true};
var video = document.querySelector("video");

function successCallback(stream) {
	window.stream = stream;							// stream available to console
	if (window.URL) {
		video.src = window.URL.createObjectURL(stream);
	} else {
		video.src = stream;
	}
}

function errorCallback(error){
	console.log("navigator.getUserMedia error: ", error);
}

navigator.getUserMedia(constraints, successCallback, errorCallback);

/*
ATTENZIONE: succede che se apro questo documento in un browser e poi provo ad aprirlo in un'altro browser non funziona
Funziona (agosto 2014) in Chrome, Firefox e Opera

*/

