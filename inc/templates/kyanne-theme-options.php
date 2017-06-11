<h1>Kyanne Theme Options</h1>

<br>

<?php settings_errors(); ?>

<form method="post" action="options.php" class="kyanne-theme-group">

    <?php settings_fields('kyanne-theme-group'); ?>
	<?php do_settings_sections('lagrifa_kyanne'); ?>
	<?php submit_button(); ?>

</form>