
$(document).ready(function(){

    $('select[name="cboCanFilas"').change(function(){
        value = $('select[name="cboCanFilas"] option:selected').text();
        /*value1 = $("#nav_paginacion ul li.active a").attr('href');*/
        value1 = 1;
        if( ('.tbus_div').length > 0 ){
            //corregirFormBusqueda();
            ajaxListaBusqueda( value , value1 , 2, 'finca');
        }else{
            ajaxListaBusqueda( value , value1 , 1, 'finca');
        }
    });

    $('body').on('click','.getPaginacion',function(){
        value = $('select[name="cboCanFilas"] option:selected').text();
        value1 = $(this).attr('href');
        if( ('.tbus_div').length > 0 ){
            //corregirFormBusqueda();
            ajaxListaBusqueda( value , value1 , 2, 'finca');
        }else{
            ajaxListaBusqueda( value , value1 , 1, 'finca');
        }
        
        return false;
    });


    $('#form_busquedafinca').on( "input", ".busqueda-finca", function(){
        value = $('select[name="cboCanFilas"] option:selected').text();
        value1 = 1;
        ajaxListaBusqueda( value , value1 , 2 , 'finca');
     });


    $('#departamento').change(function(){
        ajaxprovincia( 'Busqueda');
        return false;
    });

    $('#provincia').change(function(){
        ajaxdistrito( 'Busqueda' );
        return false;
    });

    $('#distrito').change(function(){
        ajaxzona( 'Busqueda' );
        return false;
    });





});