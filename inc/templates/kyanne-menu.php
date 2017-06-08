<h1>Menu Options</h1>

<p>Customize your Menu</p>

<br>

<?php settings_errors(); ?>

<form method="post" action="options.php" class="kyanne-menu-form">

    <?php settings_fields('kyanne-menu-group'); ?>
	<?php do_settings_sections('lagrifa_kyanne'); ?>
	<?php submit_button(); ?>

</form>

<!--
<ul>
    <li>(Associar imagem preview às páginas? Mostrar isso como background-image)</li>
    <li>Text background-color</li>
    <li>Text opacity</li>
    <li>Text Color</li>
    <li>?Bar Color?</li>
</ul>
-->
