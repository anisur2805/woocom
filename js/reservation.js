; ( function ( $ ) {
    $( document ).ready( function () {
        $( "#submitNow" ).on( 'click', function () {
            $.post( reserveObj.siteUrl, {
                action: 'reservation_callback',
                rn: $( "#rn" ).val(),
                name: $( "#name" ).val(),
                email: $( "#email" ).val(),
                phone: $( "#phone" ).val(),
                persons: $( "#persons" ).val(),
                date: $( "#date" ).val(),
                time: $( "#time" ).val(),
            }, function ( data ) {
                if ( 'Duplicate' == data ) {
                    alert( reserveObj.duplicate_msg )
                } else if ( 'Successful' == data ) {
                    alert( reserveObj.success_msg )
                    $(".woocom-reservation-wrapper form")[0].reset()
                }
            } )
            return false;
        } )
    } )
} )( jQuery )