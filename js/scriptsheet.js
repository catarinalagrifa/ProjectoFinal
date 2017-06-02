//alert("i'm working");

(function($) {
    
    $(".menu-item a").wrapInner("<span />");
    
   var documentEl = $(document),
        nav_item = $('.main-nav li'),
        nav_item_lnk = $('.main-nav a'),
        item_count = $(".main-nav li").length;
    
// DYNAMIC WIDTH
    
    nav_item.css('width','calc(100% / item_count)');
    
    


  
  
// PAGE TRANSITION
  
  $('.main-nav').on('click', function(){
      $('.blackout').css('opacity','1').fadeIn(800);
      $('.home-wrapper').css('height','10px');
  })
  
  
  
// MODAL
  
// Get the modal
//    var modal = document.getElementById('modal');
//
//// Get the button that opens the modal
//    var btn = document.getElementById("modal-lnk");
//
//// Get the <span> element that closes the modal
//    var span = document.getElementsByClassName("close")[0];
//
//// When the user clicks the button, open the modal 
//    btn.onclick = function() {
//        modal.style.display = "block";
//    }
//
//// When the user clicks on <span> (x), close the modal
//    span.onclick = function() {
//        modal.style.display = "none";
//    }
//
//// When the user clicks anywhere outside of the modal, close it
//    window.onclick = function(event) {
//        if (event.target == modal) {
//            modal.style.display = "none";
//        }
//    }
	
	
})( jQuery );