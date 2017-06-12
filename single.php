<!-- BLOG POST -->

<div id="modal-content">
    <p class="admin-edit"><?php edit_post_link(); ?></p>
    
    <?php 
        if(have_posts()): 
        while(have_posts()): the_post(); ?>
            <h2 class="post-title"><?php the_title(); ?></h2>

            <div class="post-content"><?php the_content(); ?></div>

            <p class="subtitle"><?php the_date('F Y'); ?></p>

            <p class="tags"><?php the_tags(); ?></p>
        <?php endwhile;
        endif;
    ?> 
</div>