/*jslint browser: true, plusplus: true */
(function ($, window, document) {
    'use strict';
    $(document).ready(function () {
        $('#wporg_field').on('change', function () {
            $.post(woocom_meta_box_obj.url,
                   {
                       action: 'wporg_ajax_change', 
                       wporg_field_value: $('#wporg_field').val(), 
                       post_ID: $('#post_ID').val()
                   }, function (data) {
                        if (data === 'success') {
                        } else if (data === 'failure') {
                        } else {
                        }
                    }
            );
        });
    });
}(jQuery, window, document));