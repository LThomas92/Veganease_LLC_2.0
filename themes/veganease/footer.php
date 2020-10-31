<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Veganease
 */

?>


	<footer id="colophon" class="site-footer">
		<a href="<?php echo site_url('/');?>"><img class="footer-logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Veganease Logo"/></a>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-2',
				'menu_id'        => 'secondary-menu',
			)
		);
		?>

		<div class="contact-info-container">
		<div class="social-media-icons-container">
		<a target="_blank" href="https://www.instagram.com/the_veganease/"><img src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg" alt="Instagram Logo"></a>
		<a target="_blank" href="mailto:veganeasellc@gmail.com"><img src="<?php echo get_template_directory_uri(); ?>/img/email.svg" alt="Email"></a>
		</div> <!-- SM ICONS CONTAINER -->
		<a class="contact-info-container__tel" href="tel:1-516-939-7239">516-939-7239</a>
		</div> <!-- CONTACT INFO CONTAINER -->
	</footer><!-- #colophon -->





</div><!-- #page -->

<?php wp_footer(); ?>



</body>
</html>
