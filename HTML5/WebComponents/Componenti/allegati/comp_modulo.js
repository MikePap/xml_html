// Questi costruttori sono richiamati in "comp_modulo.html"

'use strict';

class boxlabelInput extends HTMLElement {
	constructor() {
		super();					// è sempre il primo

		const style = document.createElement('style');
		const template = document.getElementById('template-label-input');
		const templateContent = template.content;
		const shadowRoot = this.attachShadow({mode: 'open'});
		shadowRoot.appendChild(templateContent.cloneNode(true));
		shadowRoot.appendChild(style);
		let inputFile = document.querySelector('#sceltaFile');
		inputFile.style.opacity = 0;											// @@@ tipo file

		style.textContent = `
			:host { 
				margin: 2px; padding: 5px;  background: #666633; 
				display: flex; flex-direction: row;
				width: 100%; border: 1px solid #ccc; border-radius: 3px;
			}
			::slotted(label) { display: block; color: #fff; width: 40% }
			::slotted(input) { display: block;  width: 60% }
		`;
	}//
};//

customElements.define('box-label-input', boxlabelInput);

class boxInvioForm extends HTMLElement {
	constructor() {
		super();					// è sempre il primo
		const style = document.createElement('style');
		const template = document.getElementById('template-button-invia');
		const templateContent = template.content;
		const shadowRoot = this.attachShadow({mode: 'open'});
		shadowRoot.appendChild(templateContent.cloneNode(true));
		shadowRoot.appendChild(style);

		style.textContent = `
			:host { 
				width: 100%; display:block; text-align:center; padding: 5px; margin: 2px; 
				border: 1px solid gray; border-radius: 3px;  
			}
			::slotted(:nth-child(1))  { width: 40%; color: blue; }
		`;
	}//
};//

customElements.define('box-invio-form', boxInvioForm);

/*

	":host" => fa riferimento al suo template 
	"::slotted(:nth-child(1)" => fa riferimento al primo slot del template
	"::slotted(:nth-child(2)" => fa riferimento al secondo slot del template

*/
