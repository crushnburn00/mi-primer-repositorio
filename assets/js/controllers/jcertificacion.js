$(document).ready(function(){
	/*jQuery( '#btnCancelar' ).click(function(){
			
			return false;
		});*/
	certificacion = new Certificacion();

	certificacion.clickRedirectId('.btnRegistrar', 'registrar');
	certificacion.clickCancelar('#btnCancelar');

	if(typeof window.initLibFormReg !== "undefined"){
		initLibFormReg.añadirIcon('tipocertificacion');
		initLibFormReg.regresarIcon('tipocertificacion');
		initLibFormReg.guardarCampo( 'tipocertificacion' ,'', false);
		initLibFormReg.añadirIcon('entidadcertificadora');
		initLibFormReg.regresarIcon('entidadcertificadora');
		initLibFormReg.guardarCampo( 'entidadcertificadora' ,'', false);
		initLibFormReg.guardarAjax('certificacion');

	}

	if(typeof window.initLibForm !== "undefined"){
		initLibForm.calendarFecha( '#fecEmision' );
		initLibForm.calendarFecha( '#fecExpiracion' );
		initLibForm.mayusKeyPress();
	}

	if(typeof window.initLibFormBuscar !== "undefined"){
		initLibFormBuscar.changeFilas('certificacion');
		initLibFormBuscar.changePage('certificacion');
		initLibFormBuscar.inputForm('certificacion');
	}

	   if(typeof window.initLibFormModificar !== "undefined"){
        initLibFormModificar.clickBtnEditar('certificacion');
        initLibFormModificar.clickBtnCancelar('certificacion');
        initLibFormModificar.clickActualizar('certificacion');
    }


});	

     