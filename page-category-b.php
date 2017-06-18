<?php 

/*
    Template Name: Page Load Category B
*/

get_header(); ?>

<div class="page-wrapper">
    <h1 class="title"><?php single_post_title(); ?></h1>

    <div id="columns">
        <?php 
            //PRINT ONLY CAT=2 POSTS
            $lastBlog = new WP_Query('type=post&posts_per_page=-1&cat=2');

            if($lastBlog->have_posts() ):
        
            while($lastBlog->have_posts() ): $lastBlog->the_post(); ?>
                <button class="blog-post-link">
                    <?php get_template_part('content', get_post_format()); ?>
                </button>
            <?php endwhile;
        
            endif;
        
            wp_reset_postdata();
        ?>
    </div>
    
    <div class="modal-wrapper">
        <div class="modal">
            <span class="close">&times;</span>
            
            <?php get_template_part('single'); ?>      
        </div>
    </div>
</div>

<?php get_footer(); ?>

