<?php

/**
 * Provides backwards compatibility functions for older versions of WordPress and WooCommerce.
 *
 * @package   Barn2/woocommerce-product-table
 * @author    Barn2 Plugins <info@barn2.co.uk>
 * @license   GPL-3.0
 * @copyright Barn2 Media Ltd
 */
// Prevent direct file access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class WC_Product_Table_Ajax_Handler {

    public static function load_products() {
        _deprecated_function( __FUNCTION__, '2.6', 'Barn2\\Plugin\\WC_Product_Table\\Ajax_Hander->load_products()' );
    }

    public static function add_to_cart() {
        _deprecated_function( __FUNCTION__, '2.6', 'Barn2\\Plugin\\WC_Product_Table\\Ajax_Hander->add_to_cart()' );
    }

    public static function add_to_cart_multi() {
        _deprecated_function( __FUNCTION__, '2.6', 'Barn2\\Plugin\\WC_Product_Table\\Ajax_Hander->add_to_cart_multi()' );
    }

}

class WC_Product_Table_Cart_Handler {

    public static function process_multi_cart() {
        _deprecated_function( __FUNCTION__, '2.6', 'Barn2\\Plugin\\WC_Product_Table\\Cart_Hander->process_multi_cart()' );
    }

    public static function __callStatic( $name, $arguments ) {
        if ( method_exists( 'Barn2\\Plugin\\WC_Product_Table\\Cart_Hander', $name ) ) {
            _deprecated_function( __FUNCTION__, '2.6', "Barn2\\Plugin\\WC_Product_Table\\Cart_Hander::{$name}()" );
            return Barn2\Plugin\WC_Product_Table\Cart_Hander::$name( $arguments );
        }
    }

}

class WC_Product_Table_Factory {

    public static function create( $args ) {
        _deprecated_function( __FUNCTION__, '2.6', 'Barn2\\Plugin\\WC_Product_Table\\Table_Factory::create()' );
        return Barn2\Plugin\WC_Product_Table\Table_Factory::create( $args );
    }

    public static function fetch( $id ) {
        _deprecated_function( __FUNCTION__, '2.6', 'Barn2\\Plugin\\WC_Product_Table\\Table_Factory::fetch()' );
        return Barn2\Plugin\WC_Product_Table\Table_Factory::fetch( $id );
    }

}

if ( ! function_exists( 'wcpt_back_compat_args' ) ) {

    /**
     * Maintain support for old attribute names.
     *
     * @param array $args The array of product table attributes
     * @return array The updated attributes with old ones replaced with their new equivalent
     */
    function wcpt_back_compat_args( $args ) {
        _deprecated_function( __FUNCTION__, '2.6' );
        //@todo: Remove this in a future update and make function in WC_Product_Table_Shortcode::check_legacy_atts private.
        return WC_Product_Table_Shortcode::check_legacy_atts( $args );
    }

}

// WC < 3.0
if ( ! function_exists( 'wcpt_get_parent' ) ) {

    function wcpt_get_parent( $product ) {
        _deprecated_function( __FUNCTION__, '2.6', 'WCPT_Util::get_parent( $product )' );
        return WCPT_Util::get_parent( $product );
    }

}

// WC < 3.0
if ( ! function_exists( 'wcpt_get_parent_id' ) ) {

    function wcpt_get_parent_id( $product ) {
        _deprecated_function( __FUNCTION__, '2.6', '$product->get_parent_id()' );

        $parent_id = false;

        if ( method_exists( $product, 'get_parent_id' ) ) {
            $parent_id = $product->get_parent_id();
        } elseif ( method_exists( $product, 'get_parent' ) ) {
            $parent_id = $product->get_parent();
        }
        return $parent_id;
    }

}

// WC < 3.0
if ( ! function_exists( 'wcpt_get_name' ) ) {

    function wcpt_get_name( $product ) {
        _deprecated_function( __FUNCTION__, '2.6', 'WCPT_Util::get_product_name( $product )' );
        return WCPT_Util::get_product_name( $product );
    }

}

// WC < 3.0
if ( ! function_exists( 'wcpt_get_description' ) ) {

    function wcpt_get_description( $product ) {
        _deprecated_function( __FUNCTION__, '2.6', '$product->get_description()' );

        if ( method_exists( $product, 'get_description' ) ) {
            return $product->get_description();
        } else {
            $post = WCPT_Util::get_post( $product );
            return $post->post_content;
        }
    }

}

// WC < 3.0
if ( ! function_exists( 'wcpt_get_dimensions' ) ) {

    function wcpt_get_dimensions( $product ) {
        _deprecated_function( __FUNCTION__, '2.6', 'wc_format_dimensions( $product->get_dimensions( false ) )' );

        if ( function_exists( 'wc_format_dimensions' ) ) {
            return wc_format_dimensions( $product->get_dimensions( false ) );
        }
        return $product->get_dimensions();
    }

}

// WC < 3.0
if ( ! function_exists( 'wcpt_get_stock_status' ) ) {

    function wcpt_get_stock_status( $product ) {
        _deprecated_function( __FUNCTION__, '2.6', '$product->get_stock_status()' );

        if ( method_exists( $product, 'get_stock_status' ) ) {
            return $product->get_stock_status();
        }
        return $product->stock_status;
    }

}

// WC < 3.0
if ( ! function_exists( 'wcpt_get_min_purchase_quantity' ) ) {

    function wcpt_get_min_purchase_quantity( $product ) {
        _deprecated_function( __FUNCTION__, '2.6', '$product->get_min_purchase_quantity()' );

        if ( method_exists( $product, 'get_min_purchase_quantity' ) ) {
            return $product->get_min_purchase_quantity();
        }
        return 1;
    }

}

// WC < 3.0
if ( ! function_exists( 'wcpt_get_max_purchase_quantity' ) ) {

    function wcpt_get_max_purchase_quantity( $product ) {
        _deprecated_function( __FUNCTION__, '2.6', '$product->get_stock_quantity()' );

        return $product->backorders_allowed() ? '' : $product->get_stock_quantity();
    }

}

// WC < 3.0
if ( ! function_exists( 'wcpt_woocommerce_quantity_input' ) ) {

    function wcpt_woocommerce_quantity_input( $product ) {
        _deprecated_function( __FUNCTION__, '2.6', 'woocommerce_quantity_input' );

        if ( version_compare( WC_VERSION, '3.0', '<' ) ) {
            if ( ! $product->is_sold_individually() ) {
                woocommerce_quantity_input( array(
                    'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
                    'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product ),
                    'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 )
                ) );
            }
        } else {
            woocommerce_quantity_input( array(
                'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity()
            ) );
        }
    }

}

