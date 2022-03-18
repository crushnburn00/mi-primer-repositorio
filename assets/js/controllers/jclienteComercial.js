$(document).ready(function(){

	/*jQuery('#btnGuardar').click(function(){
		return false;
    });*/


	cliente = new ClienteComercial();

	/*
	cliente.requiredSelectLista('.btnCertificacion','certificacion/listar');
	cliente.requiredSelectLista('.btnInspeccion','inspeccion/listar');
	cliente.requiredSelectLista('.btnDiagnostico','diagnostico/listar');*/
    cliente.clickRedirectId('.btnRegistrar', 'registrar');
	cliente.clickCancelar();
    cliente.selectTipoCliente();

	
	if(typeof window.initLibForm !== "undefined"){
        initLibForm.actualizarSelect('Seleccionar' , 'pais', 'ciudad');
        //initLibForm.actualizarSelect('Seleccionar' , 'ciudad', 'departamento');
        initLibForm.actualizarSelect('Seleccionar' , 'departamento', 'provincia');
        initLibForm.actualizarSelect('Seleccionar' , 'provincia', 'distrito');
        //initLibForm.actualizarSelect('Seleccionar' , 'distrito', 'zona');
        
    	initLibForm.mayusKeyPress();

	}

	if(typeof window.initLibFormBuscar !== "undefined"){
		initLibFormBuscar.changeFilas('cliente');
		initLibFormBuscar.changePage('cliente');
		initLibFormBuscar.inputForm('cliente');

	}

	if(typeof window.initLibFormReg !== "undefined"){
        initLibFormReg.guardarAjax( 'cliente' , false );

        initLibFormReg.añadirIcon( 'pais' );
        initLibFormReg.regresarIcon( 'pais' );
        initLibFormReg.añadirIcon( 'ciudad' );
        initLibFormReg.regresarIcon( 'ciudad' );

        initLibFormReg.añadirIcon( 'departamento' );
    	initLibFormReg.regresarIcon( 'departamento' );
    	initLibFormReg.añadirIcon( 'provincia' );
    	initLibFormReg.regresarIcon( 'provincia' );
    	initLibFormReg.añadirIcon( 'distrito' );
    	initLibFormReg.regresarIcon( 'distrito' );


    	initLibFormReg.guardarCampo( 'pais' ,'', false);
        initLibFormReg.guardarCampo( 'ciudad' ,'pais');
        initLibFormReg.guardarCampo( 'departamento' ,'ciudad');
    	initLibFormReg.guardarCampo( 'provincia' ,'departamento');
    	initLibFormReg.guardarCampo( 'distrito' ,'provincia');
    	
	}

    if(typeof window.initLibFormModificar !== "undefined"){
        initLibFormModificar.clickBtnEditar('cliente');
        initLibFormModificar.clickBtnCancelar('cliente');
        initLibFormModificar.clickActualizar('cliente');
    }



});

     