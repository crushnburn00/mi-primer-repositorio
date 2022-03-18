$(document).ready(function(){

	$('#btnGuardar').click(function(){
		$('#modal_validacion .modal-title').html('');
		$('#modal_validacion .modal-body').html('');

		if (confirm("SEGURO QUE DESEA GUARDAR LOS DATOS?")){

			var formData = new FormData($('#form_productor')[0]);


			$.ajax({			
				//method: 'post',
				url: rutaInicial + 'productor/guardarAjax',
				type: 'POST',
				dataType: 'json',
				data: formData,
				processData: false,
				contentType: false,
				success: function(msj){
					if(msj.estado == 1){

						$('#modal_validacion .modal-title').html('Registro Guardado! </br> Codigo de Productor: ' + msj.result.codigo);
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

								$('#modal_validacion .modal-footer').html('Se redireccionará al Modulo Modificar Productor en 3 segundos ... ');

							}
						}
						$('#modal_validacion .modal-footer').html('Se redireccionará al Modulo Productor en 2 segundos ... ');
						setTimeout("location.href='"+rutaInicial+'productor'+"'",2000);
						
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
		window.location.replace(rutaInicial + 'productor');
		return false;
	});


	

	$('#tipodoc').change(function(){


		if($('#tipodoc').val() == 1){
			$('#lblnrodoc').text($('#tipodoc option:selected').html());
			$('#lblrazonsocial').css("display", "none");
			$('#divrazonsocial').css("display", "none");
			$('#razonsocial').val('');
			$('#lblnombre').css("display", "block");
			$('#divnombre').css("display", "block");
			$('#lblApellido').css("display", "block");
			$('#divapellido').css("display", "block");
		}else{
			if($('#tipodoc').val() == 2){
				$('#lblrazonsocial').css("display", "block");
				$('#divrazonsocial').css("display", "block");
				$('#razonsocial').val('');
				$('#lblnombre').css("display", "none");
				$('#divnombre').css("display", "none");
				$('#lblApellido').css("display", "none");
				$('#divapellido').css("display", "none");
				$('#nombre').val('');
				$('#apellidos').val('');
			}else{
				$('#lblnrodoc').text('DNI / RUC');
				$('#lblrazonsocial').css("display", "none");
				$('#divrazonsocial').css("display", "none");
				$('#lblnombre').css("display", "none");
				$('#divnombre').css("display", "none");
				$('#lblApellido').css("display", "none");
				$('#divapellido').css("display", "none");
				$('#razonsocial').val('');
				$('#nombre').val('');
				$('#apellidos').val('');

			}
		}


		return false;
	});


	$('#tipodocCony').change(function(){

		$('#lblnrodocCony').text($('#tipodocCony option:selected').html());

		if($('#tipodocCony').val() == 1){
			$('#lblrazonsocialCony').css("display", "none");
			$('#divrazonsocialCony').css("display", "none");
			$('#lblnombreCony').css("display", "block");
			$('#divnombreCony').css("display", "block");
			$('#lblApellidoCony').css("display", "block");
			$('#divapellidoCony').css("display", "block");
		}else{
			if($('#tipodocCony').val() == 2){
				$('#lblrazonsocialCony').css("display", "block");
				$('#divrazonsocialCony').css("display", "block");
				$('#lblnombreCony').css("display", "none");
				$('#divnombreCony').css("display", "none");
				$('#lblApellidoCony').css("display", "none");
				$('#divapellidoCony').css("display", "none");
			}else{
				$('#lblrazonsocialCony').css("display", "none");
				$('#divrazonsocialCony').css("display", "none");
				$('#lblnombreCony').css("display", "none");
				$('#divnombreCony').css("display", "none");
				$('#lblApellidoCony').css("display", "none");
				$('#divapellidoCony').css("display", "none");
			}
		}


		return false;
	});




	$('#icon-delete-fecNacProd').click(function(){
        $('#fecNacProd').val('');
    });

    $('#icon-delete-fecNacCony').click(function(){
        $('#fecNacCony').val('');
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

    añadir( 'departamento' );
    regresar( 'departamento' );

    añadir( 'provincia' );
    regresar( 'provincia' );

    añadir( 'distrito' );
    regresar( 'distrito' );

    añadir( 'zona' );
    regresar( 'zona' );

    $('#icon-disk-departamento').click(function(){
		$('#validacion_errores_div').removeClass('hidden no-show');
		ajaxguardar( 'departamento' , 0 );
					
		return false;
	});


	$('#icon-disk-provincia').click(function(){
	 	$('#validacion_errores_div').removeClass('hidden no-show');
	 	value1 = $('#departamento').val();
	 	if( value1 > 0 ) {
			ajaxguardar( 'provincia' , value1 );
	 	}else{
	 		$('#validacion_errores_div').html('Debe seleccionar un Departamento');
	 	}		
		return false;
	});

	$('#icon-disk-distrito').click(function(){
	 	$('#validacion_errores_div').removeClass('hidden no-show');
	 	value1 = $('#provincia').val();
	 	if( value1 > 0 ) {
			ajaxguardar( 'distrito' , value1 );
	 	}else{
	 		$('#validacion_errores_div').html('Debe seleccionar una Provincia');
	 	}		
		return false;
	});

	$('#icon-disk-zona').click(function(){
	 	$('#validacion_errores_div').removeClass('hidden no-show');
	 	value1 = $('#distrito').val();
	 	if( value1 > 0 ) {
			ajaxguardar( 'zona' , value1 );
	 	}else{
	 		$('#validacion_errores_div').html('Debe seleccionar una Provincia');
	 	}		
		return false;
	});


	$('#telfijo', '#form_productor')

	.keydown(function (e) {
	    var key = e.which || e.charCode || e.keyCode || 0;
	    $phone = $(this);

	    // Don't let them remove the starting '(' //permitir caracteres de borrar y suprimir
	    if ($phone.val().length === 1 && (key === 8 || key === 46)) {
	        $phone.val('('); 
	        return false;
	    } 
	    // Reset if they highlight and type over first char.
	    else if ($phone.val().charAt(0) !== '(') {
	        $phone.val('('+$phone.val()); 
	    }

	    // Auto-format- do not expose the mask as the user begins to type
	    if (key !== 8 && key !== 9) {
	        if ($phone.val().length === 3) {
	            $phone.val($phone.val() + ')');
	        }
	        if ($phone.val().length === 4) {
	            $phone.val($phone.val() + ' ');
	        }           
	    }
	   
	    // Allow numeric (and tab, backspace, delete) keys only
	    return (key == 8 || 
	            key == 9 ||
	            key == 46 ||
	            (key >= 48 && key <= 57) ||
	            (key >= 96 && key <= 105)); 
	})

	.bind('focus click', function () {
	    $phone = $(this);

	    if ($phone.val().length === 0) {
	        $phone.val('(');
	    }
	    else {
	        var val = $phone.val();
	        $phone.val('').val(val); // Ensure cursor remains at the end
	    }
	})

	.blur(function () {
	    $phone = $(this);

	    if ($phone.val() === '(') {
	        $phone.val('');
	    }
	})
	.keyup(function (e) {
	    var key = e.which || e.charCode || e.keyCode || 0;
	    $phone = $(this);

	    if (($phone.val().charAt($phone.val().length - 1 ) == "(" || $phone.val().charAt($phone.val().length - 1 ) == ")")  && 
	    	($phone.val().length > 4 || $phone.val().length === 2 || $phone.val().length === 3  )) {
	    	 $phone.val($phone.val().substr(0, $phone.val().length - 1 ));
	    }

	});


});
	
function ajaxguardar( div , value1 ){
	$.ajax({			
				url: rutaInicial + div+'/guardarAjax',
				type: 'POST',
				dataType: 'json',
				data:  { 	"value": $('#'+div+'1').val() , "value1": value1 },
				success: function(msj){
					if(msj.estado == 1){
						$('#div-'+div+'1').addClass('hidden no-show');
       					$('#div-'+div).removeClass('hidden no-show');
       					$('#'+div+'1').val('');
       					ajaxactualizar( msj.result['pid1'] , value1, div);
       					$('#validacion_errores_div').html(msj.mensaje);
					}else{
						
						$('#div-'+div+'1').addClass('hidden no-show');
       					$('#div-'+div).removeClass('hidden no-show');
						
						$('#validacion_errores_div').html(msj.mensaje);

						if(msj.estado == 3){
							$("#"+div+" option[value="+ msj.result['pid1'] +"]").attr("selected",true);
							$('#'+div+'1').val('');
						}
					}	
				}
	});

}


function ajaxactualizar( id , id2, div ){

		$.ajax({
			url: rutaInicial + div + '/listarAjax',
			type: 'POST',
			dataType: 'json',
			data: { "id": 	id2 },
			success: function(msj){
				if(msj.estado == 1){
					$('#'+div).html('<option value="0"> - Seleccionar - </option>');

					$.each(msj.result, function (i, item) {

						if(div == "departamento"){
						    $('#'+div).append($('<option>', {
						        value: item.id_departamento,
						        text : item.descripcion
						    }));
					    }
					    else{
					    	if(div == "provincia"){
							    $('#'+div).append($('<option>', {
							        value: item.id_provincia,
							        text : item.descripcion
							    }));
						    }
						    else{
						    	if(div == "distrito"){
								    $('#'+div).append($('<option>', {
								        value: item.id_distrito,
								        text : item.descripcion
								    }));
							    }
							    else{
								    if(div == "zona"){
									    $('#'+div).append($('<option>', {
									        value: item.id_zona,
									        text : item.descripcion
									    }));
								    }
							    }
							}
						}

					    $("#"+div+" option[value="+ id +"]").attr("selected",true);
					});

				}else{
					$('#provincia').html('<option value="0"> - Seleccionar - </option>');
					sesionValida(msj.mensaje , 'msj-avsol');
				}
			},
			error:  function (jqXHR, textStatus, errorThrown ) {
			       		errorAjax(jqXHR , textStatus);
			}
		});
}


function añadir( name ){
	$('#icon-plus-'+name).click(function(){
        $('#div-'+name).addClass('hidden no-show');
        $('#div-'+name+'1').removeClass('hidden no-show');
    });
}

function regresar( name ){
	$('#icon-cross-'+name).click(function(){
        $('#div-'+name+'1').addClass('hidden no-show');
        $('#div-'+name).removeClass('hidden no-show');
        $('#'+name+'1').val('');
    });
}