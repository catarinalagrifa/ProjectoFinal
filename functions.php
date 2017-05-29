<?php

function p01_script_enqueue() {
    
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/stylesheet.css', array(), '1.0.0', 'all');
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/stylesheet.js', array(), '1.0.0', 'true');
    
}

add_action('wp_enqueue_scripts', 'p01_script_enqueue');

function p01_theme_setup() {
    
    add_theme_support('menus');
    
    register_nav_menu('primary', 'Primary Navigation');
    
}

add_action('after_setup_theme', 'p01_theme_setup');

add_theme_support('custom-background');

add_theme_support('post-thumbnails');
set_post_thumbnail_size( 244 );

add_theme_support('post-formats', array('aside', 'image', 'video'));