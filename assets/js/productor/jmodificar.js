$(document).ready(function(){
    $('#fecNacCony').datetimepicker({locale: 'es' , format: 'L'});
    
	/*$('#btnEditarProductor').click(function(){
        habilitarEdicion('#div-productor');
        habilitarBotonesEdicion( 'Productor' );

        return false;
    });

    $('#btnCancelarProductor').click(function(){
        deshabilitarEdicion('#div-productor');
        deshabilitarBotonesEdicion('Productor');
        return false;
    });


    $('#btnEditarConyugue').click(function(){
        habilitarEdicion('#div-conyugue');
        habilitarBotonesEdicion( 'Conyugue' );

        return false;
    });

    $('#btnCancelarConyugue').click(function(){
        deshabilitarEdicion('#div-conyugue');
        deshabilitarBotonesEdicion('Conyugue');
        return false;
    });

    $('#btnGuardarProductor').click(function(){
        $('#validacion_productor').html('');
        if(validarCambios('#div-productor')){

            if (confirm("SEGURO QUE DESEA MODIFICAR LOS DATOS DEL PRODUCTOR?")){
                $.ajax({            
                    //method: 'post',
                    url: rutaInicial + 'productor/actualizarAjax',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#form_productordetalle').serialize(),
                    success: function(msj){
                        if(msj.estado == 1){
                            actualizarForm('#div-productor');
                            $('#btnCancelarProductor').click();
                            
                        }else{
                            $('#validacion_productor').html(msj.mensaje);
                            $('#validacion_productor').css('color','red');
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


    $('#btnGuardarConyugue').click(function(){
        $('#validacion_conyugue').html('');
        if(validarCambios('#div-conyugue')){

            if (confirm("SEGURO QUE DESEA MODIFICAR LOS DATOS DEL CONYUGUE?")){
                $.ajax({            
                    //method: 'post',
                    url: rutaInicial + 'productor/actualizarConyugueAjax',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#form_conyuguedetalle').serialize(),
                    success: function(msj){
                        if(msj.estado == 1){
                            actualizarForm('#div-conyugue');
                            $('#btnCancelarConyugue').click();
                            
                        }else{
                            $('#validacion_conyugue').html(msj.mensaje);
                            $('#validacion_conyugue').css('color','red');
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
*/


});