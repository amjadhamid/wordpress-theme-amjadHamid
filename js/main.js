(function( $ ) {
 
    "use strict";
     
    // javascript code here. i.e.: $(document).ready( function(){} ); 
// for navbar 

 $(document).ready(function() {
        // Transition effect for navbar 
        $(window).scroll(function() {
          // checks if window is scrolled more than 500px, adds/removes solid class
          if($(this).scrollTop() > 500) { 
              $('.navbar').addClass('solid');
          } else {
              $('.navbar').removeClass('solid');
          }
        });


        // add form controll in all label
            $("[label]").each(function(){
      $(this).addClass("label");


       $("[label]").addClass("label");
    });
        	
});





})(jQuery);