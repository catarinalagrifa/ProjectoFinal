//alert("i'm working");

(function($) {
    
    $(".menu-item a").wrapInner("<span />");
    
   var documentEl = $(document),
        item1_bg = $('.nav-item01'),
        item2_bg = $('.nav-item02'),
        item3_bg = $('.nav-item03'),
        item1_lnk = $('.nav-item01 a'),
        item2_lnk = $('.nav-item02 a'),
        item3_lnk = $('.nav-item03 a');


// NAV ITEM 01

  item1_bg.mouseenter(function() {
      
    $(this).css({'width':'calc(100% - 148px)','opacity':'1','transition':'all 400ms ease 50ms' });
    setTimeout(function() {
        item1_lnk.css('opacity','1').fadeIn(800);
    }, 400);
      
    item2_bg.css({'width':'74px','opacity':'0.5'});
    item2_lnk.css('opacity','0').fadeOut();
      
    item3_bg.css({'width':'74px','opacity':'0.5'});
    item3_lnk.css('opacity','0').fadeOut();
      
  })
  

// NAV ITEM 02
  
  item2_bg.mouseenter(function() {
    
    $(this).css({'width':'calc(100% - 148px)','opacity':'1','transition':'all 400ms ease 50ms'});
    setTimeout(function() {
        item2_lnk.css('opacity','1').fadeIn(800);
    }, 400);
    
    item1_bg.css({'width':'74px','opacity':'0.5'});
    item1_lnk.css('opacity','0').fadeOut();
      
    item3_bg.css({'width':'74px','opacity':'0.5'});
    item3_lnk.css('opacity','0').fadeOut();
      
  })

  
// NAV ITEM 03
  
  item3_bg.mouseenter(function() {
    
    $(this).css({'width':'calc(100% - 148px)','opacity':'1','transition':'all 400ms ease 50ms'});
    setTimeout(function() {
        item3_lnk.css('opacity','1').fadeIn(800);
    }, 400);
    
    item1_bg.css({'width':'74px','opacity':'0.5'});
    item1_lnk.css('opacity','0').fadeOut();
      
    item2_bg.css({'width':'74px','opacity':'0.5'});
    item2_lnk.css('opacity','0').fadeOut();
      
  })
  
  
// MODAL
  
// Get the modal
    var modal = document.getElementById('modal');

// Get the button that opens the modal
    var btn = document.getElementById("modal-lnk");

// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
	
	
})( jQuery );