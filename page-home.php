<?php get_header(); ?>

<nav class="main-nav">
    <?php
        $walker = new Menu_With_Description;
    
        wp_nav_menu(array(
            'menu' => 'Main Menu',
            'walker' => $walker
    )); ?>
</nav>

<?php get_footer(); ?>
