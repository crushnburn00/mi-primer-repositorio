$(document).ready(function () {
    //debugger;
    buscarUsuario();
    finalizarbus();


})


function buscarUsuario() {
    $('#busqueda-usuario').click(function(){
        $.ajax({
            url: /* rutaInicial */'http://localhost:8080/tracesyscafe/' + 'usuario/inputBusquedaUsuario',
            type: 'POST',
            dataType: 'json',
            data: { "value":    + 0 },
            success: function(msj){
                if(msj.respuesta == 'Ok'){
                    $('#tb_solicitud .tbus_solicitud').html(msj.html);
                    $('#tb_solicitud .tbus_solicitud').removeClass('hidden');
                    $('#buscar-usuario').removeClass('hidden');   
                    $('#busqueda-usuario').addClass('hidden');
                    $('#finalizarbus-solicitud').removeClass('hidden');
                    $('#fecRegSolicitud').datetimepicker({locale: 'es' , format: 'L'});
                    
                }else{
                    if(msj.respuesta =='Login')
                        window.location.replace(/* rutaInicial */'http://localhost:8080/tracesyscafe/');
                }
            },
            error:  function (jqXHR, textStatus, errorThrown ) {
                errorAjax(jqXHR , textStatus);
            }
        });

        return false;
    });
}

function finalizarbus() {
    $('#finalizarbus-solicitud').click(function(){
        $('#finalizarbus-solicitud').addClass('hidden');
        $('#buscar-usuario').addClass('hidden');
        $('#busqueda-usuario').removeClass('hidden');
        $('.tbus_solicitud').html('');
        $('.tbus_solicitud').addClass('hidden');

       /*  value = $('select[name="cboCanFilas"] option:selected').text(); */
        value1 = 1;
        ajaxListaBusqueda( value , value1 , 1);

        return false;
    });
}


function ajaxListaBusqueda( cantfilas , pagina , opcion){
    if( opcion == 1 ){
        url = 'generarHtmlLista';
        data = { "value":    + cantfilas ,
                "value1":    + pagina };
    }else{
        url = 'buscar';
        data = $('#form_busqueda').serialize()+'&value='+cantfilas+'&value1='+pagina;
    }

    jQuery.ajax({
        url: rutaInicial + 'solicitud/'+ url,
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function(msj){
            if(msj.respuesta == 'Ok'){
                finreg = pagina*cantfilas;
                totalreg = msj.pag['TOTALREGISTROS'];

                jQuery('#tb_solicitud .tbody_solicitud').html( msj.lista );
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