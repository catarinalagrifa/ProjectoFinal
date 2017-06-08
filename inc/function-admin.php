<?php

set_post_thumbnail_size( 244 );




/*----------------------------
        HEADER FUNCTION
_____________________________*/


function kyanne_remove_version() {
    return '';
}
add_filter('the_generator', 'kyanne_remove_version');




/*----------------------------
        ADMIN PAGE
_____________________________*/


function kyanne_add_admin_page() {
    add_menu_page('Kyanne Theme Options', 'Kyanne', 'manage_options', 'lagrifa_kyanne', 'kyanne_theme_create_page', get_template_directory_uri() . '/img/kyanne-icon.png', 110);
    
    add_submenu_page('lagrifa_kyanne', 'Kyanne Menu Options', 'Menu Options', 'manage_options', 'lagrifa_kyanne', 'kyanne_theme_create_page');
    add_submenu_page('lagrifa_kyanne', 'Kyanne About Page Options', 'About Page Options', 'manage_options', 'lagrifa_kyanne_about', 'kyanne_theme_settings_page');
}

add_action('admin_menu', 'kyanne_add_admin_page');

add_action('admin_init', 'kyanne_custom_settings');

function kyanne_custom_settings() {
    
    // MENU OPTIONS
    register_setting('kyanne-menu-group', 'item_color');
	register_setting('kyanne-menu-group', 'activate_item_background', 'kyanne_activate_item_background_callback');
    register_setting('kyanne-menu-group', 'item_background_color');
    register_setting('kyanne-menu-group', 'header_bar_background_color');
    
    add_settings_section('kyanne-menu-options', '', 'kyanne_menu_options', 'lagrifa_kyanne');
    
    add_settings_field('menu-item-color', 'Text Color', 'kyanne_menu_item_color', 'lagrifa_kyanne', 'kyanne-menu-options');
    add_settings_field('menu-activate-item-background', 'Text Background', 'kyanne_menu_activate_item_background', 'lagrifa_kyanne', 'kyanne-menu-options');
    add_settings_field('menu-item-background-color', 'Text Background Color', 'kyanne_menu_item_background_color', 'lagrifa_kyanne', 'kyanne-menu-options');
    add_settings_field('menu-header-bar-background-color', 'Header Bar Color', 'kyanne_menu_header_bar_background_color', 'lagrifa_kyanne', 'kyanne-menu-options');
    
    // ABOUT PAGE OPTIONS
    register_setting('kyanne-about-page-group', 'activate_contact_form');
    register_setting('kyanne-about-page-group', 'activate_button_curriculum');
    register_setting('kyanne-about-page-group', 'button_curriculum');
    register_setting('kyanne-about-page-group', 'activate_button_contact_form');
	register_setting('kyanne-about-page-group', 'button_contact_form');
    
    add_settings_section('kyanne-contact-form-options', 'Contact Form', 'kyanne_contact_form_options', 'lagrifa_kyanne_about_page');
    add_settings_section('kyanne-buttons-options', '<br>Buttons', 'kyanne_buttons_options', 'lagrifa_kyanne_about_page');
    
    add_settings_field('about-activate-contact-form', 'Activate Contact Form', 'kyanne_about_activate_contact_form', 'lagrifa_kyanne_about_page', 'kyanne-contact-form-options');
    add_settings_field('about-activate-button-curriculum', 'Activate Curriculum Button', 'kyanne_about_activate_button_curriculum', 'lagrifa_kyanne_about_page', 'kyanne-buttons-options');
    add_settings_field('about-button-curriculum', 'Curriculum Button', 'kyanne_about_button_curriculum', 'lagrifa_kyanne_about_page', 'kyanne-buttons-options');
    add_settings_field('about-activate-button-contact-form', 'Activate Contact Form Button', 'kyanne_about_activate_button_contact_form', 'lagrifa_kyanne_about_page', 'kyanne-buttons-options');
	add_settings_field('about-button-contact-form', 'Contact Form Button', 'kyanne_about_button_contact_form', 'lagrifa_kyanne_about_page', 'kyanne-buttons-options');
    
}


// MENU FUNCTIONS

function kyanne_theme_create_page() {
    require_once( get_template_directory() . '/inc/templates/kyanne-menu.php' );
}

function kyanne_theme_settings_page() {
    require_once( get_template_directory() . '/inc/templates/kyanne-about-page.php' );
}

function kyanne_menu_item_color() {
    $itemColor = esc_attr(get_option('item_color'));
    echo '<input type="text" id="select-item-color" value="eeeeee" class="color-field" data-default-color="#000000" />
        <input type="hidden" id="item-color" name="item_color" value="'.$itemColor.'" />';
}

function kyanne_activate_item_background_callback($input) {
    return $input;
}

function kyanne_menu_activate_item_background() {
    $options = get_option('activate_item_background');
    $checked = (@$options[$format] == 1 ? 'checked' : '');
    echo '<label><input type="checkbox" id="activate_item_background" name="activate_item_background" value="1" '.$checked.' />Activate Background Color.</label>';
    
    if($checked) {
        function kyanne_menu_item_background_color() {
            echo '<input type="text" value="EEEEEE" class="color-field" data-default-color="#FFFFFF" />';
}
    } else {
        function kyanne_menu_item_background_color(){
            echo '<style>.form-table tr:nth-child(3){display:none;}</style>';
        }
}
}

function kyanne_menu_header_bar_background_color() {
    echo '<input type="text" id="header-bar-color" value="EEEEEE" class="color-field" data-default-color="#000000" />';
}


// ABOUT PAGE FUNCTIONS

function kyanne_contact_form_options() {
    echo 'Activate / Deactivate the Buil-in Contact Form';
}

function kyanne_buttons_options() {
    echo 'Activate / Deactivate and Customize your Buttons.';
}

function kyanne_about_activate_contact_form() {
    $contact_form_panel_check = get_option('activate_contact_form');
    $contact_form_panel_checked = (@$contact_form_panel_check == 1 ? 'checked' : '');
    echo '<input type="checkbox" id="activate_contact_form" name="activate_contact_form" value="1" '.$contact_form_panel_checked.' />';
}

function kyanne_about_activate_button_curriculum() {
    $curriculum_check = get_option('activate_button_curriculum');
    $curriculum_checked = (@$curriculum_check == 1 ? 'checked' : '');
    echo '<input type="checkbox" id="activate_button_curriculum" name="activate_button_curriculum" value="1" '.$curriculum_checked.' />';
    
    if($curriculum_checked) {
        function kyanne_about_button_curriculum() {
            $buttonCurriculum = esc_attr(get_option('button_curriculum'));
	        echo '<input type="button" value="Upload Image" id="upload-button-curriculum" class="button button-secondary">
                <input type="hidden" id="button-curriculum" name="button_curriculum" value="'.$buttonCurriculum.'" />
                <div class="preview">
                    <div id="button-curriculum-preview" class="button-preview" style="background-image: url('.$buttonCurriculum.')"></div>
                </div>';
        }
    } else {
        function kyanne_about_button_curriculum(){
            echo '<style>.form-table tr:nth-child(2){display:none;}</style>';
        }
    }
}

function kyanne_about_activate_button_contact_form() {
    $contact_form_check = get_option('activate_button_contact_form');
    $contact_form_checked = (@$contact_form_check == 1 ? 'checked' : '');
    echo '<input type="checkbox" id="activate_button_contact_form" name="activate_button_contact_form" value="1" '.$contact_form_checked.' />';
    
    if($contact_form_checked) {
        function kyanne_about_button_contact_form() {
            $buttonContactForm = esc_attr(get_option('button_contact_form'));
	        echo '<input type="button" value="Upload Image" id="upload-button-contact-form" class="button button-secondary">
                <input type="hidden" id="button-contact-form" name="button_contact_form" value="'.$buttonContactForm.'" />
                <div class="preview">
                    <div id="button-contact-form-preview" class="button-preview" style="background-image: url('.$buttonContactForm.')"></div>
                </div>';
        }
    } else {
        function kyanne_about_button_contact_form(){
            echo '<style>.form-table tr:nth-child(4){display:none;}</style>';
        }
    }
}


