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

<div class="coupon-banner">
<h3 class="coupon-banner__text">10% off with Save10</h3>
</div>

<div class="homepage-logo-container">
	<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Veganease Logo">
</div>

<nav class="homepage-secondary-menu">
<div class="secondary-nav-margins">
<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-3',
					'menu_id'        => 'third-menu',
				)
			);
			?>
</nav>
</div>


	<main id="primary" class="site-main">
	<!-- SLIDESHOW -->
	<div class="single-slick-container">
	<?php
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => 3
			);
		$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="single-slick">
			<?php the_post_thumbnail(); ?>
			<a href="<?php the_permalink();?>">Shop Now!</a>
			</div>
		<?php endwhile;
		wp_reset_postdata();
	?>


		</div><!-- SINGLE SLICK CONTAINER -->



  


	<!-- REVIEWS SECTION -->
	<section class="reviews-homepage-section">
		<h4 class="reviews-homepage-section__title">They love it here!</h4>
<div class="reviews-homepage-section-container">

<?php $args = array(
	'number'  => '3',
) ?>


<?php foreach (get_comments($args) as $comment): ?>


<div class="reviews-homepage-section__single">
		<img src="<?php echo get_avatar_url( $comment, 32 ); ?>" class="reviews-homepage-section__single__img"/>
		<p><?php echo $comment->comment_content; ?></p>
		<h6 class="reviews-homepage-section__single__author"><?php echo $comment->comment_author; ?></h6>
		</div> <!-- REVIEW SINGLE -->

		<?php endforeach; ?>
       
  

		</div> <!-- REVIEWS SECTION HOMEPAGE SECTION CONTAINER -->
		</section>


		<!-- REVIEWS SECTION -->


	</main><!-- #main -->

<?php
get_footer(); ?>

<script>




</script>
