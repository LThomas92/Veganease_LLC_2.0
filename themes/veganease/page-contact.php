<?php
/**
 * The template for displaying contact page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Veganease
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
            the_post(); ?>
            
            <section class=page-contact-container >
            <div class="contact-page-header">
            <div class="contact-page-header-box">
            <h3><?php echo get_field('contact_header_title')?></h3>
            </div> <!-- contact page header box -->
            <div class="contact-form-container">
            <?php the_content(); ?>
            <div class="contact-form-container__text">
            <div class="contact-margins">
            <h3>Contact Information</h3>
            <div class="contact-form-container__text__info">
            <div class="contact-form-container__text__single">
            <img class="email-icon" src="<?php echo get_template_directory_uri(); ?>/img/email-white.svg" alt="Email Icon "/>
            <a class="email-text" href="mailto:veganeasellc@gmail.com">veganeasellc@gmail.com</a>
            </div> <!-- contact form text single -->
            <div class="contact-form-container__text__single">
            <img class="phone-icon" src="<?php echo get_template_directory_uri(); ?>/img/phone-icon.svg" alt="Phone Icon "/>
            <a href="tel:5169397239">516-939-7239</p>
            </div> <!-- contact form text single -->
            <div class="contact-form-container__text__single">
            <img class="location-icon" src="<?php echo get_template_directory_uri(); ?>/img/location-icon.svg" alt="Location Icon "/>
            <a href="https://goo.gl/maps/AvrJuYNCDZfDk3a8A">148th Dr Rosedale, New York 11422</a>
            </div> <!-- contact form text single -->
       
      
            <div class="hours-of-operation">
                <h4>Hours of Operation</h4>
            <ul>
                <li>
                <p>Monday</p>
                <p>08:00 am – 03:00 pm</p> 
                </li>
                <li>
                <p>Tuesday</p>
                <p>08:00 am – 03:00 pm</p> 
                </li>
                <li>
                <p>Wednesday</p>
                <p>08:00 am – 03:00 pm</p> 
                </li>
                <li>
                <p>Thursday</p>
                <p>Closed</p> 
                </li>
                <li>
                <p>Friday</p>
                <p>Closed</p> 
                </li>
                <li>
                <p>Saturday</p>
                <p>Closed</p> 
                </li>
                <li>
                <p>Sunday</p>
                <p>Closed</p> 
                </li>
              
            </ul>

            </div> <!-- hours of operation -->

            </div> <!-- contact form container text info -->
            </div> <!-- contact margins -->
            </div> <!-- contact form container text -->
            </div> <!-- contact form container -->

        <?php endwhile; // End of the loop.?>


        </div> <!-- contact page header -->

        <div class="contact-page-bottom"> </div>

            </section>
    
	</main><!-- #main -->


<?php
get_footer();
