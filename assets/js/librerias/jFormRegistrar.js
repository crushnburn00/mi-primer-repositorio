(function(window, document){

	var initLibFormReg = function(){
		var lib = {
			setElementStyle: function(element, styles){
				
				/*debugger;*/

				if(!element)
					return;
				if(typeof styles === "object"){
					
					var i = 0,
						stylesLength = 0,
						stylesArray = [],
						elementStyle = document.querySelector(element).styles;

					for(i in styles){
						if(styles.hasOwnProperty(i)){
							stylesArray.push(i);
						}
					}

					i = 0,
					stylesLength = stylesArray.length;

					for (;i <stylesLength ; i++) {
						elementStyle[stylesArray[i]] = styles[stylesArray[i]];
					}


				}else if(typeof styles === "string"){
					
					styles = styles.replace(/\s/g,""); // eliminar espacios en blanco
					var stylesSeparator = styles.indexOf(",") >= 1 ? ",":":" ,
						multipleStyles = styles.indexOf(";");

					/*console.log(document.querySelector(element).style);*/

					if(multipleStyles >= 0)
						return
					if(stylesSeparator == "," || stylesSeparator == ":"){
						styles = styles.split(stylesSeparator);
						if(document.querySelector(element).style[styles[0]] != undefined){
							document.querySelector(element).style[styles[0]] = styles[1];
						}else if(document.querySelector(element).style[styles[1]] != undefined){
							document.querySelector(element).style[styles[1]] = styles[0];
							}
					}
					
				}
			},
			añadirIcon: function(name){
				jQuery('#icon-plus-'+name).click(function(){
		        		jQuery('#div-'+name).addClass('hidden no-show');
		        		jQuery('#div-'+name+'1').removeClass('hidden no-show');
		    		});
			},

			regresarIcon: function(name){
				jQuery('#icon-cross-'+name).click(function(){
        				jQuery('#div-'+name+'1').addClass('hidden no-show');
        				jQuery('#div-'+name).removeClass('hidden no-show');
        				jQuery('#'+name+'1').val('');
    				});
			},


			guardarAjax: function( model , bid = true , desc = "" , btn = "" , redirect = true , btn_form_model = false , url_complement = ''){

				var _btn_min = '';
				var _btn_cap = '';
				var _submodel = '';
				var url_function = 'guardarAjax';

				if(btn != ''){
					_btn_min = btn.toLowerCase();
					_btn_cap = _btn_min.charAt(0).toUpperCase() + _btn_min.slice(1);
					
					if(!btn_form_model){
						_submodel = '_'+_btn_min;
						url_function = 'guardar'+_btn_cap+'Ajax';
					}
				}

				jQuery('body').on('click', '#btnGuardar'+_btn_cap,function(){

						if(bid)
							id = jQuery('input[name=txtid]').val();
						else
							id = 0;

						if(desc == "")
							desc = model;				

						jQuery('#modal_validacion .modal-title').html('');
						jQuery('#modal_validacion .modal-body').html('');

						if (confirm("SEGURO QUE DESEA GUARDAR LOS DATOS?")){
							var formData = new FormData(jQuery('#form_'+model+_submodel)[0]);

							jQuery.ajax({			
								url: rutaInicial + model+'/'+url_function+url_complement,
								type: 'POST',
								dataType: 'json',
								data: formData,
								processData: false,
								contentType: false,
								success: function(msj){
									if(msj.estado == 1){
										jQuery('#modal_validacion .modal-title').html('Registro Guardado! </br> Codigo de '+desc+': ' + msj.result.codigo);
										jQuery('#modal_validacion .modal-body').html('');
										jQuery('.modal-content').css('background-color','#00AF12');
										jQuery('.modal-content').css('color','#FFF');
										
										if(redirect){
											jQuery('#modal_validacion .modal-footer').html('Se redireccionará al Modulo '+desc+' en 2 segundos ... ');
											if(bid)
												setTimeout("location.href='"+rutaInicial+model+'/listar/'+id+"'",2000);
											else
												setTimeout("location.href='"+rutaInicial+model+"'",2000);
										}else{
											jQuery('#modal_validacion .modal-footer').html('Se recargará la página en 2 segundos ... ');
											setTimeout("location.href='"+window.location+"'",2000);											  
										}
									}else{
										if(msj.estado == -1){//para la guia de recepcion mp
											jQuery('#modal_validacion .modal-title').html(msj.mensaje);
											jQuery('.modal-content').css('background-color','#FFF');
											jQuery('.modal-content').css('color','gray');
											sesionValida(msj.result.btnSi + msj.result.btnNo, 'modal_validacion .modal-body');
											
										}else{
											jQuery('.modal-content').css('background-color','#FFF');
											jQuery('.modal-content').css('color','red');
											sesionValida(msj.mensaje , 'modal_validacion .modal-body');
										}
									}	
									jQuery('#modal_validacion').modal('show');
								}
							});
						}else			
							jQuery('#validacion_errores').html('');
						
						return false;
				});
			},

			calendarFecha: function( element ){
				jQuery( element ).datetimepicker({locale: 'es' , format: 'L'});
			},

			ajaxactualizar: function( id , id2, div ){
				console.log();
				$.ajax({
					url: rutaInicial + div + '/listarAjax',
					type: 'POST',
					dataType: 'json',
					data: { "id": 	id2 },
					success: function(msj){
						if(msj.estado == 1){
							jQuery('#'+div).html('<option value="0"> - Seleccionar - </option>');

							$.each(msj.result, function (i, item) {

								jQuery('#'+div).append(jQuery('<option>', {
								    value: item["id_"+div],
								    text : item.descripcion
								}));

							    jQuery("#"+div+" option[value="+ id +"]").attr("selected",true);
							});

						}else{
							jQuery('#'+div).html('<option value="0"> - Seleccionar - </option>');
							sesionValida(msj.mensaje , 'msj-avsol');
						}
					},
					error:  function (jqXHR, textStatus, errorThrown ) {
					       		errorAjax(jqXHR , textStatus);
					}
				});
			},

			guardarCampo: function( div, div2 , bdiv2 = true , bdiv1 = false ){
			$("#validacion_errores_div").fadeOut();

			const campos = [];
			campos['departamento'] = 'provincia';
			campos['provincia'] = 'distrito';
			campos['distrito'] = 'zona';
			
			
			jQuery('#icon-disk-'+div).click(function(){
				/*jQuery('#validacion_errores_div').removeClass('hidden no-show');*/
				
				if( !bdiv2 )
					value1 = 1;
				else
					value1 = jQuery('#'+div2).val();

				if( !bdiv1 )
					value2 = 1;
				else
					value2 = jQuery('#'+div+'2').val();

				value = jQuery('#'+div+'1').val();

				if(value !== ""){
					if( value1 > 0 ) {
						$.ajax({			
								url: rutaInicial + div+'/guardarAjax',
								type: 'POST',
								dataType: 'json',
								data:  { 	"value": value , "value1": value1 , "value2": value2},
								success: function(msj){
									$("#validacion_errores_div").fadeIn(100);
									if(msj.estado == 1){
										jQuery('#div-'+div+'1').addClass('hidden no-show');
										jQuery('#'+div+'1').val('');
				       					
				       					if(bdiv1){
				       						jQuery('#div-'+div+'2').addClass('hidden no-show');
				       						jQuery('#'+div+'2').val('');
				       					}
				       					jQuery('#div-'+div).removeClass('hidden no-show');
				       					lib.ajaxactualizar( msj.result['pid1'] , value1, div);
									    
				       					jQuery('#validacion_errores_div').css('color','green');
									  	
									}else{
										
										jQuery('#div-'+div+'1').addClass('hidden no-show');
				       					jQuery('#div-'+div).removeClass('hidden no-show');
										
				       					jQuery('#validacion_errores_div').css('color','red');

										if(msj.estado == 3){
											jQuery("#"+div+" option[value="+ msj.result['pid1'] +"]").attr("selected",true);
											jQuery('#'+div+'1').val('');
											if(campos[div] != undefined)
												lib.ajaxactualizar( 0 , msj.result['pid1'], campos[div]);
										}
									}
									jQuery('#validacion_errores_div').html(msj.mensaje);
									setTimeout(function() {$("#validacion_errores_div").fadeOut();},2000);
								}
						});
					}else{
						$("#validacion_errores_div").fadeIn(100);
				 		jQuery('#validacion_errores_div').html('Debe seleccionar un '+div2);
				 		setTimeout(function() {$("#validacion_errores_div").fadeOut();},2000);
				 	}
				 }else{
				 	$("#validacion_errores_div").fadeIn(100);
				 	jQuery('#validacion_errores_div').html('Debe ingresar un '+div);
				 	setTimeout(function() {$("#validacion_errores_div").fadeOut();},2000);
				 }
							
				return false;
				});
			},

			




		}
		return lib;
	}

	if(typeof window.initLibFormReg === "undefined"){
		window.initLibFormReg = initLibFormReg();
	}

})(window, document);