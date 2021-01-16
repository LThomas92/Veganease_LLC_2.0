<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Veganease
 */

get_header();
global $product; 
?>

<?php if(get_field('coupon_code_percentage', 'option')) {?>
<div class="coupon-banner">
<h3><?php the_field('coupon_code_percentage', 'option');?> % off with code <?php the_field('coupon_code', 'option');?></h3>
</div>

<?php } else { ?>
	<div style="display: none"></div>
<?php } ?>

<div class="homepage-logo-container">
	<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Veganease Logo">
</div>




	<main id="primary" class="site-main">
	<div class="homepage-main-content-container">
	<?php the_content();?>
	</div> <!-- homepage main content container -->

	


	</main><!-- #main -->

<?php
get_footer(); ?>
