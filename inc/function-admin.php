<?php

/*----------------------------
        THUMBNAILS
_____________________________*/


set_post_thumbnail_size( 244 );

function post_preview_html($preview, $post_id, $post_image_id) {
    $preview = '<a href="'.get_permalink($post_id).'" title="'.esc_attr(get_post_field('post_title', $post_id)).'">'.$preview.'</a>';
    return $preview;
}

add_action('post_thumbnail_html', 'post_preview_html', 10, 3);




/*----------------------------
        MENU
_____________________________*/





/*----------------------------
        MODAL READY CONTENT
_____________________________*/

    
function wrap_content($content) {
    return '<div id="modal-ready">'.$content.'</div>';
}

add_action('the_content', 'wrap_content');




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
    register_setting('kyanne-theme-group', 'theme_options_activate_contact_form');
    
    add_settings_section('kyanne-contact-form-options', 'Contact Form', 'kyanne_contact_form_options', 'lagrifa_kyanne');
    
    add_settings_field('theme-options-activate-contact-form', 'Activate Contact Form', 'kyanne_theme_options_activate_contact_form', 'lagrifa_kyanne', 'kyanne-contact-form-options');
}


function kyanne_theme_create_page() {
    require_once(get_template_directory() . '/inc/templates/theme-options.php');
}

function kyanne_contact_form_options() {
    echo 'Activate or Deactivate the Buil-in Contact Form';
}

function kyanne_theme_options_activate_contact_form() {
    $contactFormPanelCheck = get_option('theme_options_activate_contact_form');
    $contactFormPanelChecked = (@$contactFormPanelCheck == 1 ? 'checked' : '');
    
    echo '<input type="checkbox" id="theme_options_activate_contact_form" name="theme_options_activate_contact_form" value="1" '.$contactFormPanelChecked.' />';
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
    
    
    //  ICON
    $wp_customize->add_setting('kyanne_activate_button_contact_form', array(
        'default'       =>  true,
        'transport'     =>  'postMessage',
    ));
    $wp_customize->add_setting('kyanne_icon_contact_form', array(
        'default'       =>  get_template_directory_uri() . '/img/default-icon.png',
    ));
    
    
    $wp_customize->add_section('kyanne_button', array(
        'title'         =>  __('Contact Form', 'Kyanne'),
        'priority'      =>  40,
    ));
    
    
    $wp_customize->add_control('kyanne_activate_button_contact_form', array(
        'label'         =>  __('Show Contact Form Button', 'Kyanne'),
        'section'       =>  'kyanne_button',
        'type'          =>  'checkbox',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kyanne_icon_contact_form_control', array(
        'label'         =>  __('Upload an Image', 'Kyanne'),
        'section'       =>  'kyanne_button',
        'settings'      =>  'kyanne_icon_contact_form',
    )));
    
    
    // NAV
    
    
}

add_action('customize_register', 'kyanne_customize_register');


//  OUTPUT
function kyanne_customize_css() { 
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
        .main-nav li {
            background-image:url('<?php echo wp_get_attachment_image_src(get_post_meta($item->ID, '_menu_item_object_id', true), 'full'); ?>');
        }
        .main-nav span {
            color:<?php echo get_theme_mod('kyanne_menu_item_color'); ?>;
            background-color:<?php echo get_theme_mod('kyanne_menu_item_background_color'); ?>;
        }
        
        #main-nav-link {
            background-color:<?php echo get_theme_mod('kyanne_header_bar_color'); ?>;
        }
        
        .contact-form-button {
            background-image:url('<?php echo get_theme_mod('kyanne_icon_contact_form'); ?>');
        }
    </style>
<?php }

add_action('wp_head', 'kyanne_customize_css');