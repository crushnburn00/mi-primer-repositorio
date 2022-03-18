
$(document).ready(function(){

    $('select[name="cboCanFilas"').change(function(){
        value = $('select[name="cboCanFilas"] option:selected').text();
        /*value1 = $("#nav_paginacion ul li.active a").attr('href');*/
        value1 = 1;
        if( ('.tbus_div').length > 0 ){
            //corregirFormBusqueda();
            ajaxListaBusqueda( value , value1 , 2, 'socio');
        }else{
            ajaxListaBusqueda( value , value1 , 1, 'socio');
        }
    });

    $('body').on('click','.getPaginacion',function(){
        value = $('select[name="cboCanFilas"] option:selected').text();
        value1 = $(this).attr('href');
        if( ('.tbus_div').length > 0 ){
            //corregirFormBusqueda();
            ajaxListaBusqueda( value , value1 , 2, 'socio');
        }else{
            ajaxListaBusqueda( value , value1 , 1, 'socio');
        }
        
        return false;
    });


    $('#form_busquedasocio').on( "input", ".busqueda-socio", function(){

        value = $('select[name="cboCanFilas"] option:selected').text();
        value1 = 1;
        
        ajaxListaBusqueda( value , value1 , 2 , 'socio');
        
     });

    $('.btnFinca').click(function(){

        inside = false;
        /*setTimeout("location.href='"+rutaInicial+'finca'+"'",2000);*/
        $('.inside').each(function(i, obj) {
            inside = true;
            firstChild = obj.firstChild
            div_a = firstChild.nextSibling;
            a = div_a.firstChild;
            id = a.getAttribute("id");
            window.location.replace(rutaInicial+'finca/listar/'+id);

        });

        if(!inside)
            alert('Seleccionar un socio.');

        
        return false;
    });



});