<!-- WEB DESIGN -->

<?php 

/*
    Template Name: Page Load Category:Web Design
*/

get_header(); ?>

<div class="page-wrapper">

    <h1 class="title"><?php single_post_title(); ?></h1>

    <div id="columns">
        <?php 
            //PRINT ONLY CAT=4 POSTS
            $lastBlog = new WP_Query('type=post&posts_per_page=-1&cat=4');

            if( $lastBlog->have_posts() ):

                while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>

                    <?php get_template_part('content', get_post_format()); ?>
                <?php endwhile;
            endif;
        
            wp_reset_postdata();
        ?>
    </div>
</div>

<?php get_footer(); ?>

