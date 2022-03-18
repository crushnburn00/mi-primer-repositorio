const _private = new WeakMap();
class Inspeccion {

	constructor( id , aCafe){
		const properties = {
			_id 	: id,
			_aCafe  : aCafe
		}
		_private.set(this,{properties});
	}

	get id(){
		return _private.get(this).properties['_id'];
	}

	set id( newid ){
		_private.get(this).properties['_id'] = newid;
	}


	get aCafe(){
		return _private.get(this).properties['_aCafe'];
	}

	set aCafe( newaCafe ){
		_private.get(this).properties['_aCafe'] = newaCafe;
	}


	createId(){
		var val = document.getElementsByName('txtid')[0].value;
		return val;
	}

	clickRedirectId( element, url_corta ){
		var val = this.createId();

		jQuery('body').on( "click", element, function(){
			window.location.replace(rutaInicial+'inspeccion/'+url_corta+'/'+val);
			return false;
     	});
	}

	clickCancelar( element ){
		var val = this.createId();
		jQuery( element ).click(function(){
			window.location.replace(rutaInicial + 'inspeccion/listar/'+val);
			return false;
		});
	}

	contarItem(){
		jQuery( '.radPregunta' ).change(function(){
			var cant = jQuery('input:radio[value="1"]:checked').length;
			jQuery('input[name="txtItemCumplido"]').val(cant);
			var total = jQuery('input[name="txtTotalPregunta"]').val();

			var porcen = (cant/total)*100;

			jQuery('input[name="txtPorcentajeItem"]').val(porcen.toFixed(2));

			
			return false;
		});
	}


}

