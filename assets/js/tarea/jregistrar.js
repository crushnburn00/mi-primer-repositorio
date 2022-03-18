$(document).ready(function(){

	$('#btnGuardar').click(function(){

		if (confirm("SEGURO QUE DESEA GUARDAR LOS DATOS?")){
			$.ajax({			
				//method: 'post',
				url: rutaInicial + 'tarea/guardarAjax',
				type: 'POST',
				dataType: 'json',
				data:  $('#form_tarea').serialize(),
				success: function(msj){
					if(msj.estado == 1){

						$('#modal_validacion .modal-title').html('Registro Guardado! ID de Tarea: ' + msj.result.idtarea);
						$('#modal_validacion .modal-body').html('');
						limpiarForm("form_tarea");
						
					}else{
						sesionValida(msj.mensaje , 'modal_validacion .modal-body');
					
					}	
					$('#modal_validacion').modal('show');
				}
			});
		}else			
			$('#validacion_errores').html('');
		
		return false;
	});

	$('#departamento').change(function(){
		ajaxprovincia();
		return false;
	});

	$('#provincia').change(function(){
		ajaxdistrito();
		return false;
	});

	$('#distrito').change(function(){
		ajaxzona();
		return false;
	});

	$('#btnCancelar').click(function(){
		window.location.replace(rutaInicial + 'tarea');
		return false;
	});



	$('#icon-delete-fecini').click(function(){
        $('#fecIni').val('');
    });

    $('#icon-delete-fecfin').click(function(){
        $('#fecFin').val('');
    });



});
	



