<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
?>


<div class="woocommerce-MyAccount-content">
	<?php
		/**
		 * My Account content.
		 *
		 * @since 2.6.0
		 */
		do_action( 'woocommerce_account_content' ); ?>

		<div class="my-account-dashboard">
	<h3 class="my-account-dashboard__name"><?php echo $current_user->display_name ?><span>'s Account</span></h3>
	<?php echo get_avatar( $current_user->ID, 64 ); 

	do_action( 'woocommerce_account_navigation' ); ?>

	<div class="dashboard-grey-line"></div>

	<a class="back-to-shop-btn" href="<?php echo home_url();?>">Back to Home</a>


</div>

<div class="your-orders-container">
<h3 class="your-orders-container__title">Your Orders</h3>

<?php $loop = new WP_Query( array(
    'post_type'         => 'shop_order',
    'post_status'       =>  array_keys( wc_get_order_statuses() ),
    'posts_per_page'    => -1,
) );

// The Wordpress post loop
if ( $loop->have_posts() ): 
while ( $loop->have_posts() ) : $loop->the_post();

// The order ID
$order_id = $loop->post->ID;


// Get an instance of the WC_Order Object
$order = wc_get_order($loop->post->ID); 


foreach ( $order->get_items() as $item_id => $item ) {
    $product_id = $item->get_product_id();
   $variation_id = $item->get_variation_id();
   $product = $item->get_product();
   $name = $item->get_name();
   $quantity = $item->get_quantity();
   $subtotal = $item->get_subtotal();
   $total = $item->get_total();
}

?>

<table class="customer-order-table">
	<tr>
		<td width="20%">Product Name</td>
		<td width="25%" >Quantity</td>
		<td width="25%" >Subtotal</td>
		<td width="25%" >Total</td>
	</tr>
	<tr class="your-order-single border_bottom">
		<td width="20%"><?php echo $name;?></td></a>
		<td width="20%"><?php echo $quantity; ?></td>
		<td width="20%">$<?php echo $subtotal;?></td>
		<td width="20%">$<?php echo $total;?></td>
		<td width="10%"><a href="<?php echo get_permalink($product_id);?>">Re-Order</td></a>
	</tr>
</table>


<?php endwhile;

wp_reset_postdata();

endif;
?>


</div>

<div class="your-reviews-section">
<h3 class="your-reviews-section__title">Your Reviews</h3>



<?php $args = array(
    'user_id' => $current_user->ID, // comments by this user only
    'post_status' => 'publish',
    'post_type' => 'product'
);

$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );

// Comment Loop
if ( $comments ) {
	foreach ( $comments as $comment ) { ?>
     <div class="your-reviews-section__single">
	<h5><?php echo rtrim($comment->post_title, "1"); ?></h5>
	 <p><?php echo $comment->comment_content;?></p>

	 </div> <!-- YOUR REVIEWS SECTION SINGLE -->
    <?php } 
} else {
    echo 'No Reviews Found.';
} ?>

</div> <!-- YOUR REVIEWS SECTION -->

</div>
