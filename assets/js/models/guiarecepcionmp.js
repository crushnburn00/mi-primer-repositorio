const _private = new WeakMap();
class GuiaRecepcionMP {

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

	calcTara(){
		var _Class = this;
		$('#cantidad').keyup(function () {
			var cant = $('#cantidad').val();
			var total = cant*0.2;
			total = total.toFixed(2);
			$('#tara').val(total);

			_Class.calcPesaje();


		});
	}

	calcKgNeto(){
		var _Class = this;
		$('#totalkgbr').keyup(function () {
			_Class.calcPesaje();

		});
	}

	calcPesaje(){
		var total = $('#totalkgbr').val();
		var tara = $('#tara').val();
		var totalkg = total - tara;
		totalkg = totalkg.toFixed(2);
		$('#totalkgnetos').val(totalkg);

		var tot = $('#totalkgnetos').val();
		var saldo = $('#saldopendiente').val();

		var produccion = $('#tipoproduccion').val();

		if((tot*1) > (saldo*1) && produccion == 1){
			$('#msj-totalkgbr').html('Total Kilos Netos no puede ser mayor al saldo');
			$('#msj-totalkgbr').css('color','red');
			
		}else{
			$('#msj-totalkgbr').html('');
		}

	}

	buscarProductorxDocIdentidad(){
		var _class = this;
		$('#docidentidad').keyup(function () {
			if( ($('#docidentidad').val()).length >= 8 ){
				//buscar dni
				$.ajax({			
				url: rutaInicial + 'guiarecepcionmp/buscarProductorAjax',
				type: 'POST',
				dataType: 'json',
				data: { "txtdocidentidad": 	$('#docidentidad').val() },
				success: function(msj){
					if(msj.estado == 1){
						var dato = msj.result;
						_class.resetDatorProveedor('*El documento fue encontrado' , 'green',dato.nombre_razon,dato.codigo);
						document.getElementsByName('txtidsocio')[0].value = dato.id_socio;
						var finca = dato.finca;
						if(finca.length >= 1){
							$.each(finca, function (i, item) {

								jQuery('#finca').append(jQuery('<option>', {
								    value: item["id_finca"],
								    text : item.nombre
								}));
							});

						}else
							jQuery('#finca').html('<option value="0"> - Seleccionar - </option>');

					}else{
						_class.resetDatorProveedor(msj.mensaje , 'red','','');

						if(msj.estado = 3){
							var dato = msj.result;
							$('#nombre').val(dato.nombre_razon);
							$('#codigo').val(dato.codigo);
						}
					}	
				}
			});

			}else{
				_class.resetDatorProveedor('* El documento debe tener de 8 a más dígitos' , 'red','','');
			}
		});
		
	}

	resetDatorProveedor( msj_error_doc , color_msj , val_nombre , val_codigo ){
		$('#msj-docidentidad').html(msj_error_doc);
		$('#msj-docidentidad').css('color',color_msj);
		jQuery('#finca').html('<option value="0"> - Seleccionar - </option>');
		$('#nombre').val(val_nombre);
		$('#codigo').val(val_codigo);

	}

	selectfinca(){
		jQuery('#finca').change(function(){
			var id = $('#finca option:selected').val();
			
			$.ajax({			
				url: rutaInicial + 'finca/buscarFincaAjax/'+id ,
				type: 'POST',
				dataType: 'json',
				data: { "value":  id },
				success: function(msj){
					$('#totalfincaanual').val('');
					$('#saldofincaanual').val('');

					if(msj.estado == 1){
						var finca = msj.result;
						$('#departamento').val(finca.departamento);
						$('#provincia').val(finca.provincia);
						$('#distrito').val(finca.distrito);
						$('#zona').val(finca.zona);
						$('#certificacion').val(finca.tipo_certificacion);

						var anio = finca.anio;

						if( anio['0'] !== undefined ){
							$('#totalfincaanual').val(anio['0'].kg_estimado);
							$('#saldofincaanual').val(anio['0'].kg_consumido);
						}
					}else{
						
					}	
				}
			});
			return false;


		});
	}


	btnRegistrar(){
		jQuery('.btnRegistrarGuia').click(function(){

			$.ajax({			
				url: rutaInicial + 'guiarecepcionmp/validarRegistro',
				type: 'POST',
				dataType: 'json',
				data: { "value":  jQuery(this).val() },
				success: function(msj){
					if(msj.estado == 1){
						window.location.replace(rutaInicial+'guiarecepcionmp/registrar');
					}else{
						alert('PORFAVOR ASIGNAR UN CONTRATO PARA CONTINUAR.');
					}	
				}
			});
			return false;	            
	        
    	});
	}

	calcRendimiento( element_id){
		var _Class = this;
		$('#'+element_id).keyup(function () {
			_Class.calcPorcentajeFisico();
		});

	}

	calcPorcentajeFisico(){
		var cant1 = $('#exportable_gr').val();
		var cant2 = $('#descarte_gr').val();
		var cant3 = $('#cascarilla_gr').val();

		cant1 = cant1*1;
		cant2 = cant2*1;
		cant3 = cant3*1;
		var total = cant1 + cant2 + cant3;

		$('#exportable_porc').val( ((cant1/total)*100).toFixed(2) );
		$('#descarte_porc').val( ((cant2/total)*100).toFixed(2) );
		$('#cascarilla_porc').val( ((cant3/total)*100).toFixed(2) );

		$('#total_gr').val(total);
		$('#total_porc').val('100.00');

	}

	calcDefectoPrimario(element_id){
		var _Class = this;
		$('#'+element_id).keyup(function () {
			_Class.calSubtotalPrimario();
		});
	}

	calSubtotalPrimario(){
		var subtotal1 = 0;
		subtotal1 = $('#granonegro').val()*1;
		subtotal1 += $('#granoagrio').val()*1;
		subtotal1 += $('#cerezaseca').val()*1;
		subtotal1 += $('#dañoporhongo').val()*1;
		subtotal1 += $('#materiaextraña').val()*1;
		subtotal1 += $('#brocadosevero').val()*1;

		$('#subtotalprimario').val(subtotal1.toFixed(2));
		var subtotal2 = $('#subtotalsecundario').val();
		$('#totaldefecto').val( (subtotal1 + (subtotal2*1)).toFixed(2) );

	}

	calcDefectoSecundario(element_id){
		var _Class = this;
		$('#'+element_id).keyup(function () {
			_Class.calSubtotalSecundario();
		});
	}


	calSubtotalSecundario(){
		var subtotal2 = 0;
		subtotal2 += $('#negroparcial').val()*1;
		subtotal2 += $('#agrioparcial').val()*1;
		subtotal2 += $('#pergamino').val()*1;
		subtotal2 += $('#flotador').val()*1;
		subtotal2 += $('#inmaduro').val()*1;
		subtotal2 += $('#averanado').val()*1;
		subtotal2 += $('#conchas').val()*1;
		subtotal2 += $('#partido').val()*1;
		subtotal2 += $('#pulpaseca').val()*1;
		subtotal2 += $('#viejo').val()*1;
		subtotal2 += $('#brocadoleve').val()*1;

		var subtotal1 = $('#subtotalprimario').val();
		$('#subtotalsecundario').val(subtotal2.toFixed(2));
		$('#totaldefecto').val( (subtotal2 + (subtotal1*1)).toFixed(2) );

	}

	calcPuntajeFinal( _Class = this ){

		var final = 0;
		final += $('#fragancia').val()*1;
		final += $('#sabor').val()*1;
		final += $('#saborresidual').val()*1;
		final += $('#acidez').val()*1;
		final += $('#cuerpo').val()*1;
		final += $('#uniformidad').val()*1;
		final += $('#balance').val()*1;
		final += $('#tazalimpieza').val()*1;
		final += $('#dulzor').val()*1;
		final += $('#puntajecatador').val()*1;

		$('#puntajefinal').val( final.toFixed(2) );

		_Class.calcRankingGeneral(final);
	}
	calcRanking( idelement){

		var valor = $('#'+idelement).val();
		var ranking = "VALOR NO PERMITIDO";
		if(valor == "")
			ranking = "";
		else
			if( valor >=6 && valor <= 6.99)
				ranking = "BUENO";
			else
				if( valor >=7 && valor <= 7.99)
				 ranking = "MUY BUENO";
				else
					if( valor >=8 && valor <= 8.99)
						ranking = "EXCELENTE";
					else
						if( valor >=9 && valor <= 9.99)
							ranking = "EXTRAORDINARIO";
						else
							if( valor==10)
								ranking = "EXTRAORDINARIO";

		$('#lbl'+idelement).html(ranking);

	}

	calcRankingGeneral( valor ){
		var rankingGral = "";
		if( valor < 40 )
			rankingGral = "FUERA DE GRADO";
		else
			if( valor >=40 && valor <= 50)
			 rankingGral = "DEBAJO DE GRADO";
			else
				if( valor >=50 && valor <= 60)
					rankingGral = "COMERCIAL";
				else
					if( valor >=60 && valor <= 68)
						rankingGral = "GRADO DE MERCADO";
					else
						if( valor >=69 && valor <= 73)
						rankingGral = "PASABLE  |  CALIDAD MEDIA";
						else
							if( valor >=74 && valor <= 78)
								rankingGral = "BUENO  |  CALIDAD USUAL BUENA";
							else
								if( valor >=79 && valor <= 83)
									rankingGral = "MUY BUENO  |  PREMIUM";
								else
									if( valor >=84 && valor <= 89)
										rankingGral = "EXCELENTE  |  ESPECIALIDAD";
									else
										if( valor >=90 && valor <= 94)
											rankingGral = "EXTRAORDINARIO  |  ESPECIAL PREMIUM";
										else
											if( valor >=95 && valor <= 100)
												rankingGral = "EJEMPLAR O UNICO  |  ESPECIALIDAD SUPER PREMIUM";
											else
												rankingGral = "NO ENCONTRADO  |  ";

		$('#lblpuntajefinal').html(rankingGral);
	}

	calcAnalisisSensorial(){
		var _Class = this;
		$('#fragancia').keyup(function () {
			_Class.calcPuntajeFinal();
			_Class.calcRanking('fragancia');
		});

		$('#sabor').keyup(function () {
			_Class.calcPuntajeFinal();
			_Class.calcRanking('sabor');
		});

		$('#saborresidual').keyup(function () {
			_Class.calcPuntajeFinal();
			_Class.calcRanking('saborresidual');
		});

		$('#acidez').keyup(function () {
			_Class.calcPuntajeFinal();
			_Class.calcRanking('acidez');
		});

		$('#cuerpo').keyup(function () {
			_Class.calcPuntajeFinal();
			_Class.calcRanking('cuerpo');
		});

		$('#uniformidad').keyup(function () {
			_Class.calcPuntajeFinal();
			_Class.calcRanking('uniformidad');
		});

		$('#balance').keyup(function () {
			_Class.calcPuntajeFinal();
			_Class.calcRanking('balance');
		});

		$('#tazalimpieza').keyup(function () {
			_Class.calcPuntajeFinal();
			_Class.calcRanking('tazalimpieza');
		});

		$('#dulzor').keyup(function () {
			_Class.calcPuntajeFinal();
			_Class.calcRanking('dulzor');
		});

		$('#puntajecatador').keyup(function () {
			_Class.calcPuntajeFinal();
			_Class.calcRanking('puntajecatador');
		});
	}









}

