<?php

/*----------------------------
        INCLUDE SCRIPTS
_____________________________*/


function projectofinal_script_enqueue() {
    
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/stylesheet.css', array(), '1.0.0', 'all');
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/scriptsheet.js', array('jquery'), '1.0.0', 'true');
    
}

add_action('wp_enqueue_scripts', 'projectofinal_script_enqueue');




/*----------------------------
        ACTIVATE MENUS
_____________________________*/


function projectofinal_theme_setup() {
    
    add_theme_support('menus');
    
    register_nav_menu('primary', 'Primary Navigation');
    
}

add_action('after_setup_theme', 'projectofinal_theme_setup');




/*----------------------------
    THEME SUPPORT FUNCTION
_____________________________*/


add_theme_support('custom-background');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside', 'image', 'video'));




/*----------------------------
    THUMBNAIL DEFINITIONS
_____________________________*/

set_post_thumbnail_size( 244 );

//add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );
//
//function my_post_image_html( $html, $post_id, $post_image_id ) {
//    $html = '<a href="' . get_permalink( $post_id ) . '" title="' . 
//        esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
//    return $html;
//}




/*----------------------------
        HEADER FUNCTION
_____________________________*/


function projectofinal_remove_version() {
    return '';
}
add_filter('the_generator', 'projectofinal_remove_version');