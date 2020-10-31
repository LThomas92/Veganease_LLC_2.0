<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Veganease
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<div class="error-404__content">
			<div class="error-404__text">
			<h3>404</h3>
			</div> <!-- error 404 text -->
			<div class="error-404__info">
			<p>Sorry!</p>
			<p>The page you're looking for cannot be found.</p>
			<a style="margin: 0.5rem 0" class="back-to-shop-btn" href="<?php echo site_url();?>">Go Back</a>
			</div> <!-- error 404 info -->

			</div> <!-- error 404 content -->
		
			
			<div class="search-form-404">
			<?php get_search_form() ;?>
			</div> <!-- search form 404 --> 

		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
