$(document).ready(function(){
	
	productor = new Productor();
	productor.selectTipoDoc();
	productor.buscarPersonaConyxNroDoc();
	

	/*if(typeof window.initLibForm !== "undefined"){
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
*/

	
	if(typeof window.initLibForm !== "undefined"){
        initLibForm.actualizarSelect('Seleccionar' , 'departamento', 'provincia');
        initLibForm.actualizarSelect('Seleccionar' , 'provincia', 'distrito');
        initLibForm.actualizarSelect('Seleccionar' , 'distrito', 'zona');
    	initLibForm.mayusKeyPress();
        initLibForm.calendarFecha( '#fecIniBus' );
        initLibForm.calendarFecha( '#fecFinBus' );
        initLibForm.calendarFecha( '#fecNacProd' );
        initLibForm.calendarFecha( '#fecNacCony' );
    }
	    
    if(typeof window.initLibFormReg !== "undefined"){
        initLibFormReg.añadirIcon( 'departamento' );
    	initLibFormReg.regresarIcon( 'departamento' );
    	initLibFormReg.añadirIcon( 'provincia' );
    	initLibFormReg.regresarIcon( 'provincia' );
    	initLibFormReg.añadirIcon( 'distrito' );
    	initLibFormReg.regresarIcon( 'distrito' );
    	initLibFormReg.añadirIcon( 'zona' );
    	initLibFormReg.regresarIcon( 'zona' );

    	initLibFormReg.guardarCampo( 'departamento' ,'', false);
    	initLibFormReg.guardarCampo( 'provincia' ,'departamento');
    	initLibFormReg.guardarCampo( 'distrito' ,'provincia');
    	initLibFormReg.guardarCampo( 'zona' ,'distrito');
	
	}

	if(typeof window.initLibFormBuscar !== "undefined"){
		initLibFormBuscar.changeFilas('productor');
		initLibFormBuscar.changePage('productor');
		initLibFormBuscar.inputForm('productor');
		initLibFormBuscar.ordenarTabla('productor');
	}

	if(typeof window.initLibFormModificar !== "undefined"){
		if(typeof window.initLibFormReg !== "undefined"){
			initLibFormReg.guardarAjax( 'productor' , false, 'CONYUGUE DEL PRODUCTOR' , 'conyugue' , true , false);
		}

		initLibFormModificar.clickBtnEditar('productor');
		initLibFormModificar.clickBtnCancelar('productor');
		initLibFormModificar.clickBtnEditar('conyugue');
		initLibFormModificar.clickBtnCancelar('conyugue');
		/*initLibFormModificar.clickActualizar('conyugue');*/
		initLibFormModificar.clickActualizar('productor');
		initLibFormModificar.calendarFecha('#fecNacCony');
	}


});	

     