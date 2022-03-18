$(document).ready(function(){
	
	inspeccion = new Inspeccion();

	inspeccion.clickRedirectId('.btnRegistrar', 'registrar');
	inspeccion.clickCancelar('#btnCancelar');
	inspeccion.contarItem();
	inspeccion.clickRedirectId('.btnVisualizarPDF', 'visualizarPDF');

	if(typeof window.initLibForm !== "undefined"){
    	initLibForm.btnAdicionarFila( 'Manifiesto', '#div_manifiesto_detalle', 'txtidmanifiesto', 2, [4,8] , true);
    	initLibForm.btnEliminarFila('#div_manifiesto_detalle' );
    	initLibForm.btnAdicionarFila( 'Conformidad' ,'#div_conformidad_detalle', 'txtidconformidad', 5, [2,3,3,2,2]);
    	initLibForm.btnEliminarFila('#div_conformidad_detalle' );

    	initLibForm.btnAdicionarFilaInspeccion( 'Parcela' ,'#div_parcela_detalle', 'txtidparcela', 8, [1,2,1,2,1,1,2,2] );
    	initLibForm.btnEliminarFila('#div_parcela_detalle' );
    	initLibForm.calendarFecha( '#fecInspeccion' );
    	initLibForm.calendarFecha( '#fecIni' );
    	initLibForm.calendarFecha( '#fecFin' );
    	initLibForm.mayusKeyPress();
	}

	if(typeof window.initLibFormReg !== "undefined"){
		initLibFormReg.añadirIcon('inspector');
		initLibFormReg.regresarIcon('inspector');
		initLibFormReg.guardarCampo( 'inspector' ,'', false, true);
		initLibFormReg.guardarAjax( 'inspeccion' );
	}
	

	if(typeof window.initLibFormBuscar !== "undefined"){
		initLibFormBuscar.changeFilas('inspeccion');
		initLibFormBuscar.changePage('inspeccion');
		initLibFormBuscar.inputForm('inspeccion');
	}


    if(typeof window.initLibFormModificar !== "undefined"){
        initLibFormModificar.clickBtnEditar('inspeccion');
        initLibFormModificar.clickBtnCancelar('inspeccion');
        initLibFormModificar.clickActualizar('inspeccion');
    }

});	

     