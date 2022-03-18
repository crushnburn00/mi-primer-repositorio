$(document).ready(function(){

	diagnostico = new Diagnostico();

	diagnostico.clickRedirectId('.btnRegistrar', 'registrar');
	diagnostico.clickCancelar('#btnCancelar');
	diagnostico.calcularCosto();
	diagnostico.calcularHectareas();
	diagnostico.calcularHas();
	diagnostico.clickRedirectId('.btnVisualizarPDF', 'visualizarPDF');

	if(typeof window.initLibForm !== "undefined"){
    	initLibForm.btnAdicionarFila( 'Campo', '#div_campo_detalle', 'txtidcampo', 7, [1,2,2,2,1,2,2], true);
    	initLibForm.btnEliminarFila('#div_campo_detalle' );
    	initLibForm.calendarFecha( '#fec' );
    	initLibForm.calendarFecha( '#fecIni' );
    	initLibForm.calendarFecha( '#fecFin' );
    	initLibForm.mayusKeyPress();
	}

	if(typeof window.initLibFormReg !== "undefined"){
		initLibFormReg.guardarAjax( 'diagnostico' );

		initLibFormReg.añadirIcon('responsable_area');
		initLibFormReg.regresarIcon('responsable_area');
		initLibFormReg.guardarCampo( 'responsable_area' ,'', false, true);

		initLibFormReg.añadirIcon('tecnico_campo');
		initLibFormReg.regresarIcon('tecnico_campo');
		initLibFormReg.guardarCampo( 'tecnico_campo' ,'', false, true);
	}

	if(typeof window.initLibFormBuscar !== "undefined"){
		initLibFormBuscar.changeFilas('diagnostico');
		initLibFormBuscar.changePage('diagnostico');
		initLibFormBuscar.inputForm('diagnostico');
	}

    if(typeof window.initLibFormModificar !== "undefined"){
        initLibFormModificar.clickBtnEditar('diagnostico');
        initLibFormModificar.clickBtnCancelar('diagnostico');
        initLibFormModificar.clickActualizar('diagnostico');
    }

});	

     