(function($) {
    
//  NAVIGATION MENU W/ MEDIA QUERIES
    if (matchMedia) {
      var   mq = window.matchMedia('(min-width: 1024px)'),
            nav = $('.main-nav'),
            navItem = $('.main-nav li'),
            itemCount = $('.main-nav li').length;

      mq.addListener(WidthChange);
      WidthChange(mq);
    }

    function WidthChange(mq) {
        if (mq.matches) {
            navItem.css({'height':'100%', 'width':'calc(100% / '+itemCount+')'});

            nav.mouseleave(function() {
                navItem.css({'width':'calc(100% / '+itemCount+')','opacity':'1','transition':'all 400ms ease 0'});
            })

            navItem.mouseover(function() {
                navItemHover = $(this);

                $(this).css({'width':'calc(100% - (74px * ('+itemCount+' - 1)))','opacity':'1','transition':'all 400ms ease 0'});

                setTimeout(function() {
                    navItemHover.find('a').css({'opacity':'1','transition':'all 1000ms ease'});
                }, 400); 

                $(this).siblings().css({'width':'74px','opacity':'0.5'});
            })

            navItem.mouseleave(function() {

                $('.main-nav a').css({'opacity':'0','transition':'all 400ms ease'});
            })
        } else {
            navItem.css({'height':'calc(100% / '+itemCount+')', 'width':'100%'});
        }
    }
    
    
    
// VARIABLES

        documentEl = $(document),
       
        modal = $('.modal')[0],
        postLink = $('.blog-post-modal'),
        modalButton = $('.blog-post-btn')[0],    
       
        curriculum = $('#curriculum')[0],
        curriculumButton = $('#curriculum-btn')[0],
       
        contactForm = $('#contact-form')[0],
        contactFormButton = $('#contact-form-btn')[0],
       
        closeButton = $('.close');
    
           
    
// MENU-ITEM BACKGROUND COLOR
    
    $(".main-nav a").wrapInner("<span />");
    
    
    
    
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
                    setTimeout(function() {
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-error').delay(200).fadeIn(500).addClass('js-show-feedback');
                        form.find('input, textarea').removeAttr('disabled');
                    }, 1000);
                } else {
                    setTimeout(function() {
                        $('.text-form-group').css('display', 'none');
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-success').delay(200).fadeIn(500).addClass('js-show-feedback');
                        form.find('input, textarea').removeAttr('disabled').val('');
                    }, 1000);
                }
            },

        })
    });
    


// MODAL
    
  if (modalButton){
    modalButton.onclick = function() {
        modal.style.display = "block";
    };
      
    closeButton.click(function() {
        modal.style.display = "none";
    });    
  }

  if (contactFormButton){
    curriculumButton.onclick = function() {
        curriculum.style.display = "block";
    };
      
    contactFormButton.onclick = function() {
        contactForm.style.display = "block";
            
    };
        
    closeButton.click(function() {
        contactForm.style.display = "none";
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
        contactForm.style.display = "none";
    }
  }
	
})( jQuery );