const _private = new WeakMap();
class Socio {

	constructor( id , tipodoc){
		const properties = {
			_id 	: id
		}
		_private.set(this,{properties});
	}

	get id(){
		return _private.get(this).properties['_id'];
	}

	set id( newid ){
		return _private.get(this).properties['_id'] = newid;
	}

	buscarProductor(idelement){
		
		$('#'+idelement).keyup(function () {

			if(($(this).val()).length > 3 ){
				//buscar dni
				$.ajax({			
				url: rutaInicial + 'productor/buscarxCodigoAjax',
				type: 'POST',
				dataType: 'json',
				data: 	$('#form_socio').serialize(),
				success: function(msj){
					if(msj.estado == 1){
						$('.tbody_div').html('');
						var html = '';
						$.each(msj.result, function (i, item) {
							html += '<div class="row2 form-group col-12 row_div">';
							html += '<div class="hidden" id="div_id_productor">'+item.id_productor+'</div>';
							html += '<div class="col-4" id="div_codigo">'+item.codigo+'</div>';
							html += '<div class="col-4" id="div_nro_documento">'+item.nro_documento+'</div>';
							html += '<div class="col-4" id="div_nombre_razon">'+item.nombre_razon+'</div>';

							html += '<div class="hidden" id="div_tipo_documento">'+item.tipo_documento+'</div>';
							html += '<div class="hidden" id="div_nombre">'+item.nombre+'</div>';
							html += '<div class="hidden" id="div_apellido">'+item.apellido+'</div>';
							html += '<div class="hidden" id="div_razon_social">'+item.razon_social+'</div>';
							html += '<div class="hidden" id="div_telefono_fijo">'+item.telefono_fijo+'</div>';
							html += '<div class="hidden" id="div_telefono_celular">'+item.telefono_celular+'</div>';
							html += '<div class="hidden" id="div_direccion">'+item.direccion+'</div>';
							html += '<div class="hidden" id="div_departamento">'+item.departamento+'</div>';
							html += '<div class="hidden" id="div_distrito">'+item.distrito+'</div>';
							html += '<div class="hidden" id="div_provincia">'+item.provincia+'</div>';
							html += '<div class="hidden" id="div_zona">'+item.zona+'</div>';
							html += '</div>';
						});
						$('.tbody_div').append(html);
					}else{
						$('.tbody_div').html('Resultado de la búsqueda');
					}	
				}

				});
			}else{
				$('.tbody_div').html('Resultado de la búsqueda');
			}	
		});
		
	}



	insideLista(){
		jQuery('body').on('click','.tbody_div .row_div',function(){

			jQuery('.inside').each(function(i, obj) {
			            jQuery( this ).removeClass( "inside" );
			});
			if(jQuery(this).hasClass( "inside" )){
			    jQuery( this ).removeClass( "inside" );
			}else{
			    jQuery( this ).addClass( "inside" );
			    $('#lblcodigo').html($('.inside #div_codigo').html());
			    $('#lblnrodoc').html($('.inside #div_nro_documento').html());
			    $('#lbltipodoc').html($('.inside #div_tipo_documento').html());
			    $('#lblnombres').html($('.inside #div_nombre').html());
			    $('#lblApellido').html($('.inside #div_apellido').html());
			    $('#lblrazonsocial').html($('.inside #div_razon_social').html());
			    $('#lbltelfijo').html($('.inside #div_telefono_fijo').html());
			    $('#lbltelfcelular').html($('.inside #div_telefono_celular').html());
			    $('#lbldireccion').html($('.inside #div_direccion').html());
			    $('#lbldepartamento').html($('.inside #div_departamento').html());
			    $('#lblprovincia').html($('.inside #div_provincia').html());
			    $('#lbldistrito').html($('.inside #div_distrito').html());
			    $('#lblzona').html($('.inside #div_zona').html());
				document.getElementsByName('txtid')[0].value = $('.inside #div_id_productor').html();

			}
		});
	}




}

