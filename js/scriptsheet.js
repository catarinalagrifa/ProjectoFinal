(function($) {
    
// MENU-ITEM BACKGROUND COLOR
    
    $(".menu-item a").wrapInner("<span />");
    
    
    
// VARIABLES
    
   var documentEl = $(document),
       
        nav = $('.main-nav'),
        nav_item = $('.main-nav li'),
        item_count = $('.main-nav li').length,
        item_btn = $('.main nav a'),
       
        modal = $('#modal')[0],
        modal_btn = $('#modal-btn')[0],
       
/*      
        $curriculum_check = get_option('activate_button_curriculum');
        $curriculum_checked = (@$curriculum_check == 1 ? 'checked' : '');
       
        $contact_form_check = get_option('activate_button_contact_form');
        $contact_form_checked = (@$contact_form_check == 1 ? 'checked' : '');
*/       
       
        curriculum = $('#curriculum')[0],
        curriculum_btn = $('#curriculum-btn')[0],
       
        contact_form = $('#contact-form')[0],
        contact_form_btn = $('#contact-form-btn')[0],
       
        close_btn = $('.close');

    
    
// NAVIGATION MENU
    
    nav_item.css('width','calc(100% / '+item_count+')')
    
    nav.mouseleave(function() {
        nav_item.css({'width':'calc(100% / '+item_count+')','opacity':'1','transition':'all 400ms ease 0'});
    })
    
    nav_item.mouseover(function() {
        
        $(this).css({'width':'calc(100% - (74px * ('+item_count+' - 1)))','opacity':'1','transition':'all 400ms ease 0'});
        
        setTimeout(function() {
            item_btn.css('opacity','1').fadeIn(800);
        }, 400);
        
        $(this).siblings().css({'width':'74px','opacity':'0.5'});
        
    })
    
    nav_item.mouseleave(function() {
        
        item_btn.css('opacity','0').fadeOut();
        
    })
  
  
/*  
// BUTTONS ACTIVE/INACTIVE
    
    if(curriculum_checked) {
        curriculum_btn.css('display','none');
    } else {
        curriculum_btn.css('display','inline-block');
    }
*/
    
    
// CONTACT FORM
    
    $('.contact-form').on('submit', function(e) {
        e.preventDefault();
        
        $('.has-error').removeClass('has-error');
        $('.js-show-feedback').removeClass('js-show-feedback');
        
        var form = $(this),
            name = form.find('#name').val(),
            email = form.find('#email').val(),
            message = form.find('#message').val(),
            ajaxurl = form.data('url');
        
        if(name === '') {
            $('#name').parent('.form-group').addClass('has-error');
            return;
        }
        
        if(email === '') {
            $('#email').parent('.form-group').addClass('has-error');
            return;
        }
        
        if(message === '') {
            $('#message').parent('.form-group').addClass('has-error');
            return;
        }
        
        form.find('input, textarea').attr('disabled', 'disabled');
        
        form.find('#submit').fadeOut(300);
        
        $('.js-form-submission').delay(200).fadeIn(500).addClass('js-show-feedback');
        
        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                name: name,
                email: email,
                message: message,
                action: 'kyanne_save_user_contact_form'
                
            },
            error: function(response) {
                $('.js-form-submission').removeClass('js-show-feedback');
                $('.js-form-error').delay(200).fadeIn(500).addClass('js-show-feedback');
                form.find('input, textarea').removeAttr('disabled');
            },
            success: function(response) {
                if(response == 0){
                    $('.js-form-submission').removeClass('js-show-feedback');
                    $('.js-form-error').delay(200).fadeIn(500).addClass('js-show-feedback');
                    form.find('input, textarea').removeAttr('disabled');
                } else {
                    $('.js-form-submission').removeClass('js-show-feedback');
                    $('.js-form-success').delay(200).fadeIn(500).addClass('js-show-feedback');
                    form.find('input, textarea').removeAttr('disabled').val('');
                }
            },

        })
    });
    


// MODAL
 
  if (modal_btn){
      
    modal_btn.onclick = function() {
            
            modal.style.display = "block";
            
        };
      
    close_btn.click(function() {
        
      modal.style.display = "none";
        
    });
        
  }

  if (contact_form_btn){
    
        contact_form_btn.onclick = function() {
            
            contact_form.style.display = "block";
            
        };
        
        curriculum_btn.onclick = function() {
            
            curriculum.style.display = "block";
            
        };
        
        close_btn.click(function() {

            contact_form.style.display = "none";
        
        });
        
  }
  
  window.onclick = function(event) {
        
        if (event.target == modal) {
            
            modal.style.display = "none";
            
        }
        
        if (event.target == curriculum) {
            
            curriculum.style.display = "none";
            
        }
        
        if (event.target == contact_form) {
            
            contact_form.style.display = "none";
            
        }
        
    }
	
	
})( jQuery );