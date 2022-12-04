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
                } else {
                    console.log( data )
                    $("#paynow").attr('href', data);
                    $("#submitNow").hide();
                    $("#paynow").show();
                    $(".woocom-reservation-wrapper form")[0].reset();
                }
            } )
            return false;
        } )
    } )
} )( jQuery )