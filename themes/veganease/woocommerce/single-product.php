<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );

global $post;

?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

<div class="product-content-margins-small">

	<a class="back-to-shop-btn" href="<?php echo site_url('/shop'); ?>">Back to all Products</a>

	</div>

		<main>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); 

			$product = wc_get_product( $post->ID );
		
			?>

			<div class="product-content-margins-small">
			<div class="single-product-container">
			<div class="single-product-container__img-container">
			<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'single-post-thumbnail' );?>
			<img alt="<?php the_title()?>" src="<?php echo $image[0]; ?>" class="single-product-container__img"/>
			</div> <!-- IMG CONTIAINER -->

			<div class="single-product-container__text-container">
			<h3 class="single-product-container__title"><?php the_title();?></h3>
			<p class="single-product-container__desc"><?php echo get_the_excerpt(); ?></p>
			<?php do_action('woocommerce_single_product_summary');?>
			<p class="single-product-container__price"><?php echo $product->get_price_html(); ?></p>
			<div>
			</div>
			<div class="single-product-container__reviews-container">
			<a href="#reviews"><p class="single-product-container__reviews-container__reviews">Reviews&nbsp;(<span><?php echo get_comments_number(); ?></span>)</p></a>
			<a href="#comment"><p class="single-product-container__reviews-container__write-review">Write a Review</p></a>

			</div> <!-- REVIEWS CONTAINER -->

			</div> <!-- SINGLE PRODUCT CONTAINER TEXT CONTAINER-->

			</div> <!-- SINGLE PRODUCT CONTAINER -->

			<?php if( ! is_a( $product, 'WC_Product' ) ){
			$product = wc_get_product(get_the_id());
		}

		woocommerce_related_products( array(
			'posts_per_page' => 3,
			'columns'        => 1,
			'orderby'        => 'rand'
		) ); ?>

		

		<?php endwhile; // end of the loop. ?>

		<?php if ( get_comments_number() ) { ?>
													<p class="reviews-title__rating"><?php echo get_comments_number(); ?> Reviews</p>
												<?php } else { ?>
													<p class="reviews-title__rating">No Reviews</p>
												<?php } ?>
								
											<?php comments_template(); ?>

	</div> <!-- PRODUCT CONTENT MARGINS SMALL -->
		</main>


<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
