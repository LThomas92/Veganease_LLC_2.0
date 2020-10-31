<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
 $page_id = get_option( 'woocommerce_shop_page_id' );


?>

<header class="all-products-page-header"></header>

<div class="product-content-margins-big">
<div class="all-products-page-header__text">
<?php the_field('product_header_text', $page_id);?>
</div>
</div> <!-- PRODUCT CONTENT MARGINS -->

<div class="product-content-margins-small">
<main class="all-products-container">

<?php
	$args = array(
		'post_type' => 'product',
		'posts_per_page' => 24
		);
	$loop = new WP_Query( $args );
	if ( $loop->have_posts() ) {
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<div class="product-single">
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
    	<a href="<?php echo get_permalink();?>"><img class="product-single__img" src="<?php echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>"></a>
		<h5 class="product-single__title"><?php echo the_title();?></h5>
		<a class="btn product-btn" href="<?php echo get_permalink();?>">Buy Now!</a>
		</div> <!-- PRODUCT SINGLE -->

	<?php endwhile;
	} else {
		echo __( 'No products found' );
	}
	wp_reset_postdata();
?>
</main>
</div>





<?php
get_footer( 'shop' );