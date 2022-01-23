// JavaScript Document
/*
 * app
 * app.js is a file dedicated to the functionality of the J&C Melamina page
 * @author Carlos Mogollon <https://github.com/Carl2305>
 * Copyright © J&C Melamina 2021
 */
const cards = document.getElementById('GaleryProducts');
//const items = document.getElementById('GaleryProducts');
const templateCard = document.getElementById('itemsProyecto').content;
const fragment = document.createDocumentFragment();
// The DOMContentLoaded event is fired when the HTML document has been fully loaded and parsed
window.addEventListener('DOMContentLoaded', () => {
    LoadAllProyectos();
});
// Load all Proyects
const LoadAllProyectos =()=>{
		$.ajax({
			type: "POST",
			url:"../../Controllers/ListProyectos.php",
			async: false,
			data:'AllProyectos',
			dataType:'json',
			success: data =>{
				pintarCards(data);
			},
			error : e => {
				console.log('Error al momento de cargar los proyectos '+e);
			}
		}); 
	}
const pintarCards = datos => {
    datos.forEach(proyecto => {
        let urlWapp="https://wa.me/51924859632?text=Hola%20!!,%20quiero%20cotizar%20este%20modelo%20de%20mueble:%20";
        templateCard.querySelector('img').setAttribute('src', '../'+proyecto.imagen);
        templateCard.querySelector('h5').textContent = proyecto.nombre;
		templateCard.querySelector('p').textContent = proyecto.Descripcion;
        templateCard.querySelector('img').setAttribute('title', proyecto.nombre);
        templateCard.querySelector('img').setAttribute('alt', 'Imagen '+proyecto.nombre);
        templateCard.querySelector('a').dataset.id=proyecto.id_proyecto;
        urlWapp+=proyecto.nombre;
        templateCard.querySelector('a').setAttribute('href', urlWapp);
        const clone = templateCard.cloneNode(true);
        fragment.appendChild(clone);
    cards.appendChild(fragment);
    });
}
