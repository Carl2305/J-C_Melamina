// JavaScript Document
/*
 * app
 * Script-ContentWeb.js is a file dedicated to the functionality 
 * of the J&C Melamina page
 * @author Carlos Mogollon <https://github.com/Carl2305>
 * Copyright © J&C Melamina 2021
 */
window.addEventListener('DOMContentLoaded', () => {
    ContenidoPage();
    Enviar_mail();
});
const ContenidoPage =()=>{
    $.ajax({
        type: "POST",
        url:"Controllers/LoadContentPage.php",
        async: false,
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
    $("#imgLogo").attr('src',data[0]['img_contenido'].replace('../', ''));
}
function showEmail(data){
    $("#emailPage").html(data[1]['texto_contenido']);
    $("#emailPage").attr('href','mailto:'+data[1]['texto_contenido']);
    $("#emailPageFooter").html(data[1]['texto_contenido']);
}
const Enviar_mail=()=>{
    $("#idSendConsult").click(function(){
        var email=$("#email").val();
        var consult=$("#consulta").val();
        if(email===""||consult===""){
            Swal.fire({
              icon: 'warning',
              title: 'Ingrese su consulta y email !!',
              showConfirmButton: false,
              timer: 1500
            });
            return;
        }
        else{
            if(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(email.trim())){
                $.ajax({
                    type: "POST",
                    url:"Controllers/SendMail.php",
                    async: true,
                    data: {'correo':email,'consulta':consult},
                    success: function (data){
                        console.log(data);
                        if(data==1){
                            Swal.fire({
                              icon: 'success',
                              title: 'Consulta Enviada',
                              showConfirmButton: false,
                              timer: 1500
                            })
                        }
                        else{
                            Swal.fire({
                              icon: 'error',
                              title: 'Error! Consulta no Enviada',
                              showConfirmButton: false,
                              timer: 1500
                            })
                        }
                    },
                    error : e => {
                        Swal.fire({
                          icon: 'error',
                          title: 'Error! Consulta no Enviada',
                          showConfirmButton: false,
                          timer: 1500
                        })
                        console.log('Error al momento de enviar su consulta '+e.message);
                    },
                    complete: c =>{
                        $("#email").val('');
                        $("#consulta").val('');
                    }
                });
            }
            else{
                Swal.fire({
                  icon: 'warning',
                  title: 'Ingrese un email válido !!',
                  showConfirmButton: false,
                  timer: 1500
                });
                return;
            }
        }
    });
}