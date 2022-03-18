const _private = new WeakMap();
class Diagnostico {

	constructor( id ){
		const properties = {
			_id 	: id,
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
			window.location.replace(rutaInicial+'diagnostico/'+url_corta+'/'+val);
			return false;
     	});
	}

	clickCancelar( element ){
		var val = this.createId();
		jQuery( element ).click(function(){
			window.location.replace(rutaInicial + 'diagnostico/listar/'+val);
			return false;
		});
	}

	calcularCosto(){
		jQuery('body').on( "input", '.calcularCosto', function(){
			var id_nom = jQuery(this).attr("name");
			var idnombre = id_nom.split("_");
			if(idnombre[1] !== undefined){
				var hect = jQuery('input[name="txthectareas_'+idnombre[1]+'"]').val();
				var has = jQuery('input[name="txtcostohas_'+idnombre[1]+'"]').val();
				jQuery('input[name="txtcostototal_'+idnombre[1]+'"]').val( (hect*has).toFixed(2) );

			}

			return false;
     	});
	}

	calcularHectareas(){
		jQuery('body').on( "input", '.calcHectareas', function(){
			var total = 0;
			jQuery('.calcHectareas').each(function(index,element){
				total += ($(element).val())*1;				
			});
			jQuery('input[name="txthectareasTotal"]').val(total.toFixed(2));
			var has = jQuery('input[name="txtcostohasTotal"]').val();

			total = total*has;

			jQuery('input[name="txtcostototalTotal"]').val( total.toFixed(2) );


		});

	}


	calcularHas(){
		jQuery('body').on( "input", '.calcHas', function(){

			var total = 0;
			jQuery('.calcHas').each(function(index,element){
				total += ($(element).val())*1;
				console.log('total '+index+'='+total);				
			});
			jQuery('input[name="txtcostohasTotal"]').val(total.toFixed(2));
			var hec = jQuery('input[name="txthectareasTotal"]').val();

			total = total*hec;

			jQuery('input[name="txtcostototalTotal"]').val( total.toFixed(2) );
		});

	}







}

