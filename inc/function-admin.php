<?php

set_post_thumbnail_size( 244 );




/*----------------------------
        HEADER FUNCTION
_____________________________*/


function kyanne_remove_version() {
    return '';
}
add_filter('the_generator', 'projectofinal_remove_version');




/*----------------------------
        ADMIN PAGE
_____________________________*/


function add_admin_page() {
 
    add_menu_page('Kyanne Theme Options', 'Projecto Final', 'manage_options', 'lagrifa_kyanne', 'kyanne_theme_create_page', 'dashicons-admin-customizer', 110);
    
    add_submenu_page('lagrifa_kyanne', 'Kyanne Menu Options', 'Menu Options', 'manage_options', 'lagrifa_kyanne', 'kyanne_theme_create_page');
    add_submenu_page('lagrifa_kyanne', 'Kyanne About Page Options', 'About Page Options', 'manage_options', 'lagrifa_kyanne_about', 'kyanne_theme_settings_page');
    
}

add_action( 'admin_menu', 'kyanne_add_admin_page' );

function kyanne_custom_settings() {
    
    // MENU OPTIONS
    
    
    // ABOUT PAGE OPTIONS
    register_setting( 'kyanne-settings-group', 'btn_curriculum' );
	register_setting( 'kyanne-settings-group', 'btn_contact_form' );
    
    add_settings_section( 'kyanne-sidebar-options', 'About Page Option', 'kyanne_sidebar_options', 'lagrifa_kyanne');
    
}