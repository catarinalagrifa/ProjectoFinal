<?php 

add_theme_support('post-thumbnails');

add_theme_support('post-formats', array('aside', 'image', 'video'));




/*----------------------------
        ACTIVATE MENUS
_____________________________*/


function kyanne_theme_setup() {    
    register_nav_menu('primary', 'Primary Navigation');
}

add_action('after_setup_theme', 'kyanne_theme_setup');
