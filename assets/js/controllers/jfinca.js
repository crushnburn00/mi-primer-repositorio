$(document).ready(function(){

	/*jQuery('#btnGuardar').click(function(){
		return false;
    });*/
    
	finca = new Finca();

	finca.clickRedirectId('.btnRegistrar', 'registrar');
	finca.requiredSelectLista('.btnCertificacion','certificacion/listar');
	finca.requiredSelectLista('.btnInspeccion','inspeccion/listar');
	finca.requiredSelectLista('.btnDiagnostico','diagnostico/listar');
	finca.clickCancelar('#btnCancelar');
    


	
	if(typeof window.initLibForm !== "undefined"){
        initLibForm.actualizarSelect('Seleccionar' , 'departamento', 'provincia');
        initLibForm.actualizarSelect('Seleccionar' , 'provincia', 'distrito');
        initLibForm.actualizarSelect('Seleccionar' , 'distrito', 'zona');
    	initLibForm.btnAdicionarFila( '', '#div_finca_detalle' , 'txtidanual' , 3, "" , false , "" , "input" , [false,false,true]);
    	initLibForm.btnEliminarFila('#div_finca_detalle' );
    	initLibForm.insideLista();
        initLibForm.mayusKeyPress();

	}

	if(typeof window.initLibFormBuscar !== "undefined"){
		initLibFormBuscar.changeFilas('finca');
		initLibFormBuscar.changePage('finca');
		initLibFormBuscar.inputForm('finca');
	}

	if(typeof window.initLibFormReg !== "undefined"){
        initLibFormReg.guardarAjax( 'finca' );
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

    if(typeof window.initLibFormModificar !== "undefined"){
        initLibFormModificar.clickBtnAdicionarFila('btnAdicionarFila' , 'FincaAnual');
        initLibFormModificar.clickActualizarFila( 'fincaanual', 'FincaAnual','INPSECCION ANUAL', 'finca', 'actualizarFincaAnualAjax');
        finca.btnCancelarFincaAnual();
        initLibFormModificar.clickBtnEditar('finca');
        initLibFormModificar.clickBtnCancelar('finca');
        initLibFormModificar.clickActualizar('finca');
        
    }




});

     