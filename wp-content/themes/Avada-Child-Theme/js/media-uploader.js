jQuery(document).ready(function() {
	 //alert("hello");
	jQuery('#profile-upload').click(function(e) {
		e.preventDefault();
		single_img_upload(this);
	});

});
function single_img_upload(this_val){
    
    var gmh_media_upload;

    // If the uploader object has already been created, reopen the dialog
    if( gmh_media_upload ) {
        gmh_media_upload.open();
        return;
    }

    // Extend the wp.media object
    gmh_media_upload = wp.media.frames.file_frame = wp.media({
        title: 'Images',
        button: { text: 'Upload Image' },
        multiple: false
    });

    //When a file is selected, grab the URL and set it as the text field's value
    gmh_media_upload.on( 'select', function() {
        attachment = gmh_media_upload.state().get( 'selection' ).first().toJSON();
//        console.log(attachment); //irrelevant to functionality but useful
        //adds the ID to the hidden input
        jQuery(this_val).siblings('.single-img-id').val( attachment.id );
        //provides the preview image
        jQuery(this_val).siblings('.single-thumbnail').empty();
        jQuery(this_val).siblings('.single-thumbnail').append( '<img src="' + attachment.sizes.thumbnail.url + '" class="attachment-thumbnail myplugin-preview" />' );
//        jQuery(this_val).siblings('#myplugin-new-global').show();
    });

    //Open the uploader dialog
    gmh_media_upload.open();
 
 
 
/* $(document).ready(function(){
//alert("hi");
 //var file_frame;
 $(function() {
        var file_frame; // variable for the wp.media file_frame

        // attach a click event (or whatever you want) to some element on your page
        $( '#frontend-button' ).on( 'click', function( event ) {
            event.preventDefault();
			//alert("hello");

            // if the file_frame has already been created, just reuse it
            if ( file_frame ) {
                file_frame.open();
                return;
            }

            file_frame = wp.media.frames.file_frame = wp.media({
                title: $( this ).data( 'uploader_title' ),
                button: {
                    text: $( this ).data( 'uploader_button_text' ),
                },
                multiple: false // set this to true for multiple file selection
            });

            file_frame.on( 'select', function() {
                attachment = file_frame.state().get('selection').first().toJSON();

                // do something with the file here
                //$( '#frontend-button' ).hide();
                $( '#frontend-image' ).attr('src', attachment.url); 
                $( '#frontend-image' ).attr('src-id', attachment.id); 
            });

            file_frame.open();
        });
    });
}); */

    
}
 
 

 /* (function($) {
    // When the DOM is ready.
    $(function() {
        var file_frame; // variable for the wp.media file_frame

        // attach a click event (or whatever you want) to some element on your page
        $( '#frontend-button' ).on( 'click', function( event ) {
            event.preventDefault();
			alert("hello");

            // if the file_frame has already been created, just reuse it
            if ( file_frame ) {
                file_frame.open();
                return;
            }

            file_frame = wp.media.frames.file_frame = wp.media({
                title: $( this ).data( 'uploader_title' ),
                button: {
                    text: $( this ).data( 'uploader_button_text' ),
                },
                multiple: false // set this to true for multiple file selection
            });

            file_frame.on( 'select', function() {
                attachment = file_frame.state().get('selection').first().toJSON();

                // do something with the file here
                //$( '#frontend-button' ).hide();
                $( '#frontend-image' ).attr('src', attachment.url); 
                $( '#frontend-image' ).attr('src-id', attachment.id); 
            });

            file_frame.open();
        });
    });

})(jQuery); */