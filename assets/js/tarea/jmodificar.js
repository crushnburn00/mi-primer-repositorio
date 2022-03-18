$(document).ready(function(){


    $('#btnGuardarComentario').click(function(){
        if (confirm("SEGURO QUE DESEA GUARDAR EL COMENTARIO?")){
            $.ajax({            
                url: rutaInicial + 'tarea/guardarDetalleAjax',
                type: 'POST',
                dataType: 'json',
                data: $('#form_tareacomentario').serialize(),
                success: function(msj){
                    if(msj.estado==1){

                        data = msj.result['aDetTarea'];
                        
                        $('#div_dettarea').append('<div class="col-md-2 col-form-label required1">'+data.usu+'</div>'+
                            '<div class="col-md-2 col-form-label required1">'+data.fecregistro+'</div>'+
                            '<label for=""  class="form-control-sm show col-md-8" id="">'+$('#desctarea').val()+'</label>');

                        $('#desctarea').val('');

                    }else
                       sesionValida(msj.mensaje , 'validacion_detalletarea');
                    
                }
            });
        }//else{          
            //$('#validacion_errores').html('');
        //}
        return false;
    });


    $('#btnFinalizarTarea').click(function(){
        if (confirm("SEGURO QUE DESEA FINALIZAR LA TAREA?")){
            $.ajax({            
                url: rutaInicial + 'tarea/finalizarTareaAjax',
                type: 'POST',
                dataType: 'json',
                data: $('#form_tareadetalle').serialize(),
                success: function(msj){
                    if(msj.estado==1){
                        data = msj.result['aTarea']
                        $('#lblEstadoTarea').html('<i class="'+data.icon+'"></i> '+data.estado);
                        $("#btnFinalizarTarea").remove();
                        $('#div_formdettarea').remove();


                        $('#lblEstadoTarea').removeClass();
                        $('#lblRegistroTarea').removeClass();
                        $('#lblEstadoTarea').addClass('col-md-6  left '+data.style);
                        $('#lblRegistroTarea').addClass('col-md-6  right '+data.style);

                    }else
                       sesionValida(msj.mensaje , 'validacion_detalletarea');
                    
                }
            });
        }//else{          
            //$('#validacion_errores').html('');
        //}
        return false;
    });


    $('#btnEditarTarea').click(function(){
        habilitarEdicion('#div-tarea');
        habilitarBotonesEdicion( 'Tarea' );
        /*validarCantidadDigitoInput("#dniUsuTarjeta", 8 , 9, '#span-dni');
        inputvalidarTelf();
        inputvalidarUsuTarjeta();*/
        //$( "#dniUsuTarjeta" ).trigger( "input" );
        return false;
    });

    $('#btnCancelarTarea').click(function(){
        deshabilitarEdicion('#div-tarea');
        deshabilitarBotonesEdicion('Tarea');
        return false;
    });

    $('#btnGuardarTarea').click(function(){
        $('#validacion_tarea').html('');
        /*verificar si hay cambios cambios*/
        if(validarCambios('#div-tarea')){

            if (confirm("SEGURO QUE DESEA MODIFICAR LOS DATOS DEL CLIENTE?")){
                $.ajax({            
                    //method: 'post',
                    url: rutaInicial + 'tarea/actualizarAjax',
                    type: 'POST',
                    dataType: 'json',
                    data: $('#form_tareadetalle').serialize(),
                    success: function(msj){
                        if(msj.estado == 1){
                            actualizarForm('#div-tarea');
                            $('#btnCancelarTarea').click();

                            if( msj.result['aHistorial'] !== undefined){
                                //row = msj.result['aHistorial'];
                                //$('#div-hisTarea').html(msj.htmlHis);

                                html = hmtlHistorial(msj);
                                $('#div-hisTarea').html(html);

                            }
                            
                        }else{
                            $('#validacion_tarea').html(msj.mensaje);
                            $('#validacion_tarea').css('color','red');
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



