(function($) {
    
    $('.color-field').wpColorPicker();
    
    
    
    var mediaUploader;
    
    $('#upload-button-curriculum').on('click', function(e) {
        
        e.preventDefault();
        
        if(mediaUploader){
            mediaUploader.open();
            return;
        }
        
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose an Image',
            button: {
                text: 'Choose Image'
            },
            multiple:false
        });
        
        mediaUploader.on('select', function() {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            
            $('#button-curriculum').val(attachment.url); 
            $('#button-curriculum-preview').css('background-image', 'url('+attachment.url+')');
        });
        
        mediaUploader.open();
        
    });
    
    $('#upload-button-contact-form').on('click', function(e) {
        
        e.preventDefault();
        
        if(mediaUploader){
            mediaUploader.open();
            return;
        }
        
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose an Image',
            button: {
                text: 'Choose Image'
            },
            multiple:false
        });
        
        mediaUploader.on('select', function() {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#button-contact-form').val(attachment.url);
            $('#button-contact-form-preview').css('background-image', 'url('+attachment.url+')');
        });
        
        mediaUploader.open();
    });
    
})( jQuery );