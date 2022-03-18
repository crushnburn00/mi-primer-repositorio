var server = window.location.hostname;

$('#FecRegis').datetimepicker({locale: 'es'});


if(server == '10.30.10.102'){
    server = server + ':8080';
}


var rutaInicial = "http://"+server+"/tracesysorganics/";


/*	Mensajes de Errores de Ajax
*/
function errorAjax(jqXHR , textStatus){
	if (jqXHR.status === 0) { 			alert('Not connect: Verify Network.'); 		} else 
	if (jqXHR.status == 404) { 			alert('Requested page not found [404]');	} else 
	if (jqXHR.status == 500) {  		alert('Internal Server Error [500].');		} else 
	if (textStatus === 'parsererror') { alert('Requested JSON parse failed.');		} else 
	if (textStatus === 'timeout') {		alert('Time out error.');					} else 
	if (textStatus === 'abort') {       alert('Ajax request aborted.');				} else 
	{	alert('Uncaught Error: ' + jqXHR.responseText); }
}


function sesionValida( respuesta , div = ""){
    if(respuesta == "NL"){
        window.location.href = rutaInicial;
    }else{
    	if(div!=""){
	    	$('#'+div).html(respuesta);
	    	//console.log('#'+div);
	    	//console.log(respuesta);
    	}
    }
}

function actualizarIcon( iddiv , estado ){
	if( estado == 0 ){
		$('#'+iddiv).html('<span class="icon-search"></span>');
	}else{
		if(estado == 1){
			$('#'+iddiv).html('<span class="icon-checkmark" style="color:green"></span>');
		}
		else{
			if(estado == 2){
				$('#'+iddiv).html('<span class="icon-cross" style="color:red"></span>');
			}else{
				$('#'+iddiv).html('');
			}
		}
	}
}


function ajaxListaBusqueda( cantfilas , pagina , opcion , modulo ){
    if( opcion == 1 ){
        url = 'generarHtmlLista';
        data = { "value":    cantfilas ,
                "value1":    pagina };
    }else{
        url = 'buscarAjax';
        data = $('#form_busqueda'+modulo).serialize()+'&value='+cantfilas+'&value1='+pagina;
        
    }

    jQuery.ajax({
        url: rutaInicial + modulo + '/'+ url,
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function(msj){
            if(msj.respuesta == 'Ok'){
                finreg = pagina*cantfilas;
                totalreg = msj.pag['TOTALREGISTROS'];

                jQuery('.tbody_div').html( msj.lista );

                jQuery('#nav_paginacion').html( msj.paginacion );
                jQuery('#total_registros').html( totalreg );  
                if(totalreg>0)
                    jQuery('#ini_registro').html(((pagina-1)*cantfilas)+1); 
                else
                    jQuery('#ini_registro').html('0'); 

                if( finreg > totalreg ) 
                    jQuery('#fin_registro').html(totalreg); 
                else
                    jQuery('#fin_registro').html(finreg); 
            }else{
                if(msj.respuesta =='Login')
                    window.location.replace(rutaInicial);
            }
        },
        error:  function (jqXHR, textStatus, errorThrown ) {
            errorAjax(jqXHR , textStatus);
        }
    });
}

/*
function habilitarEdicion( nombreDiv ){
    jQuery(nombreDiv + " .show").each(function(){
        jQuery(this).removeClass("show");
        jQuery(this).addClass("hidden");
    });

    jQuery(nombreDiv + " .required1").each(function(){
        jQuery(this).removeClass("required1");
        jQuery(this).addClass("required");
    });

    jQuery(nombreDiv + " .hidden.no-show").each(function(){
        jQuery(this).removeClass("hidden");
    });

    jQuery(nombreDiv + " label").each(function(){
        campo = '#'+ jQuery(this).attr("for");
        value = jQuery(this).text();
        jQuery(campo).val(value);
    });
}


function habilitarBotonesEdicion( desc ){
    jQuery("#div-btnGuardar"+desc).css('display','block');
    jQuery("#btnCancelar"+desc).css('display','block');

    jQuery("#btnGuardar"+desc).removeAttr("disabled");
    jQuery("#btnCancelar"+desc).removeAttr("disabled");
    jQuery('#btnEditar'+desc).attr("disabled" , '"disabled');
}   


function deshabilitarBotonesEdicion( desc ){
    jQuery("#div-btnGuardar"+desc).css('display','none');
    jQuery("#btnCancelar"+desc).css('display','none');

    jQuery("#btnGuardar"+desc).attr("disabled","disabled");
    jQuery("#btnCancelar"+desc).attr("disabled","disabled");
    jQuery('#btnEditar'+desc).removeAttr("disabled" , '"disabled');

}

function deshabilitarEdicion( nombreDiv ){
    jQuery(nombreDiv + " .hidden").each(function(){
        jQuery(this).removeClass("hidden");
        jQuery(this).addClass("show");
    });

    jQuery(nombreDiv + " .no-show").each(function(){
        jQuery(this).addClass("hidden");
    });

    jQuery(nombreDiv + " .required").each(function(){
        jQuery(this).removeClass("required");
        jQuery(this).addClass("required1");
    });
}
 
function validarCambios( nombreDiv ){
    cambio = false;
    jQuery(nombreDiv + ' input[type="text"]').each(function(){
        campoid = jQuery(this).attr("id");
        value = jQuery(this).val();
        value1 = jQuery('label[for="'+ campoid +'"]').text();
        //console.log('valor actual: ' + value);

        if(value != value1){
            //console.log('valor anterior: ' + value1);
            cambio = true;
            return false; // break
        }
    });

    jQuery(nombreDiv + ' select').each(function(){
        campoid = jQuery(this).attr("id");
        value = jQuery(this).val();
        value1 = jQuery('label[for="'+ campoid +'"]').text();
        //console.log('valor actual: ' + value + campoid);
        if(value != value1){
            //console.log('valor anterior: ' + value1);
            cambio = true;
            return false; // break
        }
    });

    jQuery(nombreDiv + ' textarea').each(function(){
        campoid = jQuery(this).attr("id");
        value = jQuery(this).val();
        value1 = jQuery('label[for="'+ campoid +'"]').text();
        //console.log('valor actual: ' + value);
        if(value != value1){
            //console.log('valor anterior: ' + value1);
            cambio = true;
            return false; // break
        }
    });

    return cambio;
}


function cancelarCambios(){
    jQuery('#modal_validacion .modal-title').html('No se realizó ningún cambio');
    jQuery('#modal_validacion .modal-body').html('Click en al botón CANCELAR para retroceder.');
    jQuery('#modal_validacion').modal('show');   
}


function actualizarForm( nombreDiv ){
    jQuery(nombreDiv + " label").each(function(){
        campo = '#'+ jQuery(this).attr("for");
        value = jQuery(campo).val();
        jQuery(this).text(value);
    });

    jQuery(nombreDiv + " select").each(function(){
        //campo = '#'+ jQuery(this).attr("for");
        campo = jQuery(this).attr("id");
        value = jQuery( '#' + campo + ' option:selected').text();
        
        if(value == " - Seleccionar - ") 
            value = "";
        
        jQuery('#lbl' + campo).text(value);
        
    });
}
*/

function hmtlHistorial( msj ){
    html = '';
    (msj.result['aHistorial']).forEach(function(row) {
        
        html += '<p class="bold">'+row['DESC_AUDITORIA']+' por '+row['NOMBRE']+' el '+row['FECHA']+'</span><br>';
        if(row['DESC_ANT']!= null )
            html += 'Cambió de <span class="bold">'+row['DESC_ANT']+' a <span class="bold">'+row['DESC_NUE'] +'</span>';
        
        html += '</p>';
    });
    return html;

}

function limpiarForm( form ){
    document.getElementById(form).reset();
}