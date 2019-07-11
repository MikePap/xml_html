// Il componente "PopUpInfo" rappresenta una immagine-icona che all'evento "hover" visualizza un testo informativo 
// Questo componente è stato inserito in "tooltip-info.html"

'use strict';
class PopUpInfo extends HTMLElement {

	constructor() {

		super();

//		Creazione di shadow root
		const shadow = this.attachShadow({mode: 'open'});

//		Creazioni di elementi <span>
		const wrapper = document.createElement('span');
		wrapper.setAttribute('class', 'wrapper');

		const icon = document.createElement('span');
		icon.setAttribute('class', 'icon');
		icon.setAttribute('tabindex', 0);

		const info = document.createElement('span');
		info.setAttribute('class', 'info');

//		Rilevare il contenuto testo dall'attributo "data-text" e inserirlo nello <span class="info"> 
		const text = this.getAttribute('data-text');
		info.textContent = text;

//		Definizione dell'attributo "src" di immagine-icona
		let imgUrl;
		if(this.hasAttribute('img')) {					// se è stata impostata una immagine (impostato "alt.png") 
			imgUrl = this.getAttribute('img');
		} else {
			imgUrl = 'img/default.png';					// altrimenti sarà presa quella di default
		}

//		Creazione di elemento <img> ed inserimento nello <span class="icon">
		const img = document.createElement('img');
		img.src = imgUrl;
		icon.appendChild(img);

//		Creazione di elemento <style> e definizione di stili CSS da inserire nello shadow dom
		const style = document.createElement('style');
		console.log(style.isConnected);						// false

		style.textContent = `
		.wrapper {
			position: relative;
		}
		.info {
			font-size: 0.8rem;
			width: 200px;
			display: inline-block;
			border: 1px solid black;
			padding: 10px;
			background: white;
			border-radius: 10px;
			opacity: 0;
			transition: 0.6s all;
			position: absolute;
			bottom: 20px;
			left: 10px;
			z-index: 3;
		}
		img {
			width: 1.2rem;
		}
		.icon:hover + .info, .icon:focus + .info {
			opacity: 1;
		}
		`;

//		Inserimento nello shadow dom degli elementi creati 
		shadow.appendChild(style);
		console.log(style.isConnected);							// true
		wrapper.appendChild(icon);
		wrapper.appendChild(info);
		shadow.appendChild(wrapper);
	}
}

//	Definizione del nuovo elemento
customElements.define('popup-info', PopUpInfo);
