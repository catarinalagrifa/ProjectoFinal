<?php

set_post_thumbnail_size( 244 );

add_filter('post_thumbnail_html', 'my_post_image_html', 10, 3);

function my_post_image_html($html, $post_id, $post_image_id) {
    $html = '<a href="'.get_permalink($post_id).'" title="'.esc_attr(get_post_field('post_title', $post_id)).'">'.$html.'</a>';
    return $html;
}

add_action('the_content', 'wrap_content');
    
function wrap_content($content) {
    return '<div id="modal-ready">'.$content.'</div>';
}



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
}

add_action('admin_menu', 'kyanne_add_admin_page');

add_action('admin_init', 'kyanne_custom_settings');

function kyanne_custom_settings() {
    
    // ABOUT PAGE OPTIONS
    register_setting('kyanne-theme-group', 'theme_options_activate_contact_form');
    register_setting('kyanne-theme-group', 'theme_options_activate_button_curriculum');
    register_setting('kyanne-theme-group', 'theme_options_activate_button_contact_form');
    
    add_settings_section('kyanne-contact-form-options', 'Contact Form', 'kyanne_contact_form_options', 'lagrifa_kyanne');
    add_settings_section('kyanne-buttons-options', '<br>Buttons', 'kyanne_buttons_options', 'lagrifa_kyanne');
    
    add_settings_field('theme-options-activate-contact-form', 'Activate Contact Form', 'kyanne_theme_options_activate_contact_form', 'lagrifa_kyanne', 'kyanne-contact-form-options');
    add_settings_field('theme-options-activate-button-curriculum', 'Activate Curriculum Button', 'kyanne_theme_options_activate_button_curriculum', 'lagrifa_kyanne', 'kyanne-buttons-options');
    add_settings_field('theme-options-activate-button-contact-form', 'Activate Contact Form Button', 'kyanne_theme_options_activate_button_contact_form', 'lagrifa_kyanne', 'kyanne-buttons-options');
    
}

function kyanne_theme_create_page() {
    require_once(get_template_directory() . '/inc/templates/kyanne-theme-options.php');
}


// ABOUT PAGE FUNCTIONS

function kyanne_contact_form_options() {
    echo 'Activate or Deactivate the Buil-in Contact Form';
}

function kyanne_buttons_options() {
    echo 'Activate or Deactivate the Buil-in Buttons';
}

function kyanne_theme_options_activate_contact_form() {
    $contactFormPanelCheck = get_option('theme_options_activate_contact_form');
    $contactFormPanelChecked = (@$contactFormPanelCheck == 1 ? 'checked' : '');
    echo '<input type="checkbox" id="theme_options_activate_contact_form" name="theme_options_activate_contact_form" value="1" '.$contactFormPanelChecked.' />';
}

function kyanne_theme_options_activate_button_curriculum() {
    $curriculumCheck = get_option('theme_options_activate_button_curriculum');
    $curriculumChecked = (@$curriculumCheck == 1 ? 'checked' : '');
    echo '<input type="checkbox" id="theme_options_activate_button_curriculum" name="theme_options_activate_button_curriculum" value="1" '.$curriculumChecked.' />';
}



function kyanne_theme_options_activate_button_contact_form() {
    $contactFormCheck = get_option('theme_options_activate_button_contact_form');
    $contactFormChecked = (@$contactFormCheck == 1 ? 'checked' : '');
    echo '<input type="checkbox" id="theme_options_activate_button_contact_form" name="theme_options_activate_button_contact_form" value="1" '.$contactFormChecked.' />';
}




/*----------------------------
        CUSTOMIZER
_____________________________*/

function kyanne_customize_register($wp_customize) {
    //  THEME COLORS
    $wp_customize->add_setting('kyanne_menu_item_color', array(
        'default'       =>  '#000',
        'transport'     =>  'refresh',
    ));
    $wp_customize->add_setting('kyanne_menu_item_background_color', array(
        'default'       =>  '#FFF',
        'transport'     =>  'refresh',
    ));
    $wp_customize->add_setting('kyanne_header_bar_color', array(
        'default'       =>  '#000',
        'transport'     =>  'refresh',
    ));
    
    $wp_customize->add_section('kyanne_theme_colors', array(
        'title'         =>  __('Theme Colors', 'Kyanne'),
        'priority'      =>  30,
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'kyanne_menu_item_color_control', array(
        'label'         =>  __('Menu Text', 'Kyanne'),
        'section'       =>  'kyanne_theme_colors',
        'settings'      =>  'kyanne_menu_item_color',
    )));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'kyanne_menu_item_background_color_control', array(
        'label'         =>  __('Menu Text Background', 'Kyanne'),
        'section'       =>  'kyanne_theme_colors',
        'settings'      =>  'kyanne_menu_item_background_color',
    )));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'kyanne_header_bar_color_control', array(
        'label'         =>  __('Header Bar', 'Kyanne'),
        'section'       =>  'kyanne_theme_colors',
        'settings'      =>  'kyanne_header_bar_color',
    )));
    
    //  BUTTONS
    $wp_customize->add_setting('kyanne_activate_button_curriculum', array(
        'default'       =>  true,
        'transport'     =>  'postMessage',
    ));
    $wp_customize->add_setting('kyanne_button_curriculum', array(
        'default'       =>  get_template_directory_uri() . '/img/default-icon.png',
    ));
    $wp_customize->add_setting('kyanne_activate_button_contact_form', array(
        'default'       =>  true,
        'transport'     =>  'postMessage',
    ));
    $wp_customize->add_setting('kyanne_button_contact_form', array(
        'default'       =>  get_template_directory_uri() . '/img/default-icon.png',
    ));
    
    $wp_customize->add_section('kyanne_buttons', array(
        'title'         =>  __('Buttons', 'Kyanne'),
        'priority'      =>  40,
    ));
    
    $wp_customize->add_control('kyanne_activate_button_curriculum', array(
        'label'         =>  __('Show Curriculum Button', 'Kyanne'),
        'section'       =>  'kyanne_buttons',
        'type'          =>  'checkbox',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kyanne_button_curriculum_control', array(
        'label'         =>  __('Upload an Image', 'Kyanne'),
        'section'       =>  'kyanne_buttons',
        'settings'      =>  'kyanne_button_curriculum',
    )));
    $wp_customize->add_control('kyanne_activate_button_contact_form', array(
        'label'         =>  __('Show Contact Form Button', 'Kyanne'),
        'section'       =>  'kyanne_buttons',
        'type'          =>  'checkbox',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kyanne_button_contact_form_control', array(
        'label'         =>  __('Upload an Image', 'Kyanne'),
        'section'       =>  'kyanne_buttons',
        'settings'      =>  'kyanne_button_contact_form',
    )));
}

add_action('customize_register', 'kyanne_customize_register');

//  OUTPUT
function kyanne_customize_css() { 
    if(true === get_theme_mod('kyanne_activate_button_curriculum')){ ?>
        <style type="text/css">
            .curriculum-button {
                display:inline-block !important;
            }
        </style>
    <?php } else { ?>
        <style type="text/css">
            .curriculum-button {
                display:none;
            }
        </style>
   <?php }
    
    if(true === get_theme_mod('kyanne_activate_button_contact_form')){ ?>
        <style type="text/css">
            .contact-form-button {
                display:inline-block !important;
            }
        </style>
    <?php } else { ?>
        <style type="text/css">
            .contact-form-button {
                display:none;
            }
        </style>
   <?php } ?>
    
    <style type="text/css">
        .main-nav span {
            color:<?php echo get_theme_mod('kyanne_menu_item_color'); ?>;
            background-color:<?php echo get_theme_mod('kyanne_menu_item_background_color'); ?>;
        }
        
        #goto-main-nav {
            background-color:<?php echo get_theme_mod('kyanne_header_bar_color'); ?>;
        }
        
        .curriculum-button {
            background-image: url('<?php echo get_theme_mod('kyanne_button_curriculum'); ?>');
        }
        
        .contact-form-button {
            background-image: url('<?php echo get_theme_mod('kyanne_button_contact_form'); ?>');
        }
    </style>
<?php }

add_action('wp_head', 'kyanne_customize_css');