<?php

function ink_options_setup() {
    global $pagenow;
    if ('media-upload.php' == $pagenow || 'async-upload.php' == $pagenow) {
        // Now we'll replace the 'Insert into Post Button inside Thickbox' 
        add_filter('gettext', 'replace_thickbox_text', 1, 2);
    }
}
add_action('admin_init', 'ink_options_setup');
function replace_thickbox_text($translated_text, $text) {
    if ('Insert into Post' == $text) {
        $referer = strpos(wp_get_referer(), 'uc_page');
        if ($referer != '') {
            return __('Upload Image', 'ink');
        }
    }
    return $translated_text;
}
?>