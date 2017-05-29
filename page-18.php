<?php get_header(); ?>

<h1 class="title"><?php single_post_title(); ?></h1>

<div id="columns">
     <?php 
        //PRINT ONLY CAT=10 POSTS
    $lastBlog = new WP_Query('type=post&posts_per_page=-1&cat=10');
    
    if( $lastBlog->have_posts() ):
    
        while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>
        
            <?php get_template_part('content', get_post_format()); ?>
        <?php endwhile;
        endif;
    ?>
</div>

<?php get_footer(); ?>