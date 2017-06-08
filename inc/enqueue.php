<?php

/*----------------------------
    ADMNIN ENQUEUE FUNCTIONS
_____________________________*/


function kyanne_load_admin_scripts($hook) {
    if($hook != 'toplevel_page_lagrifa_kyanne' || $hook != 'final_page_lagrifa_kyanne_about') {

        wp_register_style('kyanne_admin', get_template_directory_uri() . '/css/kyanne.admin.css', array(), '1.0.0', 'all');

        wp_enqueue_style('kyanne_admin');
        wp_enqueue_style('wp-color-picker'); 

        wp_enqueue_media();

        wp_register_script('kyanne-admin-script', get_template_directory_uri() . '/js/kyanne.admin.js', array('jquery'), '1.0.0', true);

        wp_enqueue_script('kyanne-admin-script');
        wp_enqueue_script( 'wp-color-picker' );
    
    } else { return; }
}

add_action('admin_enqueue_scripts', 'kyanne_load_admin_scripts');




/*----------------------------
    FONT-END ENQUEUE FUNCTIONS
_____________________________*/


function kyanne_script_enqueue() {
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/stylesheet.css', array(), '1.0.0', 'all');
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/scriptsheet.js', array('jquery'), '1.0.0', 'true');
}

add_action('wp_enqueue_scripts', 'kyanne_script_enqueue');