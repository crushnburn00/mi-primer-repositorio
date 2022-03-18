
$(document).ready(function(){

    $("input").on("keypress", function () {
       $input = $(this);
       if($input.attr("id")!="email"){
	       setTimeout(function () {
	        $input.val($input.val().toUpperCase());
	       },50);
       }
      });

$('#btnGuardar').click(function(){

		id = $('input[name=txtid]').val();

		$('#modal_validacion .modal-title').html('');
		$('#modal_validacion .modal-body').html('');
		if (confirm("SEGURO QUE DESEA GUARDAR LOS DATOS?")){

			var formData = new FormData($('#form_finca')[0]);
			
			$.ajax({			
				//method: 'post',
				url: rutaInicial + 'finca/guardarAjax',
				type: 'POST',
				dataType: 'json',
				data: formData,
				processData: false,
				contentType: false,
				success: function(msj){
					if(msj.estado == 1){

						$('#modal_validacion .modal-title').html('Registro Guardado! </br> Codigo de Finca: ' + msj.result.codigo);
						$('#modal_validacion .modal-body').html('');
						$('.modal-content').css('background-color','#00AF12');
						$('.modal-content').css('color','#FFF');

						$('#modal_validacion .modal-footer').html('Se redireccionará al Modulo Finca en 2 segundos ... ');
						
						/*setTimeout("location.href='"+rutaInicial+'finca/listar/'+id+"'",2000);*/
						
		
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
		id = $('input[name=txtid]').val();
		window.location.replace(rutaInicial + 'finca/listar/'+id);
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


});


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