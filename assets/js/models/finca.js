const _private = new WeakMap();
class Finca {

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
	            alert('Seleccionar una finca.');
	        return false;
    	});
    	return false;
	}



	clickRedirectId( element, url_corta ){
		var val = this.createId();

		jQuery('body').on( "click", element, function(){
			window.location.replace(rutaInicial+'finca/'+url_corta+'/'+val);
			return false;
     	});
	}

	clickCancelar( element ){
		var val = this.createId();
		jQuery( element ).click(function(){
			window.location.replace(rutaInicial + 'finca/listar/'+val);
			return false;
		});
	}

	btnCancelarFincaAnual(){
		jQuery( '#btnCancelarFincaAnual' ).click(function(){
			var idanual = document.getElementsByName('txtidanual')[0].value;

			
			jQuery( '.icon-cross' ).click();
			

			
			/*idanual = document.getElementsByName('txtidanual').value;*/
			
			
			return false;
		});
		
	}


}

