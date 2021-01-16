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
$bannerImage = get_field('homepage_banner_image');
$mainContentTitle = get_field('main_content_title');
$orderDeliveryInfo = get_field('order_delivery', 'option');
?>

<?php if(get_field('coupon_code_percentage', 'option')) {?>
<div class="coupon-banner">
<h3><?php the_field('coupon_code_percentage', 'option');?> % off with code <?php the_field('coupon_code', 'option');?></h3>
</div>

<?php } else { ?>
	<div style="display: none"></div>
<?php } ?>

<div class="order-delivery-banner">
<?php echo $orderDeliveryInfo; ?>
</div>

	<main id="primary" class="site-main">

	<figure class="homepage-banner-image">
	<img src="<?php echo $bannerImage; ?>" alt="Veganease Founder Vanessa Wilson">
	</figure>

	<div class="product-content-margins-small">
	<h1 class="homepage-main-content-container__title"><?php echo $mainContentTitle; ?></h1>
	<div class="homepage-main-content-container">
	<?php the_content();?>
	</div> <!-- homepage main content container -->

	</div> <!-- container margins -->

	


	</main><!-- #main -->

<?php
get_footer(); ?>
