$j = jQuery.noConflict();
$j(document).ready(function() {

    $j('#button_save').click(function() {
       jQuery('.save_image').css("display", "block ");
        /****** general setting  *********/
        var status__value = $j('input:radio[name=status]:checked').val();
        var bg_img_url = $j('#upload_background').val();
        var logo_img_url = $j('#upload_logo').val();
        var title_value = $j('#title').val();
        var description_value = $j('#descrip').val();
        var tracking_code = $j('#tracking').val();
        var fb_link = $j('input#fb').val();
        var twitter_link = $j('input#twitter').val();
        var google_link = $j('input#googleplus').val();

        /************** Appearence setting *********/

        var background_color = $j('input#background_color').val();
        var title_font_size = $j("#pxselect_post_title option:selected").val();
        var title_font_style = $j("#inknotice_font_style_prompt option:selected").val();
        var title_color = $j("input#title_color").val();

        var description_font_size = $j("#pxselect_post_description option:selected").val();
        var description_font_style = $j("#inknotice_font_style_prompt_description option:selected").val();
        var description_color = $j("input#description_color").val();

        /**************** Notification Setting ***********/

        var email_address = $j('#email').val();
        var message_after_subscription = $j('#message').val();
        var subscribe_btn_text = $j('#sb_btn').val();
        var email_textbox_placeholder = $j('#placeholder_text').val();
        var targeted_year = $j('#targeted_year_input').val();

        var targeted_month = $j('#targeted_month_input').val();
        var targeted_day = $j('#targeted_day_input').val();
        var targeted_hour = $j('#targeted_hour_input').val();
        var targeted_minute = $j('#targeted_minute_input').val();
        var tz = $j('#time_zone_input').val();


        var settings_data = {
            action: '123',
            status_value: status__value,
            bg_img_src: bg_img_url,
            logo_img_src: logo_img_url,
            title_value: title_value,
            description_value: description_value,
            tracking_code: tracking_code,
            facebook_path: fb_link,
            twitter_path: twitter_link,
            googleplus_path: google_link,
            background_color: background_color,
            title_font_size: title_font_size,
            title_font_style: title_font_style,
            title_color: title_color,
            description_font_size: description_font_size,
            description_font_style: description_font_style,
            description_color: description_color,
            email_address: email_address,
            message_after_subscription: message_after_subscription,
            subscribe_btn_text: subscribe_btn_text,
            email_textbox_placeholder: email_textbox_placeholder,
            year: targeted_year,
            month: targeted_month,
            day: targeted_day,
            hour: targeted_hour,
            minute: targeted_minute,
            timezone: tz

        };
      
        $j.post(ink_ajax_script_call.ajaxurl, settings_data, function(ink_response) {
            if (ink_response) {
               // alert(ink_response);
            jQuery('.save_image').css("display", "none");
            }
            else {
                alert("error");
            jQuery('.save_image').css("display", "none");
            }
        });
    });
 
});