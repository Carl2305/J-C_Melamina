// JavaScript Document
/*
 * app
 * script-PanelIntranet-Novedades.js is a file dedicated 
 * to the functionality of the J&C Melamina page
 * @author Carlos Mogollon <https://github.com/Carl2305>
 * Copyright © J&C Melamina 2021
 */
const items = document.getElementById('ListProyectos');
const templateCard = document.getElementById('itemsProyecto').content;
const fragment = document.createDocumentFragment();
var guardar=false;
// The DOMContentLoaded event is fired when the HTML document has been fully loaded and parsed
window.addEventListener('DOMContentLoaded', () => {
    LoadAllProyectos();
    $("#uploadimg").change(function () {
        filePreview(this);
    });
});
const filePreview = input=> {                               
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#imgPreview").attr('src',e.target.result);
            //console.log(e.target.result)
        }
        reader.readAsDataURL(input.files[0]);
    }
}
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
            //console.log(data);
		},
		error : e => {
            alert('Error al momento de cargar los proyectos '+e.message());
		}
	}); 
}
const pintarCards = datos => {
    datos.forEach(proyecto => {
        templateCard.querySelector('img').setAttribute('src', '../'+proyecto.imagen);
		templateCard.querySelector('button').dataset.id=proyecto.id_proyecto;
        templateCard.querySelector('h4').textContent = proyecto.nombre;
		templateCard.querySelector('p').textContent = proyecto.Descripcion;
        templateCard.querySelector('img').setAttribute('title', proyecto.nombre);
        templateCard.querySelector('img').setAttribute('alt', 'Imagen '+proyecto.nombre);
        const clone = templateCard.cloneNode(true);
        fragment.appendChild(clone);
        items.appendChild(fragment);
    });
}
$("#agregarProyecto").click(function(){
	guardar=true;
	$("#myModal").modal('show');
    $("#imgPreview").removeAttr('src');
	$('#Nomb_Proyecto').val('');
	$('#Descrip_Proyecto').val('');
    $('#imgPreview').removeAttr('src');
});
$('#btnGuardar').on('click', function (e){
	e.preventDefault(); // Evitamos que salte el enlace.
	if(guardar){
		SaveNewProyecto();
	}
	else{
		//aqui llama a la funcion actualizar
	}
});    
function SaveNewProyecto(){
	if($('#Nomb_Proyecto').val()!=''){
		if($("#uploadimg")[0].files.length>0){
            document.getElementById('ListProyectos').innerHTML="";
            var paqueteDeDatos = new FormData();
			paqueteDeDatos.append('uploadimg', $('#uploadimg')[0].files[0]);
			paqueteDeDatos.append('Nomb_Proyecto', $('#Nomb_Proyecto').val());
			paqueteDeDatos.append('Descrip_Proyecto', $('#Descrip_Proyecto').val());
			var destino = "../../Controllers/SubirProyectoBD.php"; // El script que va a recibir los campos de formulario.
			/* Se envia el paquete de datos por ajax. */
			$.ajax({
				url: destino,
				type: 'POST',
				contentType: false,
				data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
				processData: false,
				cache: false,
				success: function(resultado){ // En caso de que todo salga bien.
					console.log(resultado);
					$("#myModal").modal('hide');
					location.href=window.location;
				},
				error: function (){ // Si hay algún error.
					alert("Algo ha fallado.");
				}
            });
		}
		else{
            alert('eliga una imagen !!');
			return;
		}
	}
	else{
		alert('ingrese el Nombre del Proyecto !!');
		return;
	}
}
$("#editProyect").click(function(){
	guardar=false;
	// aqui deberia ir una funcion que me permita 
	// saber el id del proyecto (card) para poder
	// enviar el id al controller y actualizar el
	// Proyecto (card).
});