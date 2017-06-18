<?php

/*----------------------------
        ADMNIN ENQUEUE FUNCTIONS
_____________________________*/


function kyanne_load_admin_style($hook) {
    if($hook != 'toplevel_page_lagrifa_kyanne' || $hook != 'final_page_lagrifa_kyanne_about') {
        wp_register_style('kyanne_admin', get_template_directory_uri() . '/css/admin.css', array(), '1.0.0', 'all');
        
        wp_enqueue_style('kyanne_admin');
    } else { return; }
}

add_action('admin_enqueue_scripts', 'kyanne_load_admin_style');




/*----------------------------
        FONT-END ENQUEUE FUNCTIONS
_____________________________*/


function kyanne_script_enqueue() {
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/stylesheet.css', array(), '1.0.0', 'all');
    
    wp_enqueue_style('mobilestyle', get_template_directory_uri() . '/css/mobile.css', array(), '1.0.0', 'all');
    
    wp_enqueue_style('tabletstyle', get_template_directory_uri() . '/css/tablet.css', array(), '1.0.0', 'all');
    
    wp_enqueue_style('desktopstyle', get_template_directory_uri() . '/css/desktop.css', array(), '1.0.0', 'all');
    
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/scriptsheet.js', array('jquery'), '1.0.0', 'true');
}

add_action('wp_enqueue_scripts', 'kyanne_script_enqueue');