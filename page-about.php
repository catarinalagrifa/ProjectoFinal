<!-- ABOUT -->

<?php 

/*
    Template Name: Page About
*/

get_header(); ?>

<?php 
    $buttonCurriculum = esc_attr(get_option('button_curriculum'));
	$buttonContactForm = esc_attr(get_option('button_contact_form'));
?>

<div class="page-wrapper">
    <?php 
        if( have_posts() ):
            while( have_posts() ): the_post(); ?>
                <h1 class="title"><?php the_title(); ?></h1>

                <h3 class="main-text"><?php the_content(); ?></h3>
                
                <div class="buttons">
                    <button type="button" id="curriculum-button" class="curriculum-button" style="background-image: url(<?php print $buttonCurriculum; ?>)"></button>
                
                    <button type="button" id="contact-form-button" class="contact-form-button" style="background-image: url(<?php print $buttonContactForm; ?>);"></button>
                </div>
            <?php endwhile;
        endif;
    ?>
    
    <div id="curriculum">
        <object data="insert.pdf#view=Fit" type="application/pdf" width="100%" height="850">
            <div class="modal">
                <div class="modal-content">
                    <p>It appears your Web browser is not configured to display PDF files. No worries, just <a href="insert.pdf">click here</a> to download the PDF file.</p>
                </div>
            </div>
        </object>
    </div>
   
    <div id="contact-form">
        <div class="modal">         
            <span class="close">&times;</span>         
                <div class="modal-content">              
                    <form class="contact-form" data-url="<?php echo admin_url('admin-ajax.php'); ?>">        <div class="text-form-group">
                            <div class="form-group">
                                <input id="name" class="input-text" type="text" placeholder="Name"/>
                                <small class="text-error form-group-message">Your Name is Required</small>
                            </div>

                            <div class="form-group">
                                <input id="email" class="input-text" type="email" placeholder="Email"/>
                                <small class="text-error form-group-message">Your Email is Required</small>
                            </div>

                            <div class="form-group">
                                <textarea id="message" class="input-text" tabindex="5" placeholder="Message"></textarea>
                                <small class="text-error form-group-message">A Message is Required</small>
                            </div>
                        </div>
                            <div class="form-group">
                                <input id="submit" class="submit-button" type="submit" value="Submit"/>

                                <small class="text-info form-group-message js-form-submission">Your message is being submitted, please wait...</small>

                                <small class="text-success form-group-message js-form-success">Your message was submitted.</small>

                                <small class="text-error form-group-message js-form-error">There was a problem submitting your message, please try again.</small>
                            </div>
                    </form>
                </div>  
            </div>   
        </div>
</div>

<?php get_footer(); ?>