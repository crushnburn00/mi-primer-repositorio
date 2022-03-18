
var server = window.location.hostname;

if(server == '10.30.10.102'){
    server = server + ':8080';
}


var rutaInicial = "http://"+server+"/tracesysorganics/";



$(document).ready(function(){
//debugger;
    $("#verPassword").mousedown(function(){
        $('input[name="txtpass"]').attr('type', 'text');
        $(this).removeClass("icon-eye");
        $(this).addClass("icon-eye-blocked");
    });

    $("#verPassword").mouseup(function(){
        $('input[name="txtpass"]').attr('type', 'password');
        $(this).addClass("icon-eye");
        $(this).removeClass("icon-eye-blocked");
    });

    /*$('body').on('click','.tbody_div .row_div',function(){

        $('.inside').each(function(i, obj) {
            $( this ).removeClass( "inside" );
        });

        if($(this).hasClass( "inside" )){
            $( this ).removeClass( "inside" );
        }else{
            $( this ).addClass( "inside" );
        }

    }); */


});