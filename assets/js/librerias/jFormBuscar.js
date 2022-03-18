(function(window, document){

	var initLibFormBuscar = function(){
		var lib = {
			ajaxListaBusqueda: function ( cantfilas , pagina , opcion , model , order_by = '1 desc'){
				
			    if( opcion == 1 ){
			        url = 'generarHtmlLista';
			        data = { "value":    cantfilas ,
			                "value1":    pagina ,
			            	"orderby" :  order_by };
			    }else{
			        url = 'buscarAjax';
			        data = jQuery('#form_busqueda'+model).serialize()+'&value='+cantfilas+'&value1='+pagina+'&orderby='+order_by;
			        
			    }

			    jQuery.ajax({
			        url: rutaInicial + model + '/'+ url,
			        type: 'POST',
			        dataType: 'json',
			        data: data,
			        success: function(msj){
			            if(msj.respuesta == 'Ok'){
			                finreg = pagina*cantfilas;
			                totalreg = msj.pag['TOTALREGISTROS'];

			                jQuery('.tbody_div').html( msj.lista );

			                jQuery('#nav_paginacion').html( msj.paginacion );
			                jQuery('#total_registros').html( totalreg );  
			                if(totalreg>0)
			                    jQuery('#ini_registro').html(((pagina-1)*cantfilas)+1); 
			                else
			                    jQuery('#ini_registro').html('0'); 

			                if( finreg > totalreg ) 
			                    jQuery('#fin_registro').html(totalreg); 
			                else
			                    jQuery('#fin_registro').html(finreg); 
			            }else{
			                if(msj.respuesta =='Login')
			                    window.location.replace(rutaInicial);
			            }
			        }/*,
			        error:  function (jqXHR, textStatus, errorThrown ) {
			            errorAjax(jqXHR , textStatus);
			        }*/
			    });
			},

			changeFilas:function( model ){
				jQuery('select[name="cboCanFilas"').change(function(){
			        value = jQuery('select[name="cboCanFilas"] option:selected').text();
			        value1 = 1;

			        if( jQuery('.tbus_div').length > 0 ){
			            //corregirFormBusqueda();
			            ajaxListaBusqueda( value , value1 , 2, model);
			        }else{
			            ajaxListaBusqueda( value , value1 , 1, model);
			        }
			    });
			},

			changePage:function( model ){
			    jQuery('body').on('click','.getPaginacion',function(){
			        value = jQuery('select[name="cboCanFilas"] option:selected').text();
			        value1 = jQuery(this).attr('href');

			        //if( jQuery('.tbus_div').length > 0 ){
			            //corregirFormBusqueda();
			            ajaxListaBusqueda( value , value1 , 2, model);
			        /*}else{
			            ajaxListaBusqueda( value , value1 , 1, model);
			        }*/
			        
			        return false;
			    });
			},

			inputForm:function( model ){
			    jQuery('#form_busqueda'+model).on( "input", ".busqueda-"+model, function(){
			        value = jQuery('select[name="cboCanFilas"] option:selected').text();
			        value1 = 1;
			        
			        ajaxListaBusqueda( value , value1 , 2 , model);
			    });
			},

			ordenarTabla:function(model){
			    jQuery('body').on('click','.div_icon_orden',function(){
			    	
			    	var _div = this;
			    	var name = this.getAttribute("data");
			    	var _icon = _div.children;
			    	var _icon = _icon[0];
			    	console.log(name);
			    	var hasClaseasc = _icon.classList.contains( 'icon-sort-alpha-asc' );
			    	var hasClasedesc = _icon.classList.contains( 'icon-sort-alpha-desc' );
			    	var orden = '';

			    	//eliminar los iconos de los demás items
			    	$('.div_icon_orden').each(function(indice, elemento) {
			    		var name2 = this.getAttribute("data");
			    		if(name2 != name)
			    			jQuery("#icon-orden-"+name2).removeClass( "icon-sort-alpha-asc" );
				    		jQuery("#icon-orden-"+name2).removeClass( "icon-sort-alpha-desc" );
					});

			    	//actualizar el icono
			    	if(hasClaseasc){
			    		jQuery("#icon-orden-"+name).removeClass( "icon-sort-alpha-asc" );
			    		jQuery("#icon-orden-"+name).addClass( "icon-sort-alpha-desc" );
			    		orden = ' desc';
			    	}else{
				    	if(hasClasedesc){
				    		jQuery("#icon-orden-"+name).removeClass( "icon-sort-alpha-asc" );
				    		jQuery("#icon-orden-"+name).removeClass( "icon-sort-alpha-desc" );
				    		orden = '';
				    		name = '';
				    	}else{
				    		jQuery("#icon-orden-"+name).addClass( "icon-sort-alpha-asc" );
				    		orden = ' asc';
				    	}
				    }

				    value = jQuery('select[name="cboCanFilas"] option:selected').text();
				    orderby = name+orden;

					lib.ajaxListaBusqueda( value , 1 , 2 , model , orderby);
			    });
			},





		}
		return lib;
	}

	if(typeof window.initLibFormBuscar === "undefined"){
		window.initLibFormBuscar = initLibFormBuscar();
	}

})(window, document);