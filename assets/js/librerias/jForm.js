(function(window, document){

	var initLibForm = function(){
		var lib = {
			
			calendarFecha( element ){
				$( element ).datetimepicker({locale: 'es' , format: 'L'});
			},

			actualizarSelect: function( texto = "Seleccionar" , element_change, element  ){

				$('#'+element_change).change(function(){
					jQuery.ajax({
						url: rutaInicial + element+'/listarAjax',
						type: 'POST',
						dataType: 'json',
						data: { "id": 	jQuery('#'+element_change).val() },
						success: function(msj){
							jQuery("#"+element).empty();
							const $cbo = document.querySelector("#"+element);
							const option = document.createElement('option');
							option.value = 0;
							option.text = "- "+texto+" -";
							$cbo.appendChild(option);
							if(msj.estado == 1){
								jQuery.each(msj.result, function (i, item) {
									const option1 = document.createElement('option');
									option1.value = item['id_'+element];
									option1.text = item.descripcion;
									$cbo.appendChild(option1);
								});
							}else{
								sesionValida(msj.mensaje , 'msj-avsol');
							}
						},
						error:  function (jqXHR, textStatus, errorThrown ) {
						       		errorAjax(jqXHR , textStatus);
						}
					});
					return false;
				})
			},



			btnAdicionarFilaInspeccion: function( _sufito = "" , div_element , div_id , cant_element_fila, tamaño = "" ){
				
				var resp = jQuery.ajax({
						url: rutaInicial + 'inspeccion/getVariedadCafe',
						type: 'POST',
						dataType: 'json',
						data: { "id": 	0 },
							success: function(msj){
								var cafe1 = msj;
								lib.btnAdicionarFila( _sufito , div_element , div_id , cant_element_fila, tamaño , true , cafe1, "textarea");				
							},
							error:  function (jqXHR, textStatus, errorThrown ) {
								errorAjax(jqXHR , textStatus);
							}
				});
				
			},


			btnAdicionarFila: function( _sufito = "" , div_element , div_id , cant_element_fila, tamaño = "" , item_primera_columna = false , array_cafe = "" , tipo_campo = "input" , readonly = ""){
				
				var array_variedad_cafe;
				var aTam = 0;
				if(typeof array_cafe === "object"){
					array_variedad_cafe = array_cafe.aVariedadCafe;
					aTam = array_cafe.aTamaño;
				}else{
					array_variedad_cafe = "";
				}

				jQuery('#btnAdicionarFila'+_sufito).click(function(){
					value = jQuery('input[name="'+div_id+'"]').val();
					value++;
					const $div = document.querySelector(div_element);

					const div_row = document.createElement('div');
					div_row.classList.add("col-12");
					div_row.classList.add("row");
					div_row.classList.add("row_div2");
					div_row.classList.add("class_fila"+_sufito);
					div_row.setAttribute('id', 'div_fila'+_sufito+'_'+value);

					if(typeof tamaño === "string"){
						if(tamaño == "")
						tamaño = 12/cant_element_fila;
					}else{
						/*if(typeof tamaño === "object"){
							if(tamaño.length == cant_element_fila){
								
							}
						}
						console.log(typeof tamaño);*/
					}


					for(i = 0 ; i < cant_element_fila ; i++ ){
						const div_input = document.createElement('div');
						if(typeof tamaño === "object"){
							div_input.classList.add("col-md-"+tamaño[i]);
						}
						else{
							div_input.classList.add("col-md-"+tamaño);
						}

						id_input = (i+1);
						if(item_primera_columna)
							id_input = id_input-1;

						if(item_primera_columna && i==0){

							label = document.createElement("label");
							label.innerHTML = value+1;
							div_input.appendChild(label);
							
							
						}else{
							
							bool_input = true;


							if(i == 1 && (typeof array_variedad_cafe) === "object"){
								
								for (var j = 1; j < aTam; j++) {
									
									div_input.classList.add("pre-scrollable_insp");
									
									input = document.createElement("input");
									input.setAttribute('type', 'checkbox');
									input.setAttribute('name', 'chk'+_sufito+"_"+value+"[]");
									input.setAttribute('value', (j+1) );
									input.setAttribute('class', 'col-md-2');
									const div_input_span = document.createElement('label');
									div_input_span.setAttribute('class', 'col-md-10');
									div_input_span.innerHTML = array_variedad_cafe[j];
									div_input.appendChild(input);
									div_input.appendChild(div_input_span);
								}
								bool_input = false;
								
							}else{
								
								if(i == (cant_element_fila - 1 ) && _sufito == "Conformidad" ){
									input = document.createElement("select");
									option = document.createElement("option");
									option.text = "- Seleccionar -";
									option.value = -1;
									input.add(option);
									var option = document.createElement("option");
									option.text = "Por resolver";
									option.value = 2;
									input.add(option);
									option = document.createElement("option");
									option.text = "Si";
									option.value = 1;
									input.add(option);
									option = document.createElement("option");
									option.text = "No";
									option.value = 0;
									input.add(option);
									
								}else{
									input = document.createElement(tipo_campo);
									input.setAttribute('autocomplete', 'off');
									input.setAttribute('type', 'text');
									
								}
								input.setAttribute('class', 'form-control form-control-sm');
								input.setAttribute('name', 'txtinput'+_sufito+id_input+"_"+value);
								if(typeof readonly === "object")
									if(readonly[i])
									input.setAttribute('readonly', 'readonly');
							}

							
							if(bool_input){
							if(i < (cant_element_fila-1)){
								div_input.appendChild(input);
								
							}else{

								div_input.classList.add("form-group");
								div_input.classList.add("row");
								const div_input_hijo = document.createElement('div');
								div_input_hijo.classList.add("col-10");
								div_input_hijo.classList.add("col-md-11");
								div_input_hijo.classList.add("div_input");

								div_input_hijo.appendChild(input);
								div_input.appendChild(div_input_hijo);

								const div_icon = document.createElement('div');
								div_icon.classList.add("col-2");
								div_icon.classList.add("col-md-1");
								div_icon.classList.add("div_icon");

								icon = document.createElement("span");
								icon.setAttribute('class', 'icon-cross');
								icon.setAttribute('id', 'icon_'+value);
								div_icon.appendChild(icon);
								div_input.appendChild(div_icon);
							}
						}
						}
						div_row.appendChild(div_input);
						
					}
	
					$div.appendChild(div_row);
					jQuery('input[name="'+div_id+'"]').val(value);
					return false;
				});
			},

			btnEliminarFila: function(element){
				jQuery(element).on( "click", ".icon-cross", function(){
			        jQuery(this).parent().parent().parent().remove(); 
			    });
			},
			mayusKeyPress:function(){
				jQuery("body").on("keypress","input", function () {
			       $input = jQuery(this);
			       if($input.attr("id")!="email"){
				       setTimeout(function () {
				        $input.val($input.val().toUpperCase());
				       },50);
			       }
			    });

			    jQuery("body").on("keypress","textarea", function () {
			       $input = jQuery(this);
			       if($input.attr("id")!="email"){
				       setTimeout(function () {
				        $input.val($input.val().toUpperCase());
				       },50);
			       }
			    });

			},

			insideLista: function(){
			    jQuery('body').on('click','.tbody_div .row_div',function(){

			        jQuery('.inside').each(function(i, obj) {
			            jQuery( this ).removeClass( "inside" );
			        });
			        if(jQuery(this).hasClass( "inside" )){
			            jQuery( this ).removeClass( "inside" );
			        }else{
			            jQuery( this ).addClass( "inside" );
			        }
			    });
			},

		}
		return lib;
	}

	if(typeof window.initLibForm === "undefined"){
		window.initLibForm = initLibForm();
	}

})(window, document);