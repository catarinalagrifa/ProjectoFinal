<!-- BLOG POST -->

<?php get_header(); ?>

<div class="modal-wrapper">
    <?php 
        if( have_posts() ): 
    
             while( have_posts() ): the_post(); ?>
                
                <span class="close">&times;</span>

                <p class="admin-edit"><?php edit_post_link(); ?></p>

                <div class="container">

                        <h2 class="post-title"><?php the_title(); ?></h2>

                        <div class="post-content"><?php the_content(); ?></div>

                        <p class="subtitle"><?php the_date('F Y'); ?></p>

                        <p class="tags"><?php the_tags(); ?></p>

                    </div>

            <?php endwhile;
        endif;
    ?>
</div>

<?php get_footer(); ?>