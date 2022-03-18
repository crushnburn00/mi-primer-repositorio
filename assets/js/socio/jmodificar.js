$(document).ready(function(){

	$('#btnEditarSocio').click(function(){
        habilitarEdicion('#div-socio');
        habilitarBotonesEdicion( 'Socio' );
        return false;
    });

    $('#btnCancelarSocio').click(function(){
        deshabilitarEdicion('#div-socio');
        deshabilitarBotonesEdicion('Socio');
        return false;
    });


    $('#btnGuardarSocio').click(function(){
        $('#validacion_socio').html('');
        /*verificar si hay cambios cambios*/
        if(validarCambios('#div-socio')){

            if (confirm("SEGURO QUE DESEA MODIFICAR LOS DATOS DEL SOCIO?")){
                $.ajax({            
                    //method: 'post',
                    url: rutaInicial + 'socio/actualizarAjax',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#form_sociodetalle').serialize(),
                    success: function(msj){
                        if(msj.estado == 1){
                            actualizarForm('#div-socio');
                            $('#btnCancelarSocio').click();
                            
                        }else{
                            $('#validacion_socio').html(msj.mensaje);
                            $('#validacion_socio').css('color','red');
                        }
                    }
                });
            }else{          
                $('#validacion_errores').html('');
            }
        }else{
            cancelarCambios();
        }
        return false;
    });

});