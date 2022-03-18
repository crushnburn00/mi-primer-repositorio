$(document).ready(function(){

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

    $('body').on('mouseenter','.tbody_solicitud .tr_solicitud',function(){
        $( this ).addClass( "inside" );
    }); 

    $('body').on('mouseleave','.tbody_solicitud .tr_solicitud',function(){
        $( this ).removeClass( "inside" );
    });

    

});

