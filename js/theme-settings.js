jQuery(document).ready(function($) {
    // Media Uploader
    $('#upload_logo_button').click(function(e) {
        e.preventDefault();
        
        var image = wp.media({
            title: 'Upload Logo',
            multiple: false
        }).open()
        .on('select', function(e){
            var uploaded_image = image.state().get('selection').first();
            var image_url = uploaded_image.toJSON().url;
            $('#ct_logo').val(image_url);
            $('.logo-preview').html('<img src="' + image_url + '" style="max-width: 200px; margin-bottom: 10px;">');
        });
    });
}); 