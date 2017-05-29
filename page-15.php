<?php get_header(); ?>
    
    <?php 
        if( have_posts() ):
            while( have_posts() ): the_post(); ?>
              
               <h1 class="title"><?php the_title(); ?></h1>
               
                <h3 class="main-text"><?php the_content(); ?></h3>
                
<!--                icons-->
                
            <?php endwhile;
        endif;
    ?>

<?php get_footer(); ?>