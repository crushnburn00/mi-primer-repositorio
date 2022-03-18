const _private = new WeakMap();
class ClienteComercial {

	constructor( id , nombre){
		const properties = {
			_id 	: id,
			_nombre : nombre
		}
		_private.set(this,{properties});
	}

	get id(){
		return _private.get(this).properties['_id'];
	}

	set id( newid ){
		return _private.get(this).properties['_id'] = newid;
	}


	createId(){
		var val = document.getElementsByName('txtid')[0].value;
		return val;
	}

	/*btnRequiredId( element ){*/
	requiredSelectLista( element , url ){
		jQuery(element).click(function(){
	        var inside = false;
	        jQuery('.inside').each(function(i, obj) {
	            inside = true;
	            var firstChild = obj.firstChild
	            var div_a = firstChild.nextSibling;
	            var a = div_a.firstChild;
	            var id = a.getAttribute("id");
	            window.location.replace(rutaInicial+url+'/'+id);
	        });

	        if(!inside)
	            alert('Seleccionar un cliente.');
	        return false;
    	});
    	return false;
	}



	clickRedirectId( element, url_corta ){
		jQuery('body').on( "click", element, function(){
			window.location.replace(rutaInicial+'cliente/'+url_corta);
			return false;
     	});
	}

	clickCancelar(){
		jQuery( '#btnCancelar' ).click(function(){
			window.location.replace(rutaInicial + 'cliente');
			return false;
		});
	}

	selectTipoCliente(){
		jQuery('input[name="rbtnTipoCliente"]').on('change', function(){
			var val = jQuery('input[name="rbtnTipoCliente"]:checked').val();
			var select_reset = '<option value="0"> - Seleccionar - </option>';
			if(val == 1){

				jQuery('#lblpais').css('display','none');
				jQuery('#div-pais').css('display','none');
				jQuery('#lblciudad').css('display','none');
				jQuery('#div-ciudad').css('display','none');

				jQuery('#lbldepartamento').css('display','');
				jQuery('#div-departamento').css('display','');
				jQuery('#lblprovincia').css('display','');
				jQuery('#div-provincia').css('display','');
				jQuery('#lbldistrito').css('display','');
				jQuery('#div-distrito').css('display','');
				jQuery('#div-completar2').css('display','block');

				jQuery("#pais").val('0');
				jQuery('#ciudad').html(select_reset);


			}else{

				jQuery('#lblpais').css('display','');
				jQuery('#div-pais').css('display','');
				jQuery('#lblciudad').css('display','');
				jQuery('#div-ciudad').css('display','');
				jQuery('#lbldepartamento').css('display','none');
				jQuery('#div-departamento').css('display','none');
				jQuery('#lblprovincia').css('display','none');
				jQuery('#div-provincia').css('display','none');
				jQuery('#lbldistrito').css('display','none');
				jQuery('#div-distrito').css('display','none');
				jQuery('#div-completar2').css('display','none');

				jQuery("#departamento").val('0');
				jQuery('#distrito').html(select_reset);
				jQuery('#provincia').html(select_reset);
				

			}


			
			
			console.log('cambio tipoCliente');
			return false;
		});
	}




}

