<!-- MOTION GRAPHICS -->

<?php get_header(); ?>

<div class="page-wrapper">

    <h1 class="title"><?php single_post_title(); ?></h1>

    <div id="columns">
             <button id="modal-btn" class="blog-post-btn">
                 <?php 
                //PRINT ONLY CAT=3 POSTS
                    $lastBlog = new WP_Query('type=post&posts_per_page=-1&cat=3');

                    if( $lastBlog->have_posts() ):

                        while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>

                                <?php get_template_part('content', get_post_format()); ?>

                        <?php endwhile;
                    endif;

                    wp_reset_postdata();

                ?>
            </button>
        </div>

    <div id="modal" class="modal">
            <?php get_template_part('single'); ?>       
        </div>
    
</div>

<?php get_footer(); ?>

