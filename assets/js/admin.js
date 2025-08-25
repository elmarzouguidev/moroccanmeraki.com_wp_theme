(function ($) {
    "use strict";
    //find the hidden post type input, and grab the value
    if ($('#post_type').val() === 'review-rating' || $('#post_type').val() == 'enquiries') {
        $('#title').attr('disabled', 'disabled');
    }
    // Update Dashboard Comment Status
    jQuery('.turio_tour_action').click(function (event) {
        event.preventDefault();
        var post_status = $(this).val();
        var post_id = $(this).attr('post-id');
        var data = {
            'action': 'turio_tour_rating_action',
            'post_id': post_id,
            'post_status': post_status,
        };
        $.ajax({ // you can also use $.post here
            url: egens_ajax_handler_params.ajaxurl, // AJAX handler
            data: data,
            type: 'POST',
            success: function () {
                if (post_status == 'approve') {
                    jQuery('.turio_tour_action[post-id="' + post_id + '"]').empty().html('Unapprove');
                    jQuery('.turio_tour_action[post-id="' + post_id + '"]').val('reject');
                } else {
                    jQuery('.turio_tour_action[post-id="' + post_id + '"]').empty().html('Approve');
                    jQuery('.turio_tour_action[post-id="' + post_id + '"]').val('approve');
                }
            }
        });
    });
    if (!egens_ajax_handler_params.is_woocommerce_active) {
        $('select option[value="booking_form"]').remove();
        $('select option[value="both"]').remove();
        $('select option[value="enquiry_form"]').attr('selected', true);
    }


    $(".check-in-date .hasDatepicker").datepicker({
        minDate: 0,
        dateFormat: 'dd-mm-yy'
    });
    $(".check-out-date .hasDatepicker").attr("disabled", "disabled");
    $(".check-out-date .hasDatepicker").datepicker({
        minDate: 0,
        dateFormat: 'dd-mm-yy'
    });

    $(".check-in-date .hasDatepicker").on("change", function () {
        onCheckin();

    });

    function onCheckin() {
        if ($(".check-in-date .hasDatepicker").val() !== "") {
            $(".check-out-date .hasDatepicker").removeAttr("disabled");
            var dateMin = $('.check-in-date .hasDatepicker').datepicker("getDate");
            var rMin = new Date(dateMin.getFullYear(), dateMin.getMonth(), dateMin.getDate() + 1);
            $(".check-out-date .hasDatepicker").datepicker('option', 'minDate', new Date(rMin));
        } else {
            $(".check-out-date .hasDatepicker").val("");
            $(".check-out-date .h asDatepicker").attr("disabled", "disabled");
        }
    }


}(jQuery));