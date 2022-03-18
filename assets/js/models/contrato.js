
const _private = new WeakMap();
class Contrato {

	constructor( id ){
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


	clickRedirectId( element, url_corta ){
		jQuery('body').on( "click", element, function(){
			window.location.replace(rutaInicial+'contrato/'+url_corta);
			return false;
     	});
	}

	clickCancelar( element ){
		jQuery( element ).click(function(){
			window.location.replace(rutaInicial + 'contrato');
			return false;
		});
	}

	/*buscarCliente(){
		jQuery('#codigocliente').on( "input", function(){

			if( (jQuery(this).val()).length >= 11 ){

				jQuery('#msj-busubi').html('Buscando el cliente ... ');

					$.ajax({			
						url: rutaInicial + 'cliente/buscarxCodigoAjax',
						type: 'POST',
						dataType: 'json',
						data: { "value":  jQuery(this).val() },
						success: function(msj){
							
							if(msj.estado == 1){
								jQuery('#msj-busubi').html('Se encontró '+msj.result['TOTALREGISTROS']+' coincidencia(s).');
								if(msj.result['TOTALREGISTROS'] == 1){
									jQuery('#lblfloid').html(msj.result['flo_id']);
									jQuery('#lblcliente').html(msj.result['razon_social']);
									jQuery('input[name="txtcliente"]').val(msj.result['id_cliente']);
									
								}else{
									jQuery('#msj-busubi').append('Debe intentar realizar filtros adicionales.');
								}
							}else{
								jQuery('#msj-busubi').html('No se encontraron coincidencias.');
								jQuery('#lblfloid').html('');
								jQuery('#lblcliente').html('');

							}	
						}
					});

			}else{
				jQuery('#lblfloid').html('');
				jQuery('#lblcliente').html('');
				if( (jQuery(this).val()).length == 0 ){
					jQuery('#msj-busubi').html('');
				}else{
					jQuery('#msj-busubi').html('Completar el codigo de cliente');
				}
			}
		});

	}*/



	sumval(val1 , val2 , element){
		var val_result = (val1*1)+(val2*1);
		val_result = val_result.toFixed(2);
		jQuery('#'+element).val(val_result);
		return val_result;
	}

	multival(val1 , val2 , element , b_lb = ''){
		var val_result = 0;
		if(b_lb == "LB")
			val_result = (val1*1)*(val2*1);
		else 
			val_result = (val1*1)*(val2*1)*100;		

		val_result = val_result.toFixed(2);
		jQuery('#'+element).val(val_result);
		return val_result;
	}

	camposCalculados(){
		this.pesoNetoKg( 'totalSacos' );
		this.pesoNetoKg( 'pesoSacoKg' );

		this.putotal( 'precioNivelFijacion' );
		this.putotal( 'diferencial' );
		this.putotal( 'notaCredito' );
		this.putotal( 'gastosExp' );
		this.faturaren();

	}


	faturaren( _class = this ){
		jQuery('body').on("change", '#facturaen' , function () {
			_class.facturar( _class );
		});
	}



	putotal(element , _class = this ){
		jQuery('body').on("input", '#'+element , function () {
			_class._putotal(_class);
			
		});
	}

	_putotal(_class){
		var val1 = jQuery('#precioNivelFijacion').val();
		var val2 = jQuery('#diferencial').val();
		var val_result = _class.sumval(val1 , val2 , 'puTotala');

		var val3 = jQuery('#notaCredito').val();
		val_result = _class.sumval(val_result , val3 , 'puTotalb');

		var val4 = jQuery('#gastosExp').val();			
		val_result = _class.sumval(val_result , val4 , 'puTotalc');
		_class.facturar( _class );
	}


	facturar( _class = this ){
		var val5 = 0;
		var option = '';

		if(jQuery('select[name="cboFacturar"] option:selected').text() == "LB"){
			val5 = jQuery('#kgNetoLB').val();
			option = "LB";
		}
		if(jQuery('select[name="cboFacturar"] option:selected').text() == "QQ"){
			val5 = jQuery('#kgNetoQQ').val();
			option = "QQ";
		}

		if(jQuery('select[name="cboFacturar"] option:selected').val() == 0)
			jQuery('#facturaen').addClass("border_red");
		else
			jQuery('#facturaen').removeClass("border_red");
			
		var val6 = jQuery('#puTotala').val();
		_class.multival(val5 , val6 , 'facturar1', option);
			
		val6 = jQuery('#puTotalb').val();
		_class.multival(val5 , val6 , 'facturar2', option);

		val6 = jQuery('#puTotalc').val();			
		_class.multival(val5 , val6 , 'facturar3', option);
	}

	pesoNetoKg( element , _class = this){
		jQuery('body').on("input", '#'+element , function () {
			var val1 = jQuery('#totalSacos').val();
			var val2 = jQuery('#pesoSacoKg').val();
			var val_result = val1*val2;
			jQuery('#pesoNetoKg').val(val_result);

			var value = val_result/46;
			value = value.toFixed(2);
			jQuery('#kgNetoQQ').val(value);

			value = val_result*2.20462;
			value = value.toFixed(2);
			jQuery('#kgNetoLB').val(value);
			_class.facturar( _class );
		});
	}

	btnRegistrarAsignacion( ){
		jQuery('#btnRegistrarAsignacion').click(function(){
			//jQuery('#pesoNetoKg2').removeAttr("disabled");
			jQuery('#kgpergamino').removeAttr("disabled");
			//jQuery('#rendimiento').removeAttr("disabled");
			//jQuery('#pesonetoqq').removeAttr("disabled");
			jQuery('#btnGuardarAsigContrato').removeAttr("disabled");
			jQuery('#btnCancelarAsigContrato').removeAttr("disabled");
			//jQuery('#totalkgpergamino').removeAttr("disabled");

			jQuery('#div-btnGuardarAsigContrato').css('display','block');
			jQuery('#div-btnCancelarAsigContrato').css('display','block');
			
			jQuery('#btnRegistrarAsignacion').attr('disabled','disabled');
			return false;
		});
	}

	btnCancelarAsigContrato(){
		jQuery('#btnCancelarAsigContrato').click(function(){
			//jQuery('#pesoNetoKg2').attr('disabled','disabled');
			jQuery('#kgpergamino').attr('disabled','disabled');
			//jQuery('#rendimiento').attr('disabled','disabled');
			//jQuery('#pesonetoqq').attr('disabled','disabled');
			jQuery('#btnGuardarAsigContrato').attr('disabled','disabled');
			jQuery('#btnCancelarAsigContrato').attr('disabled','disabled');
			//jQuery('#totalkgpergamino').attr('disabled','disabled');

			jQuery('#div-btnGuardarAsigContrato').css('display','none');
			jQuery('#div-btnCancelarAsigContrato').css('display','none');
			
			jQuery('#btnRegistrarAsignacion').removeAttr("disabled");
			return false;
		});

	}

	selectkgpergamino(){
		jQuery('#kgpergamino').change(function(){
			var texto = $('#kgpergamino option:selected').text();
			texto = texto.replace(/ /g,"");
			texto = texto.replace(/%/,"");
			var partes = texto.split("|");
			$('#kgpergamino2').val(partes[0]);
			
			if(partes.length>1){
				var rendimiento = partes[1].split("-");
				$('#rendimiento').val(rendimiento[0]);
				var pesonetoqq = jQuery('#pesonetoqq').val();
				var total = pesonetoqq * partes[0];
				total = total.toFixed(2);
				$('#totalkgpergamino').val(total);
			}else{
				$('#kgpergamino2').val('');
				$('#rendimiento').val('');
			}
			jQuery('#pesonetoqq').val();

		});
	}

	clickGuardarAsigContrato(){
		$('#btnGuardarAsigContrato').click(function(){
			$('#validacion_AsigContrato').html('');
			        /*verificar si hay cambios cambios*/
			    if (confirm("SEGURO QUE DESEA GUARDAR LOS DATOS?")){
			        $.ajax({            
			                    //method: 'post',
			            url: rutaInicial +'Contrato/actualizarAsignarAjax',
			            type: 'POST',
			            dataType: 'json',
			            data: $('#form_asignarcontratodetalle').serialize(),
			            success: function(msj){
			                if(msj.estado == 1){
			                    
			                    $('#btnCancelarAsigContrato').click();
			                    location.reload();
			                            
			                }else{
			                    $('#validacion_AsigContrato').html(msj.mensaje);
			                    $('#validacion_AsigContrato').css('color','red');
			                }
			            }
			        });
			    }else{          
			        $('#validacion_AsigContrato').html('');
			    }
			        
			return false;
		});
	}

	selectestfijacion( _class = this ){
		$('#estfijacion').change(function(){
			var est = $('#estfijacion').val();
			if( est == 6 ){
				$('#precioNivelFijacion').removeAttr('readonly');
				var d = new Date(); 
				var month = d.getMonth()+1; 
				var day = d.getDate(); 
				var output = (day<10 ? '0' : '') + day +'/'+ (month<10 ? '0' : '') + month + '/' + d.getFullYear();
				$('#fecfijacioncontrato').val(output);
				$('#precioNivelFijacion').val('');
			}else{
				if( est == 7 ){
					var pre = $('#precio').val();
					$('#precioNivelFijacion').val(pre);
				}else{
					$('#precioNivelFijacion').val('');
				}
					$('#fecfijacioncontrato').attr('readonly', 'readonly');
					$('#precioNivelFijacion').attr('readonly', 'readonly');	
					$('#fecfijacioncontrato').val('');
				
				
			}
			_class._putotal(_class);
			return false;
		});
	}

	buscarCliente(idelement){
		
		$('#'+idelement).keyup(function () {

			if(($(this).val()).length > 3 ){
				//buscar dni
				$.ajax({			
				url: rutaInicial + 'cliente/buscarxCodigoAjax',
				type: 'POST',
				dataType: 'json',
				data: 	$('#form_contrato').serialize(),
				success: function(msj){
					if(msj.estado == 1){
						$('.tbody_div').html('');
						var html = '';
						$.each(msj.result, function (i, item) {
							html += '<div class="row2 form-group col-12 row_div">';
							html += '<div class="hidden" id="div_id_cliente">'+item.id_cliente+'</div>';
							html += '<div class="col-4" id="div_codigo">'+item.codigo+'</div>';
							html += '<div class="col-4" id="div_nro_documento">'+item.nro_documento+'</div>';
							html += '<div class="col-4" id="div_razon_social">'+item.razon_social+'</div>';

							html += '<div class="hidden" id="div_flo_id">'+item.flo_id+'</div>';
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
			    $('#lblcodigocliente').html($('.inside #div_codigo').html());
			    $('#lblfloid').html($('.inside #div_nro_documento').html());
			    $('#lblcliente').html($('.inside #div_razon_social').html());
			    
				document.getElementsByName('txtcliente')[0].value = $('.inside #div_id_cliente').html();

			}
		});
	}



}

