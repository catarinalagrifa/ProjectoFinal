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
    require_once( get_template_directory() . '/inc/templates/kyanne-theme-options.php' );
}

// ABOUT PAGE FUNCTIONS

function kyanne_contact_form_options() {
    echo 'Activate or Deactivate the Buil-in Contact Form';
}

function kyanne_buttons_options() {
    echo 'Activate or Deactivate the Buil-in Buttons';
}

function kyanne_theme_options_activate_contact_form() {
    $contact_form_panel_check = get_option('activate_contact_form');
    $contact_form_panel_checked = (@$contact_form_panel_check == 1 ? 'checked' : '');
    echo '<input type="checkbox" id="activate_contact_form" name="activate_contact_form" value="1" '.$contact_form_panel_checked.' />';
}

function kyanne_theme_options_activate_button_curriculum() {
    $curriculum_check = get_option('activate_button_curriculum');
    $curriculum_checked = (@$curriculum_check == 1 ? 'checked' : '');
    echo '<input type="checkbox" id="activate_button_curriculum" name="activate_button_curriculum" value="1" '.$curriculum_checked.' />';
}

function kyanne_theme_options_activate_button_contact_form() {
    $contact_form_check = get_option('activate_button_contact_form');
    $contact_form_checked = (@$contact_form_check == 1 ? 'checked' : '');
    echo '<input type="checkbox" id="activate_button_contact_form" name="activate_button_contact_form" value="1" '.$contact_form_checked.' />';
}



/*----------------------------
            MODAL
_____________________________*/


function kyanne_show_post_in_modal( $atts ) {
    $attributes = shortcode_atts( array(
        'id' => 0,
        'text' => "Open post in modal",
        'class' => "btn btn-primary",
        'style' => ''
    ), $atts );
    $ajax_nonce = wp_create_nonce( "kyanne-bootstrap" );
    ?>
    <script>
        function kyanne_show_post_js(id){
              jQuery.ajax({
                  url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
                  data: { id:  id, action: 'kyanne_show_post', security: '<?php echo $ajax_nonce; ?>'},
                        
                  success: function(response){
                    if(response['error'] == '1'){
                      jQuery('.post-title').html("Error");
                        jQuery('.post-content').html("No post found! Sorry :(");
                    } else {
                        jQuery('.post-title').html(response['post_title']);
                        jQuery('.post-content').html(response['post_content']);
                    }

                    jQuery('.modal-wrapper').modal('show');         
                }     
        }
    </script>
            <a style="<?php echo $attributes["style"]; ?>" class="<?php echo $attributes["class"]; ?>" onClick='kyanne_show_post_js(<?php echo $attributes["id"]; ?>)'><?php echo $attributes["text"]; ?></a>
    <?php
}

add_shortcode( 'kyanne_post', 'kyanne_show_post_in_modal' );

add_action('wp_ajax_nopriv_kyanne_show_post', 'kyanne_show_post');

add_action('wp_ajax_kyanne_show_post', 'kyanne_show_post');
function kyanne_show_post(){
    check_ajax_referer( 'kyanne-bootstrap', 'security' );
    $id = $_GET['id'];
    $post = get_post($id);
    if($post){
      wp_send_json(array('post_title' => $post->post_title, 'post_content' => $post->post_content));
  } else {
      wp_send_json(array('error' => '1'));
  }
    wp_die();
}