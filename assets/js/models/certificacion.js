const _private = new WeakMap();
class Certificacion {

	constructor( id , entidadcertificadora, tipocertificacion){
		const properties = {
			_id 	: id,
			_tipocertificacion: tipocertificacion,
			_entidadcertificadora : entidadcertificadora
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

	clickRedirectId( element, url_corta ){
		var val = this.createId();

		jQuery('body').on( "click", element, function(){
			window.location.replace(rutaInicial+'certificacion/'+url_corta+'/'+val);
			return false;
     	});
	}

	clickCancelar( element ){
		var val = this.createId();
		jQuery( element ).click(function(){
			window.location.replace(rutaInicial + 'certificacion/listar/'+val);
			return false;
		});
	}




}

