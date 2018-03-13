<?php
if (isset($_GET['page']) == 'uc_page') {
    add_action('init', 'ink_ajax_script');
}
function ink_ajax_script() {
    wp_enqueue_script('ink_optional_ajax_script', plugins_url('js/ajax_script.js', __FILE__), array('jquery'));
    wp_localize_script('ink_optional_ajax_script', 'ink_ajax_script_call', array('ajaxurl' => admin_url('admin-ajax.php')));    
}
function ink_text_process_request() {
    $database_value = array(
        plugin_status => $_POST['status_value'],
        background_image_url => $_POST['bg_img_src'],
        logo_image_url => $_POST['logo_img_src'],
        title_of_page => $_POST['title_value'],
        descrption_of_page => $_POST['description_value'],
        tracking_code => $_POST['tracking_code'],
        facebook_link => $_POST['facebook_path'],
        twitter_link => $_POST['twitter_path'],
        googleplus_link => $_POST['googleplus_path'],
        page_background_color => $_POST['background_color'],
        title_font_size => $_POST['title_font_size'],
        title_font_style => $_POST['title_font_style'],
        title_font_color => $_POST['title_color'],
        description_font_size => $_POST['description_font_size'],
        description_font_style => $_POST['description_font_style'],
        description_font_color => $_POST['description_color'],
        owner_email_address => $_POST['email_address'],
        mesage_after_subscription => $_POST['message_after_subscription'],
        subscribe_btn_text => $_POST['subscribe_btn_text'],
        email_textbox_placeholder => $_POST['email_textbox_placeholder'],
        targeted_year => $_POST['year'],
        targeted_month => $_POST['month'],
        targeted_day => $_POST['day'],
        targeted_hour => $_POST['hour'],
        targeted_minute => $_POST['minute'],
        time_zone => $_POST['timezone']
    );
    update_option('ink_underconstruction_setting_value', $database_value);
    print_r($database_value);
    die();
}
add_action('wp_ajax_123', 'ink_text_process_request');
add_action('wp_ajax_nopriv_123', 'ink_text_process_request');
if ($_POST['reset']) { 
    delete_option('ink_underconstruction_setting_value');
    flush(); // Flush the buffer
    ob_flush();
    $site_url = $_SERVER['REQUEST_URI'];
    echo'<script> window.location="' . $site_url . '" </script> ';
}
?>