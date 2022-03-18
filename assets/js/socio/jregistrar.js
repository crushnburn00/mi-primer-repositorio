
$(document).ready(function(){

    $('#codigoprod').on( "input", function(){
    	$input = $(this);
    	if($input.val().length >= 11 ){
    		buscarProductor();
		}
		else{
			
			if( $input.val().length < 1 &&  ( $('#nrodoc').val().length >= 7 || $('#nombrebus').val().length > 2 || $('#apellidosbus').val().length > 2 || $('#razonsocialbus').val().length > 2 )){
    			buscarProductor();
			}else{
				limpiarProductor();	
			}
		}

     });

    $('#nrodoc').on( "input", function(){
    	$input = $(this);
    	if($input.val().length >= 7){
    		buscarProductor();
		}else{
			if( $input.val().length < 1 &&  ( $('#codigoprod').val().length >= 11 || $('#nombrebus').val().length > 2 || $('#apellidosbus').val().length > 2 || $('#razonsocialbus').val().length > 2 )){
    			buscarProductor();
			}else{
				limpiarProductor();	
			}
		}

     });

    $('#tipodoc').on( "change", function(){
    	$input = $(this);
    		buscarProductor();
     });


    $('#nombrebus').on( "input", function(){
    	$input = $(this);
    	if($input.val().length > 2){
    		buscarProductor();
		}else{
			if( $input.val().length < 1 &&  ( $('#nrodoc').val().length >= 7 || $('#codigoprod').val().length >= 11 || $('#apellidosbus').val().length > 2 || $('#razonsocialbus').val().length > 2 )){
    			buscarProductor();
			}else{
				limpiarProductor();	
			}
		}

     });

    $('#apellidosbus').on( "input", function(){
    	$input = $(this);
    	if($input.val().length > 2){
    		buscarProductor();
		}else{
			if( $input.val().length < 1 &&  ( $('#nrodoc').val().length >= 7 || $('#codigoprod').val().length >= 11 || $('#nombrebus').val().length > 2 || $('#razonsocialbus').val().length > 2 )){
    			buscarProductor();
			}else{
				limpiarProductor();	
			}
		}

     });


    $('#razonsocialbus').on( "input", function(){
    	$input = $(this);
    	if($input.val().length > 2){
    		buscarProductor();
		}else{
			if( $input.val().length < 1 &&  ( $('#nrodoc').val().length >= 7 || $('#codigoprod').val().length >= 11 || $('#nombrebus').val().length > 2 || $('#apellidosbus').val().length > 2 )){
    			buscarProductor();
			}else{
				limpiarProductor();	
			}
		}

    });





    $('#btnGuardar').click(function(){
		$('#modal_validacion .modal-title').html('');
		$('#modal_validacion .modal-body').html('');
		if (confirm("SEGURO QUE DESEA GUARDAR LOS DATOS?")){

			var formData = new FormData($('#form_socio')[0]);

			$.ajax({			
				//method: 'post',
				url: rutaInicial + 'socio/guardarAjax',
				type: 'POST',
				dataType: 'json',
				data: formData,
				processData: false,
				contentType: false,
				success: function(msj){
					if(msj.estado == 1){

						$('#modal_validacion .modal-title').html('Registro Guardado! </br> Codigo de Socio: ' + msj.result.codigo);
						$('#modal_validacion .modal-body').html('');
						$('.modal-content').css('background-color','#00AF12');
						$('.modal-content').css('color','#FFF');

						

						if (msj.archivo !== undefined){
							aa_error = msj.archivo['error'];
						
							//En caso surga un error al insertar el archivo
							if(aa_error.length > 0 ){
								$('.modal-content').css('background-color','red');
								$('#modal_validacion .modal-body').css('color','#FFF');

								aa_error.forEach(function callback(currentValue, index, array) {
								    $('#modal_validacion .modal-body').append(currentValue);
								});

								$('#modal_validacion .modal-footer').html('Se redireccionará al Modulo Modificar Socio en 3 segundos ... ');

							}
						}

						$('#modal_validacion .modal-footer').html('Se redireccionará al Modulo Socio en 2 segundos ... ');
						setTimeout("location.href='"+rutaInicial+'socio'+"'",2000);
						
		
					}else{

						sesionValida(msj.mensaje , 'modal_validacion .modal-body');
						$('.modal-content').css('background-color','#FFF');
						$('.modal-content').css('color','red');
					
					}	
					$('#modal_validacion').modal('show');
				}
			});
		}else			
			$('#validacion_errores').html('');
		
		return false;
	});


	$('#btnCancelar').click(function(){
		window.location.replace(rutaInicial+'socio');
		return true;
	});


	$('#tipodocbus').change(function(){

		

		if($('#tipodocbus').val() == 1){
			$('#lblnrodocbus').text($('#tipodocbus option:selected').html());

			$('#lblrazonsocialbus').css("display", "none");
			$('#divrazonsocialbus').css("display", "none");
			$('#razonsocialbus').val('');

			$('#lblnombresbus').css("display", "block");
			$('#divnombresbus').css("display", "block");
			$('#lblApellidobus').css("display", "block");
			$('#divapellidobus').css("display", "block");
		}else{
			if($('#tipodocbus').val() == 2){
				$('#lblnrodocbus').text($('#tipodocbus option:selected').html());
				$('#lblrazonsocialbus').css("display", "block");
				$('#divrazonsocialbus').css("display", "block");
				$('#lblnombresbus').css("display", "none");
				$('#divnombresbus').css("display", "none");
				$('#lblApellidobus').css("display", "none");
				$('#divapellidobus').css("display", "none");
				$('#nombrebus').val('');
				$('#apellidobuss').val('');
			}else{
				$('#lblnrodocbus').text('DNI / RUC');
				$('#lblrazonsocialbus').css("display", "block");
				$('#divrazonsocialbus').css("display", "block");
				$('#razonsocialbus').val('');
				$('#lblnombresbus').css("display", "block");
				$('#divnombresbus').css("display", "block");
				$('#lblApellidobus').css("display", "block");
				$('#divapellidobus').css("display", "block");
				$('#nombrebus').val('');
				$('#apellidosbus').val('');

			}
		}


		return false;
	});


	$("input").on("keyup", function () {
       $input = $(this);
	    /*setTimeout(function () {*/
	        $input.val($input.val().toUpperCase());
	    /*},50);*/
       
     })





});

function buscarProductor(){

	$.ajax({			
					url: rutaInicial + 'productor/buscarxCodigoAjax',
					type: 'POST',
					dataType: 'json',
					data:  $('#form_socio').serialize(),
					success: function(msj){
						if(msj.estado == 1){
							$('#msj-busubi').html('Se encontró '+msj.result['TOTALREGISTROS']+' coincidencia(s). ');

							if(msj.result['TOTALREGISTROS'] == 1){
								$('#lblcodigo').html(msj.result['codigo']);
								$('#lbltipodoc').html(msj.result['id_tipo_documento']);
								$('#lblnrodoc').html(msj.result['nro_documento']);
								$('#lblnombres').html(msj.result['nombre']);
								$('#lblApellido').html(msj.result['apellido']);
								$('#lblrazonsocial').html(msj.result['razon_social']);
								$("#lbltelfijo").html(msj.result['telefono_fijo']);
								$("#lbltelfcelular").html(msj.result['telefono_celular']);
								$("#lbldireccion").html(msj.result['direccion']);
								$("#lbldepartamento").html(msj.result['departamento']);
								$("#lblprovincia").html(msj.result['provincia']);
								$("#lbldistrito").html(msj.result['distrito']);
								$("#lblzona").html(msj.result['zona']);
								$('input[name=txtid]').val(msj.result['id_productor']);
							}else{
								$('#msj-busubi').append('Debe intentar realizar filtros adicionales.');
							}
							
						}else{
							
							limpiarProductor();
						}	
						
					}
			});
}

function limpiarProductor(){
	$('#msj-busubi').html('No se encontró coincidencias.');
	$('#lblcodigo').html('');
	$('#lbltipodoc').html('');
	$('#lblnrodoc').html('');
	$('#lblnombres').html('');
	$('#lblApellido').html('');
	$('#lblrazonsocial').html('');
	$("#lbltelfijo").html('');
	$("#lbltelfcelular").html('');
	$("#lbldireccion").html('');
	$("#lbldepartamento").html('');
	$("#lblprovincia").html('');
	$("#lbldistrito").html('');
	$("#lblzona").html('');
	$('input[name=txtid]').val('');
}

