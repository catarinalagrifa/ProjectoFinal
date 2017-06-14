(function($) {
    
// MEDIA UPLOADER
    var mediaUploader;


// PDF
    $('#upload-pdf').on('click', function(e) {
        e.preventDefault();
        
        if(mediaUploader){
            mediaUploader.open();
            return;
        }
        
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a PDF Document',
            button: {
                text: 'Choose a PDF Document'
            },
            multiple:false
        });
        
        mediaUploader.on('select', function() {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            
            $('id de onde quero o attachment').val(attachment.url);
            
            $('id preview do attachment').css('background-image', 'url('+attachment.url+')');
        });
        
        mediaUploader.open();
    });
    
})( jQuery );