$(document).ready(function(){

	socio = new Socio();
	socio.buscarProductor('campobusqueda1');
	socio.buscarProductor('campobusqueda2');
	socio.buscarProductor('campobusqueda3');

	socio.insideLista();


	if(typeof window.initLibForm !== "undefined"){
       
        /*initLibForm.insideLista();*/
    	initLibForm.mayusKeyPress();

	}

	if(typeof window.initLibFormModificar !== "undefined"){
		initLibFormModificar.clickBtnEditar('socio');
		initLibFormModificar.clickBtnCancelar('socio');
		initLibFormModificar.clickActualizar('socio');
	}

	if(typeof window.initLibFormReg !== "undefined"){
		initLibFormReg.guardarAjax( 'socio' , false );
	}



});

     