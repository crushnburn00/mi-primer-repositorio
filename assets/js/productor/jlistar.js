
$(document).ready(function(){

    $('select[name="cboCanFilas"').change(function(){
        value = $('select[name="cboCanFilas"] option:selected').text();
        /*value1 = $("#nav_paginacion ul li.active a").attr('href');*/
        value1 = 1;
        if( ('.tbus_div').length > 0 ){
            //corregirFormBusqueda();
            ajaxListaBusqueda( value , value1 , 2, 'productor');
        }else{
            ajaxListaBusqueda( value , value1 , 1, 'productor');
        }
    });

    $('body').on('click','.getPaginacion',function(){
        value = $('select[name="cboCanFilas"] option:selected').text();
        value1 = $(this).attr('href');
        if( ('.tbus_div').length > 0 ){
            //corregirFormBusqueda();
            ajaxListaBusqueda( value , value1 , 2, 'productor');
        }else{
            ajaxListaBusqueda( value , value1 , 1, 'productor');
        }
        
        return false;
    });


    $('#form_busquedaproductor').on( "input", ".busqueda-productor", function(){

        value = $('select[name="cboCanFilas"] option:selected').text();
        value1 = 1;
        
        ajaxListaBusqueda( value , value1 , 2 , 'productor');
        
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


function corregirFormBusqueda(){

    jQuery('#form_busqueda input[type="text"]').each(function(){
        campo = 'input[name="'+ jQuery(this).attr('name')+'"]' ;  
        valueTemp = jQuery( campo ).val();
        valuea = jQuery( campo.replace('Temp','') ).val();
        if(valuea != valueTemp)
            jQuery( campo ).val( valuea );
    });

    jQuery('#form_busqueda select').each(function(){
        campo = 'input[name="'+ jQuery(this).attr('name').replace('Temp','') +'"]' ;              
        valueTemp = jQuery( this ).val();
        valuea = jQuery( campo ).val();
        if(valuea != valueTemp)
            jQuery('#'+jQuery(this).attr('id')+' option:selected').removeAttr("selected");
        jQuery( this ).val( valuea );
    });
}
