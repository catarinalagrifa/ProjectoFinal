//alert("i'm working");

(function($) {
    
    // MENU-ITEM BACKGROUND COLOR
    $(".menu-item a").wrapInner("<span />");
    
   var documentEl = $(document),
       
        nav = $('.main-nav'),
        nav_item = $('.main-nav li'),
        item_count = $('.main-nav li').length,
        item_btn = $('.main nav a'),
       
        modal = $('#modal')[0],
        modal_btn = $('#modal-btn')[0],
       
        curriculum = $('#curriculum')[0],
        curriculum_btn = $('#curriculum-btn')[0],
       
        contactme = $('#contact-me')[0],
        contactme_btn = $('#contact-btn')[0],
       
        close_btn = $('.close');

    
    
// NAVIGATION MENU
    
    nav_item.css('width','calc(100% / '+item_count+')')
    
    nav.mouseleave(function() {
        nav_item.css({'width':'calc(100% / '+item_count+')','opacity':'1','transition':'all 400ms ease 0'});
    })
    
    nav_item.mouseenter(function() {
        
        $(this).css({'width':'calc(100% - (74px * ('+item_count+' - 1)))','opacity':'1','transition':'all 400ms ease 0'});
        
        setTimeout(function() {
            item_btn.css('opacity','1').fadeIn(800);
        }, 400);
        
    })
    
    nav_item.mouseout(function() {
        
        nav_item.css({'width':'74px','opacity':'0.5'});
        item_btn.css('opacity','0').fadeOut();
        
    })
  
  
  
// MODAL
 
  if ($("#modal-btn")[0]){
      
    modal_btn.onclick = function() {
            
            modal.style.display = "block";
            
        };
      
    close_btn.click(function() {
        
      modal.style.display = "none";
        
    });
        
  }

  if ($("#contact-btn")[0]){
    
        contactme_btn.onclick = function() {
            
            contactme.style.display = "block";
            
        };
        
        curriculum_btn.onclick = function() {
            
            curriculum.style.display = "block";
            
        };
        
        close_btn.click(function() {

            contactme.style.display = "none";
        
        });
        
  }
  
  window.onclick = function(event) {
        
        if (event.target == modal) {
            
            modal.style.display = "none";
            
        }
        
        if (event.target == curriculum) {
            
            curriculum.style.display = "none";
            
        }
        
        if (event.target == contactme) {
            
            contactme.style.display = "none";
            
        }
        
    }
	
	
})( jQuery );