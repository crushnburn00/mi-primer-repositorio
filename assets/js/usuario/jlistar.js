$(document).ready(function(){

    $('select[name="cboCanFilas"').change(function(){
        value = $('select[name="cboCanFilas"] option:selected').text();
        /*value1 = $("#nav_paginacion ul li.active a").attr('href');*/
        value1 = 1;
        if( ('.tbus_solicitud').length > 0 ){
            //corregirFormBusqueda();
            ajaxListaBusqueda( value , value1 , 2 , 'usuario');
        }else{
            ajaxListaBusqueda( value , value1 , 1 , 'usuario');
        }
    });

    $('body').on('click','.getPaginacion',function(){
        value = $('select[name="cboCanFilas"] option:selected').text();
        value1 = $(this).attr('href');
        if( ('.tbus_solicitud').length > 0 ){
            //corregirFormBusqueda();
            ajaxListaBusqueda( value , value1 , 2 , 'usuario');
        }else{
            ajaxListaBusqueda( value , value1 , 1 , 'usuario');
        }
        
        return false;
    });

    $('#busqueda-solicitud').click(function(){
        $.ajax({
            url: rutaInicial + 'usuario/inputBusqueda',
            type: 'POST',
            dataType: 'json',
            data: { "value":    + 0 },
            success: function(msj){
                if(msj.respuesta == 'Ok'){
                    $('#tb_solicitud .tbus_solicitud').html(msj.html);
                    $('#tb_solicitud .tbus_solicitud').removeClass('hidden');
                    $('#buscar-solicitud').removeClass('hidden');
                    $('#busqueda-solicitud').addClass('hidden');
                    $('#finalizarbus-solicitud').removeClass('hidden');
                    $('#fecRegSolicitud').datetimepicker({locale: 'es' , format: 'L'});
                    
                }else{
                    if(msj.respuesta =='Login')
                        window.location.replace(rutaInicial);
                }
            },
            error:  function (jqXHR, textStatus, errorThrown ) {
                errorAjax(jqXHR , textStatus);
            }
        });

        return false;
    });



 
});





