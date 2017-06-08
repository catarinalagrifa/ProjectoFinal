<h1>About Page Options</h1>

<br>

<?php settings_errors(); ?>

<!--
<?php
    $buttonCurriculum = esc_attr(get_option('button_curriculum'));
    $buttonContactForm = esc_attr(get_option('button_contact_form'));
?>
-->

<form method="post" action="options.php" class="kyanne-about-page-group">

    <?php settings_fields('kyanne-about-page-group'); ?>
	<?php do_settings_sections('lagrifa_kyanne_about_page'); ?>
	<?php submit_button(); ?>

</form>

<!--
<ul>
    <li>Contact form</li>
    <li>Button curriculum background-image</li>
    <li>Button contact me form background-image</li>
</ul>
-->