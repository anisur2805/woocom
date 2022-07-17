(function ($, window, document) {
    'use strict';
    // execute when the DOM is ready
    $(document).ready(function () {
		$("#woocom_filed").on('change', function () {
			$.post(woocom_meta_box_obj.url, {
				action: woocom_meta_box_action,
				woocom_meta_box_value: $('#wporg_field').val(),
				post_ID: jQuery('#post_ID').val()   

			}, function( data) {
				if(data=='success'){
					console.log( 'data ', data )
				} else if(data=='failure'){
					console.log( 'sad' );
				} else {
					console.log( 'nothing' );
				}
			})
		})
		})
	}(jQuery, window, document));