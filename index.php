<?php
/*
 * Plugin Name: Ink Coming Soon Page
 * Description: Our awesome plugin allows you to quickly create a launch / under construction page for your website. Collect E-mails and connect with users on Social Networks. 
 * Version: 1.4
 * Author: Pankaj Agarwal
 * Author URI: http://inkthemes.com
 */
require_once 'option_panel.php';
require_once 'database_insert.php';

function table_ink_coming_soon() {
    global $wpdb;
    $table_name = $wpdb->prefix . "ink_coming_soon";
    $sql = "CREATE TABLE " . $table_name . " (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  subscriber_email VARCHAR(255) NOT NULL,
	  UNIQUE KEY id (id)
	);";
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

register_activation_hook(__FILE__, 'table_ink_coming_soon');



if (isset($_GET['page']) == 'uc_page') {
    //add_action("init", "ink_add_style");
    add_action('init', 'ink_script');
}

function ink_script() {
    wp_deregister_script('ink_option_panel_script');
    wp_register_script('ink_option_panel_script', plugins_url('js/panel_script.js', __FILE__), array('jquery'));
    wp_enqueue_script('ink_option_panel_script');
    wp_deregister_script('colorpicker_script');
    wp_register_script('colorpicker_script', plugins_url('jscolor/jscolor.js', __FILE__), array('jquery'));
    wp_enqueue_script('colorpicker_script');
    wp_enqueue_script('jquery');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_deregister_style('ink_option_panel_style');
    wp_register_style('ink_option_panel_style', plugins_url('css/panel_style.css', __FILE__));
    wp_enqueue_style('ink_option_panel_style');
    //wp_enqueue_script('ink-upload');
}

global $wpdb;
$get_value = get_option('ink_underconstruction_setting_value');
$status = $get_value['plugin_status'];
if ($status == 'enable') {

    add_action('template_redirect', 'ink_my_page_redirect_template');

    function ink_my_page_redirect_template() {
        if (!is_user_logged_in()) {
            $file = plugin_dir_path(__FILE__) . 'front_page/underconstruction_page.php';
            include($file);
            exit();
        }
    }

}
  if (isset($_POST['download'])) {
                            $filetype = $_POST['filetype'];
                            
                            if($filetype == 'csv'){
                            header("Content-type: application/x-msdownload", true, 200);
                            header("Content-Disposition: attachment; filename=subscriberlist.csv");
                            header("Pragma: no-cache");
                            header("Expires: 0");
                            echo 'Subscriber List';
                            echo "\n";
                             global $wpdb;
                                $ink_table_name = $wpdb->prefix . "ink_coming_soon";
                                $query = $wpdb->get_results("SELECT * FROM " . $ink_table_name);
                                foreach ($query as $row) {
                                echo $row->id ;
                                echo "\x20\x20"; 
                                echo $row->subscriber_email ; 
                                echo "\n";
                                }
                            
                            exit();   
                            unset($_POST);    
                            }
                            if($filetype == 'word'){
                            header("Content-type: application/x-msdownload", true, 200);
                            header("Content-Disposition: attachment; filename=subscriberlist.doc");
                            header("Pragma: no-cache");
                            header("Expires: 0");
                            
                            echo 'Subscriber List';
                            echo "\n";
                             global $wpdb;
                                $ink_table_name = $wpdb->prefix . "ink_coming_soon";
                                $query = $wpdb->get_results("SELECT * FROM " . $ink_table_name);
                                foreach ($query as $row) {
                                echo $row->id ;
                                echo "\x20\x20"; 
                                echo $row->subscriber_email ; 
                                echo "\n";
                                }
                            exit();   
                             unset($_POST);   
                            }
                           
                            if($filetype == 'pdf'){
                            header("Content-type: application/x-msdownload", true, 200);
                            header("Content-Disposition: attachment; filename=subscriberlist.pdf");
                            header("Pragma: no-cache");
                            header("Expires: 0");
                           
                            echo 'Subscriber List';
                            echo "\n";
                             global $wpdb;
                                $ink_table_name = $wpdb->prefix . "ink_coming_soon";
                                $query = $wpdb->get_results("SELECT * FROM " . $ink_table_name);
                                foreach ($query as $row) {
                                echo $row->id ;
                                echo "\x20\x20"; 
                                echo $row->subscriber_email ; 
                                echo "\n";
                                }
                            exit();   
                             unset($_POST);   
                            }
                           
                        }
?>