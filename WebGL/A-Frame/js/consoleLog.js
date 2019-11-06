//

AFRAME.registerComponent('log', {

//	"schema" istanzia un oggetto con le proprietà del componente
	schema: {
		event: {type: 'string', default: ''},
		message: {type: 'string', default: 'Hello, World!'}
	},

	multiple: true,

// "init" è richiamato soltanto una volta all'inizio di vita del componente
	init: function () {
		var self = this;
		this.eventHandlerFn = function () { console.log(self.data.message); };		// restituisce il valore della proprietà "message"
	},

// "update" gestisce la modifica (aggiornamenti) delle proprietà
	update: function (oldData) {
		var data = this.data;						// valore della proprietà del Componente
		var el = this.el;								// Reference alla entità del componente

		if (oldData.event && data.event !== oldData.event) {
			el.removeEventListener(oldData.event, this.eventHandlerFn);		// Rimozione del previous event listener if it exists.
		}

		if (data.event) {
			el.addEventListener(data.event, this.eventHandlerFn );			// restituisce l'evento quando viene emesso dalla entità
		} else {
			console.log(data.message);													// quando non è specificato nessun evento
		}
	},

// "remove" è richiamato quando il componente viene rimosso
	remove: function () {
		var data = this.data;
		var el = this.el;

		// Remove event listener.
		if (data.event) {
			el.removeEventListener(data.event, this.eventHandlerFn);
		}
	}

});


