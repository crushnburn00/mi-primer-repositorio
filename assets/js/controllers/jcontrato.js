$(document).ready(function(){


	contrato = new Contrato(1);

    contrato.clickRedirectId('.btnRegistrar', 'registrar');
	contrato.clickCancelar('#btnCancelar');
    /*contrato.buscarCliente();*/
    contrato.camposCalculados();
    contrato.btnRegistrarAsignacion();
    contrato.btnCancelarAsigContrato();
    contrato.selectkgpergamino();
    contrato.clickGuardarAsigContrato();

    contrato.buscarCliente('campobusqueda1');
    contrato.buscarCliente('campobusqueda2');
    contrato.buscarCliente('campobusqueda3');

    contrato.insideLista();
	
	if(typeof window.initLibForm !== "undefined"){
        
        initLibForm.calendarFecha('#feccontrato');
        initLibForm.calendarFecha('#fecembarque');
        initLibForm.calendarFecha('#fecfijacioncontrato');
    	initLibForm.mayusKeyPress();

        initLibForm.actualizarSelect('Seleccionar' , 'pais', 'ciudad');
        initLibForm.actualizarSelect('Seleccionar' , 'producto', 'subproducto');
        initLibForm.actualizarSelect('Seleccionar' , 'subproducto', 'calidad');

	}

	if(typeof window.initLibFormBuscar !== "undefined"){
		initLibFormBuscar.changeFilas('contrato');
		initLibFormBuscar.changePage('contrato');
		initLibFormBuscar.inputForm('contrato');

	}

	if(typeof window.initLibFormReg !== "undefined"){
        initLibFormReg.guardarAjax( 'contrato' , false );

        initLibFormReg.añadirIcon( 'pais' );
        initLibFormReg.regresarIcon( 'pais' );
        initLibFormReg.añadirIcon( 'ciudad' );
        initLibFormReg.regresarIcon( 'ciudad' );
        initLibFormReg.guardarCampo( 'pais' ,'', false);
        initLibFormReg.guardarCampo( 'ciudad' ,'pais');


        initLibFormReg.añadirIcon('tipocertificacion');
        initLibFormReg.regresarIcon('tipocertificacion');
        initLibFormReg.guardarCampo( 'tipocertificacion' ,'', false);
        initLibFormReg.añadirIcon('entidadcertificadora');
        initLibFormReg.regresarIcon('entidadcertificadora');
        initLibFormReg.guardarCampo( 'entidadcertificadora' ,'', false);

        contrato.selectestfijacion();    	

	}

    if(typeof window.initLibFormModificar !== "undefined"){

        initLibFormModificar.clickBtnEditar('contratoestado');
        initLibFormModificar.clickBtnCancelar('contratoestado');
        initLibFormModificar.clickActualizar('contratoestado' , 'contrato', true);
        
    }




});

     