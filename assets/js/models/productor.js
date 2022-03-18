const _private = new WeakMap();
class Productor {

	constructor( id , tipodoc){
		const properties = {
			_id 	: id,
			_tipodoc: tipodoc
		}
		_private.set(this,{properties});
	}

	get id(){
		return _private.get(this).properties['_id'];
	}

	set id( newid ){
		return _private.get(this).properties['_id'] = newid;
	}

	selectTipoDoc( idtipodoc ){
		/*_private.get(this).properties['_tipodoc'] = 1;
		console.log(_private.get(this).properties['_tipodoc'] );*/

		$('#tipodocCony').change(function(){
			var _tipodoc = $(this).val();
			
			if(_tipodoc == 1){
				$('#div_nrodocCony').html("DNI");
				$('#nomCony').removeAttr("disabled");
				$('#apeCony').removeAttr("disabled");
				$('#razonCony').attr("disabled","disabled");

			}else{
				if(_tipodoc == 2){
					$('#div_nrodocCony').html("RUC");
					$('#nomCony').attr("disabled","disabled");
					$('#apeCony').attr("disabled","disabled");
					$('#razonCony').removeAttr("disabled");
				}else{
					$('#div_nrodocCony').html("DNI / RUC");
					$('#nomCony').attr("disabled","disabled");
					$('#apeCony').attr("disabled","disabled");
					$('#razonCony').attr("disabled","disabled");


				}
			}
		});
	}

	buscarPersonaConyxNroDoc(){
		$('#dniCony').keyup(function () {
			if( ($('#dniCony').val()).length >= 8 ){
				//buscar dni
				$.ajax({			
				url: rutaInicial + 'conyugue/buscarPersonaxNroDocAjax',
				type: 'POST',
				dataType: 'json',
				data: 	$('#form_productor_conyugue').serialize(),
				success: function(msj){
					if(msj.estado == 1){
						var cony = msj.result;
						$('#nomCony').val(cony.nombre);
						$('#apeCony').val(cony.apellido);
						$('#razonCony').val(cony.razon_social);
						$('#telfCony').val(cony.telefono_celular);
						$('#gradoEstudioCony').val(cony.id_grado_estudio);
						$('#fecNacCony').val(cony.fecha_nacimiento);
						$('#lugarNacCony').val(cony.lugar_nacimiento);
						$('#div_nrodocCony_detalle').html('*El documento fue registrado anteriormente');
					}else{
						$('#div_nrodocCony_detalle').html('*El documento es nuevo');
					}	
				}
			});

			}else{
				$('#div_nrodocCony_detalle').html('*El documento debe contener al menos 8 dígitos');
			}
		});
		
	}



}

