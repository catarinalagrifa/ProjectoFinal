<!-- ABOUT -->

<?php get_header(); ?>

<div class="page-wrapper">

    <?php 
        if( have_posts() ):
            while( have_posts() ): the_post(); ?>

                <h1 class="title"><?php the_title(); ?></h1>

                <h3 class="main-text"><?php the_content(); ?></h3>

            <?php endwhile;
        endif;
    ?>
    
<div id="curriculum" class="modal">

            <object data="insert.pdf#view=Fit" type="application/pdf" width="100%" height="850">

                <div class="modal-wrapper">
                       
                    <div class="container">
                           
                        <p>It appears your Web browser is not configured to display PDF files. No worries, just <a href="insert.pdf">click here</a> to download the PDF file.</p>
                            
                    </div>
                        
                </div>
                    
            </object>

        </div>
   
<div id="contact-me" class="modal">
      
        <div class="modal-wrapper">
         
            <span class="close">&times;</span>
          
            <div class="container">

                <section class="contact-me">
               
                    <form class="contact-me-form">
                      
                        <div class="text-form-fields">
                            
                            <div class="form-field">

                            <input id="name" class="input-text" type="text" placeholder="Name" required>

                            </div>

                            <div class="form-field">

                            <input id="email" class="input-text" type="email" placeholder="E-mail" required>

                        </div>

                            <div class="form-field">

                                <textarea class="input-text" tabindex="5" placeholder="Message" required></textarea>

                        </div>
                        
                        </div>

                        <div class="form-field">

                            <input id="email" class="submit-btn" type="submit" value="Submit">

                        </div>
                    
                </form>
                
                </section>
            
            </div>
            
        </div>
        
    </div>

</div>

<?php get_footer(); ?>