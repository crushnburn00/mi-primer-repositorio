$(document).ready(function(){

    $('#fecIniBus').datetimepicker({locale: 'es' , format: 'L'});
    $('#fecFinBus').datetimepicker({locale: 'es' , format: 'L'});

    $('select[name="cboCanFilas"').change(function(){

        value = $('select[name="cboCanFilas"] option:selected').text();
        value1 = 1;

        if( ('.tbus_div').length > 0 ){
            ajaxListaBusqueda( value , value1 , 2 , 'tarea');
        }else{
            ajaxListaBusqueda( value , value1 , 1 , 'tarea');
        }
    });

    $('body').on('click','.getPaginacion',function(){
        value = $('select[name="cboCanFilas"] option:selected').text();
        value1 = $(this).attr('href');
        if( ('.tbus_div').length > 0 ){
            
            ajaxListaBusqueda( value , value1 , 2 , 'tarea');
        }else{
            ajaxListaBusqueda( value , value1 , 1 , 'tarea');
        }
        
        return false;
    });

    $('#form_busquedatarea').on( "input", ".busqueda-tarea", function(){

        value = $('select[name="cboCanFilas"] option:selected').text();
        value1 = 1;

        ajaxListaBusqueda( value , value1 , 2 , 'tarea');
        
        
     });


});


