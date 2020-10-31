<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
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
?>

<main>

<div class="cart-is-empty-container">
<img src="<?php echo get_template_directory_uri(); ?>/img/cart-empty-img.svg"/>
<h2 class="cart-is-empty-container__text">Your Cart is empty!</h2>
<a class="back-to-shop-btn" href="<?php echo home_url('/shop')?>">Back to Shop</a>
</div>

</main>