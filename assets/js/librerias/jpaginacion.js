(function($){  
  $.fn.alertId = function() {  
    for(var i=0; i<this.length; i++)
    {
      alert( $(this[i]).attr("id") );
    }
  };  
})(jQuery); 