$(document).ready(function(){


	guiarecepcionmp = new GuiaRecepcionMP();
	guiarecepcionmp.buscarProductorxDocIdentidad();
	guiarecepcionmp.btnRegistrar();
	guiarecepcionmp.selectfinca();
	guiarecepcionmp.calcTara();
	guiarecepcionmp.calcKgNeto();
	//detallar
	guiarecepcionmp.calcRendimiento('exportable_gr');
	guiarecepcionmp.calcRendimiento('descarte_gr');
	guiarecepcionmp.calcRendimiento('cascarilla_gr');

	guiarecepcionmp.calcDefectoPrimario('granonegro');
	guiarecepcionmp.calcDefectoPrimario('granoagrio');
	guiarecepcionmp.calcDefectoPrimario('cerezaseca');
	guiarecepcionmp.calcDefectoPrimario('dañoporhongo');
	guiarecepcionmp.calcDefectoPrimario('materiaextraña');
	guiarecepcionmp.calcDefectoPrimario('brocadosevero');

	guiarecepcionmp.calcDefectoSecundario('negroparcial');
	guiarecepcionmp.calcDefectoSecundario('agrioparcial');
	guiarecepcionmp.calcDefectoSecundario('pergamino');
	guiarecepcionmp.calcDefectoSecundario('flotador');
	guiarecepcionmp.calcDefectoSecundario('inmaduro');
	guiarecepcionmp.calcDefectoSecundario('averanado');
	guiarecepcionmp.calcDefectoSecundario('conchas');
	guiarecepcionmp.calcDefectoSecundario('partido');
	guiarecepcionmp.calcDefectoSecundario('pulpaseca');
	guiarecepcionmp.calcDefectoSecundario('viejo');
	guiarecepcionmp.calcDefectoSecundario('brocadoleve');

	guiarecepcionmp.calcAnalisisSensorial();

	
	if(typeof window.initLibForm !== "undefined"){
        
    	initLibForm.mayusKeyPress();
    	initLibForm.calendarFecha('#feccosecha');
        initLibForm.actualizarSelect('Seleccionar' , 'producto', 'subproducto');
        initLibForm.calendarFecha( '#fecguia' );


	}

	if(typeof window.initLibFormReg !== "undefined"){

		initLibFormReg.guardarAjax( 'guiarecepcionmp' , false, 'GUIA DE RECEPCION DE MATERIA PRIMA');
		initLibFormReg.guardarAjax( 'guiarecepcionmp' , false, 'GUIA DE RECEPCION DE MATERIA PRIMA' , 'cerrar' , true , true, '/1/1');
		initLibFormReg.guardarAjax( 'guiarecepcionmp' , false, 'GUIA DE RECEPCION DE MATERIA PRIMA' , 'continuar' , true , true, '/1/0');
		
		initLibFormReg.guardarAjax( 'guiarecepcionmp' , false, 'GUIA DE RECEPCION DE MATERIA PRIMA' , 'fisico', false);
		initLibFormReg.guardarAjax( 'guiarecepcionmp' , false, 'GUIA DE RECEPCION DE MATERIA PRIMA' , 'sensorial', false);
		initLibFormReg.guardarAjax( 'guiarecepcionmp' , false, 'GUIA DE RECEPCION DE MATERIA PRIMA' , 'visualytacto', false);

	}

	if(typeof window.initLibFormBuscar !== "undefined"){
		initLibFormBuscar.changeFilas('guiarecepcionmp');
		initLibFormBuscar.changePage('guiarecepcionmp');
		initLibFormBuscar.inputForm('guiarecepcionmp');
	}




});

     