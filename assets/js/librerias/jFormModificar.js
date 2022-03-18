(function(window, document){
	var initLibFormModificar = function(){
		var lib = {
			habilitarEdicion: function( nombreDiv ){
			    jQuery(nombreDiv + " .show").each(function(){
			        jQuery(this).removeClass("show");
			        jQuery(this).addClass("hidden");
			    });

			    jQuery(nombreDiv + " .required1").each(function(){
			        jQuery(this).removeClass("required1");
			        jQuery(this).addClass("required");
			    });

			    jQuery(nombreDiv + " .hidden.no-show").each(function(){
			        jQuery(this).removeClass("hidden");
			    });

			    jQuery(nombreDiv + " label").each(function(){
			        campo = '#'+ jQuery(this).attr("for");
			        value = jQuery(this).text();
			        jQuery(campo).val(value);
			    });
			},

			habilitarBotonesEdicion: function( desc ){
			    jQuery("#div-btnGuardar"+desc).css('display','block');
			    jQuery("#btnCancelar"+desc).css('display','block');

			    jQuery("#btnGuardar"+desc).removeAttr("disabled");
			    jQuery("#btnCancelar"+desc).removeAttr("disabled");
			    jQuery('#btnEditar'+desc).attr("disabled" , '"disabled');
			},

			deshabilitarBotonesEdicion: function( desc ){
			    jQuery("#div-btnGuardar"+desc).css('display','none');
			    jQuery("#btnCancelar"+desc).css('display','none');

			    jQuery("#btnGuardar"+desc).attr("disabled","disabled");
			    jQuery("#btnCancelar"+desc).attr("disabled","disabled");
			    jQuery('#btnEditar'+desc).removeAttr("disabled" , '"disabled');

			},

			deshabilitarEdicion: function( nombreDiv ){
			    jQuery(nombreDiv + " .hidden").each(function(){
			        jQuery(this).removeClass("hidden");
			        jQuery(this).addClass("show");
			    });

			    jQuery(nombreDiv + " .no-show").each(function(){
			        jQuery(this).addClass("hidden");
			    });

			    jQuery(nombreDiv + " .required").each(function(){
			        jQuery(this).removeClass("required");
			        jQuery(this).addClass("required1");
			    });
			},

			validarCambios: function( nombreDiv ){

			    cambio = false;
			    jQuery(nombreDiv + ' input[type="text"]').each(function(){
			        campoid = jQuery(this).attr("id");
			        value = jQuery(this).val();
			        value1 = jQuery('label[for="'+ campoid +'"]').text();

			        if(value != value1){
			            cambio = true;
			            return false; // break
			        }
			    });

			    jQuery(nombreDiv + ' select').each(function(){
			        campoid = jQuery(this).attr("id");
			        value = jQuery(this).val();
			        value1 = jQuery('label[for="'+ campoid +'"]').text();

			        if(value != value1){
			            cambio = true;
			            return false; // break
			        }
			    });

			    jQuery(nombreDiv + ' textarea').each(function(){
			        campoid = jQuery(this).attr("id");
			        value = jQuery(this).val();
			        value1 = jQuery('label[for="'+ campoid +'"]').text();
			        if(value != value1){
			            cambio = true;
			            return false; // break
			        }
			    });

			    return cambio;
			},

			cancelarCambios: function(){
			    jQuery('#modal_validacion .modal-title').html('No se realizó ningún cambio');
			    jQuery('#modal_validacion .modal-body').html('Click en al botón CANCELAR para retroceder.');
			    jQuery('#modal_validacion').modal('show');   
			},

			actualizarForm: function ( nombreDiv ){
			    jQuery(nombreDiv + " label").each(function(){
			        campo = '#'+ jQuery(this).attr("for");
			        value = jQuery(campo).val();
			        jQuery(this).text(value);
			    });

			    jQuery(nombreDiv + " select").each(function(){
			        //campo = '#'+ jQuery(this).attr("for");
			        campo = jQuery(this).attr("id");
			        value = jQuery( '#' + campo + ' option:selected').text();
			        
			        if(value == " - Seleccionar - ") 
			            value = "";
			        
			        jQuery('#lbl' + campo).text(value);
			        
			    });
			},

			clickBtnEditar: function(model){
				var _model_min = model.toLowerCase();
				var _model_may = _model_min.charAt(0).toUpperCase() + _model_min.slice(1);
				
				$('#btnEditar'+_model_may).click(function(){

			        lib.habilitarEdicion('#div-'+_model_min);
			        lib.habilitarBotonesEdicion( _model_may );

			        return false;
			    });
			},

			clickBtnCancelar: function(model){
				var _model_min = model.toLowerCase();
				var _model_Capital = _model_min.charAt(0).toUpperCase() + _model_min.slice(1);

				$('#btnCancelar'+_model_Capital).click(function(){
			        lib.deshabilitarEdicion('#div-'+_model_min);
			        lib.deshabilitarBotonesEdicion( _model_Capital );

			        return false;
			    });
			},

			clickActualizar: function( model , model_url = "", recargar = false){
				var _model_min = model.toLowerCase();
				var _model_Capital = _model_min.charAt(0).toUpperCase() + _model_min.slice(1);
				var _model_may = model.toUpperCase();
				if(model_url == "")
					model_url = model;

			    $('#btnGuardar'+_model_Capital).click(function(){
			        $('#validacion_'+_model_min).html('');
			        /*verificar si hay cambios cambios*/
			        if(lib.validarCambios('#div-'+_model_min)){

			            if (confirm("SEGURO QUE DESEA MODIFICAR LOS DATOS DEL "+_model_may+"?")){
			                $.ajax({            
			                    //method: 'post',
			                    url: rutaInicial + model_url+'/actualizarAjax',
			                    type: 'POST',
			                    dataType: 'json',
			                    data: $('#form_'+_model_min+'detalle').serialize(),
			                    success: function(msj){
			                        if(msj.estado == 1){
			                            lib.actualizarForm('#div-'+_model_min);
			                            $('#btnCancelar'+_model_Capital).click();

			                            if(recargar){
			                            	location.reload();
			                            }
			                            
			                        }else{
			                            $('#validacion_'+_model_min).html(msj.mensaje);
			                            $('#validacion_'+_model_min).css('color','red');
			                        }
			                    }
			                });
			            }else{          
			                $('#validacion_errores').html('');
			            }
			        }else{
			            lib.cancelarCambios();
			        }
			        return false;
			    });
			},
			
			calendarFecha( element ){
				$( element ).datetimepicker({locale: 'es' , format: 'L'});
			},

			clickBtnAdicionarFila: function( idBtn , form ){

				$('#'+idBtn).click(function(){		        
			        lib.habilitarBotonesEdicion( form );

			        return false;
			    });
			},

			clickActualizarFila: function( form , btn, desc , model_url , function_url ){

				var _model_min = form.toLowerCase();

			    $('#btnGuardar'+btn).click(function(){
			    	
			        $('#validacion_'+_model_min).html('');
			        
			        //if(lib.cancelarCambiosFila('#div-'+_model_min)){

			            if (confirm("SEGURO QUE DESEA MODIFICAR LOS DATOS DEL "+desc+"?")){
			                $.ajax({            
			                    //method: 'post',
			                    url: rutaInicial + model_url+'/'+function_url,
			                    type: 'POST',
			                    dataType: 'json',
			                    data: $('#form_'+_model_min+'detalle').serialize(),
			                    success: function(msj){
			                        if(msj.estado == 1){
			                            location.reload();
			                            
			                        }else{
			                            $('#validacion_'+_model_min).html(msj.mensaje);
			                            $('#validacion_'+_model_min).css('color','red');
			                        }
			                    }
			                });
			            }else{          
			                $('#validacion_errores').html('');
			            }
			        //}else{
			       //     lib.cancelarCambiosFila();
			        //}
			        return false;
			    });
			},

		}
		return lib;
	}

	if(typeof window.initLibFormModificar === "undefined"){
		window.initLibFormModificar = initLibFormModificar();
	}

})(window, document);