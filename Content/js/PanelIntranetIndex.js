// JavaScript Document
/*
 * app
 * PanelIntranetIndex.js is a file dedicated to the functionality 
 * of the J&C Melamina page
 * @author Carlos Mogollon <https://github.com/Carl2305>
 * Copyright © J&C Melamina 2021
 */
var guardar=false;
window.addEventListener('DOMContentLoaded', () => {   
    $("#uploadimgLogo").change(function () {
        filePreview(this);
    });
    ContenidoPage();
});
$("#UpdateLogo").click(function(){
    guardar=true;
	$("#myModal_logo").modal('show');
    $("#imgPreview").removeAttr('src');
});
function filePreview(input) {                               
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#imgPreview").attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
const ContenidoPage =()=>{
    $.ajax({
        type: "post",
        url:"../../Controllers/LoadContentPage.php",
        async: true,
        data:'CargaObjeto',
        dataType:'json',
        success: data =>{
            showLogo(data);
            showEmail(data);
            console.log(data);
        },
        error : e => {
            console.log('Error al retornar la data del contenido '+ e.message());
        }
    });
}
function showLogo(data){
    $("#imgLogo").attr('src','../'+data[0]['img_contenido']);
}
function showEmail(data){
    $("#emailPage").text(data[1]['texto_contenido']);
}
$('#btnGuardar').on('click', function (e){
	e.preventDefault(); // Evitamos que salte el enlace.
	if(guardar){
		SaveNewLogo();
	}
});
function SaveNewLogo(){
    if($("#uploadimgLogo")[0].files.length>0){
        var paqueteDeDatos = new FormData();
        paqueteDeDatos.append('uploadimg', $('#uploadimgLogo')[0].files[0]);
        $.ajax({
            url: "../../Controllers/SubirLogo.php",
            type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
            contentType: false,
            data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
            processData: false,
            cache: false,
            success: function(resultado){ // En caso de que todo salga bien.
				console.log(resultado);
				$("#myModal_logo").modal('hide');
				location.href=window.location;
							
			},
            error: function (){ // Si hay algún error.
                alert("Algo ha fallado.");
            }
        });
    }
    else{
        alert("Seleccione una imagen!!");
    }
}