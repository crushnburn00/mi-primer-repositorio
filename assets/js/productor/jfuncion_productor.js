$(document).ready(function(){
	$('#fecIniBus').datetimepicker({locale: 'es' , format: 'L'});
    $('#fecFinBus').datetimepicker({locale: 'es' , format: 'L'});
    $('#fecNacProd').datetimepicker({locale: 'es' , format: 'L'});
    $('#fecNacCony').datetimepicker({locale: 'es' , format: 'L'});

    $("input").on("keypress", function () {
       $input = $(this);
       if($input.attr("id")!="email"){
	       setTimeout(function () {
	        $input.val($input.val().toUpperCase());
	       },50);
       }
      });

    $('body').on('click','.icon-orden',function(){
    	console.log('cambiar a orden');
    return false;
    });



});

     



function ajaxprovincia( texto = "Seleccionar"){

		$.ajax({
			url: rutaInicial + 'provincia/listarAjax',
			type: 'POST',
			dataType: 'json',
			data: { "id": 	$('#departamento').val()
			},
			success: function(msj){
				if(msj.estado == 1){
					$('#provincia').html('<option value="0"> - '+texto+' - </option>');

					$.each(msj.result, function (i, item) {

					    $('#provincia').append($('<option>', {
					        value: item.id_provincia,
					        text : item.descripcion
					    }));
					});

				}else{
					$('#provincia').html('<option value="0"> - '+texto+' - </option>');
					sesionValida(msj.mensaje , 'msj-avsol');
				}
			},
			error:  function (jqXHR, textStatus, errorThrown ) {
			       		errorAjax(jqXHR , textStatus);
			}
		});
}


function ajaxdistrito( texto = "Seleccionar"){

		$.ajax({
			url: rutaInicial + 'distrito/listarAjax',
			type: 'POST',
			dataType: 'json',
			data: { "id": 	$('#provincia').val()
			},
			success: function(msj){
				if(msj.estado == 1){
					$('#distrito').html('<option value="0"> - '+texto+' - </option>');

					$.each(msj.result, function (i, item) {

					    $('#distrito').append($('<option>', {
					        value: item.id_distrito,
					        text : item.descripcion
					    }));
					});

				}else{
					$('#distrito').html('<option value="0"> - '+texto+' - </option>');
					sesionValida(msj.mensaje , 'msj-avsol');
				}
			},
			error:  function (jqXHR, textStatus, errorThrown ) {
			       		errorAjax(jqXHR , textStatus);
			}
		});
}


function ajaxzona( texto = "Seleccionar"){

		$.ajax({
			url: rutaInicial + 'zona/listarAjax',
			type: 'POST',
			dataType: 'json',
			data: { "id": 	$('#distrito').val()
			},
			success: function(msj){
				if(msj.estado == 1){
					$('#zona').html('<option value="0"> - '+texto+' - </option>');

					$.each(msj.result, function (i, item) {

					    $('#zona').append($('<option>', {
					        value: item.id_zona,
					        text : item.descripcion
					    }));
					});

				}else{
					$('#zona').html('<option value="0"> - '+texto+' - </option>');
					sesionValida(msj.mensaje , 'msj-avsol');
				}
			},
			error:  function (jqXHR, textStatus, errorThrown ) {
			       		errorAjax(jqXHR , textStatus);
			}
		});
}