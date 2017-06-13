(function($) {
    
// VARIABLES

    var $window = $(window),
        $documentEl = $(document),
            
        $nav = $('.main-nav'),
        $navItem = $('.main-nav li'),
        $itemCount = $('.main-nav li').length,
            
        $modalCurriculum = $('#curriculum'),
        $modalContactForm = $('#contact-form'),
        $modalWrapper = $('.modal-wrapper'),
        $modalContent = $("#modal-content"),
        $closeButton = $('.close');
    
    
//  ON LOAD   
    $('.page-wrapper').css('display', 'none');
    $('.page-wrapper').fadeIn(1500);
    
    $nav.css('display', 'none');
    $nav.fadeIn(1500);
    
    
//  NAVIGATION MENU W/ MEDIA QUERIES
    if (matchMedia) {
        $mqMobile = window.matchMedia('(max-width: 719px)'),
        $mqDesktop = window.matchMedia('(min-width: 1024px)'),
        
        $mqMobile.addListener(WidthChangeMobile);
        WidthChangeMobile($mqMobile);

        $mqDesktop.addListener(WidthChangeDesktop);
        WidthChangeDesktop($mqDesktop);
    }

    function WidthChangeDesktop($mqDesktop) {
        if ($mqDesktop.matches) {
            $navItem.css({'height':'100%', 'width':'calc(100% / '+$itemCount+')'});

            $nav.mouseleave(function() {
                $navItem.css({'width':'calc(100% / '+$itemCount+')','opacity':'1','transition':'all 400ms ease 0'});
            })

            $navItem.mouseover(function() {
                $navItemHover = $(this);

                $(this).css({'width':'calc(100% - (74px * ('+$itemCount+' - 1)))','opacity':'1','transition':'all 400ms ease 0'});

                setTimeout(function() {
                    $navItemHover.find('a').css({'opacity':'1','transition':'all 1000ms ease'});
                }, 400); 

                $(this).siblings().css({'width':'74px','opacity':'0.5'});
            })

            $navItem.mouseleave(function() {
                $('.main-nav a').css({'opacity':'0','transition':'all 400ms ease'});
            })
        } else {
            $navItem.css({'height':'calc(100% / '+$itemCount+')', 'width':'100%'});
        }
    }
    
    function WidthChangeMobile($mqMobile) {
        if($mqMobile.matches) {
            $('#curriculum-button').click(function(e){
                $modalCurriculum.css('display','block');

                e.preventDefault();

                return false; 
            });
            
            $('#contact-form-button').click(function(e){
                $modalContactForm.css('display','block');

                e.preventDefault();

                return false; 
            });

            $closeButton.click(function() {
                $modalContactForm.css('display','none');
            });
            
            $window.click(function(e) {
                $modalCurriculum.css('display','none');
                $modalContactForm.css('display','none');
            });

            $('.modal').click(function(e){
                event.stopPropagation();
            });
        } else {
            $('.blog-post-button').click(function(e){
                var post_link = $('a', this).attr("href");

                e.preventDefault();

                $modalWrapper.css('display','block');

                $modalContent.html('<div class="loader"></div>');

                setTimeout(function() {
                    $modalContent.load(post_link + '#modal-ready');
                }, 700);

                return false; 
            });
    
            $('#curriculum-button').click(function(e){
                $modalCurriculum.css('display','block');

                e.preventDefault();

                return false; 
            });

            $('#contact-form-button').click(function(e){
                $modalContactForm.css('display','block');

                e.preventDefault();

                return false; 
            });

            $closeButton.click(function() {
                $modalWrapper.css('display','none');
                $modalContactForm.css('display','none');
            });

            $window.click(function(e) {
                $modalWrapper.css('display','none');
                $modalCurriculum.css('display','none');
                $modalContactForm.css('display','none');
            });

            $('.modal').click(function(e){
                event.stopPropagation();
            });
        }
    }
    

// TRANSITIONS

    $('.main-nav li a').click(function() {
        
        $navItem.css({'opacity':'0','transition':'all 800ms ease'});
        
        setTimeout(function() {
            $nav.css({'height':'10px','transition':'all 1000ms ease'})
        }, 400);
        
        href = $(this).attr('href');
        
        setTimeout(function() {
            window.location = href
        }, 1500);
        
        return false;
     });
    
    $('#goto-main-nav').click(function() {
        $('.page-wrapper').css({'opacity':'0','transition':'all 800ms ease'});
        
        setTimeout(function() {
            $('#goto-main-nav').css({'height':'100%','transition':'all 1000ms ease'})
        }, 800);
        
        href = $(this).attr('href');
        
        setTimeout(function() {
            location.href = '/projectofinal'
        }, 1500);
        
        return false;
     });
    
    
           
    
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
   
})( jQuery );