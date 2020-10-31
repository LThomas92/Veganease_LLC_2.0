<?php

namespace Barn2\Plugin\WC_Product_Table;

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Barn2\WPT_Lib\Util;

// Everything in the global namespace needs loading manually.
$src_path = \plugin_dir_path( __FILE__ ) . 'includes/';
$lib_path = \plugin_dir_path( __FILE__ ) . 'lib/';

// Core
require_once $src_path . 'util/class-wcpt-util.php';
require_once $src_path . 'util/class-wcpt-settings.php';
require_once $src_path . 'class-wc-product-table-plugin.php';
require_once $src_path . 'class-wc-product-table-args.php';
require_once $src_path . 'class-wc-product-table-columns.php';

// Front-end
if ( Util::is_front_end() ) {
    require_once $lib_path . 'class-html-data-table.php';
    require_once $lib_path . 'class-wp-scoped-hooks.php';

    require_once $src_path . 'class-wc-product-table-config-builder.php';
    require_once $src_path . 'class-wc-product-table-hook-manager.php';
    require_once $src_path . 'class-wc-product-table-query.php';
    require_once $src_path . 'class-wc-product-table.php';
    require_once $src_path . 'class-wc-product-table-cache.php';
    require_once $src_path . 'class-wc-product-table-shortcode.php';
    require_once $src_path . 'class-wc-product-table-frontend-scripts.php';

    // Data classes
    require_once $src_path . 'data/interface-product-table-data.php';
    require_once $src_path . 'data/class-abstract-product-table-data.php';
    require_once $src_path . 'data/class-product-table-data-add-to-cart.php';
    require_once $src_path . 'data/class-product-table-data-attribute.php';
    require_once $src_path . 'data/class-product-table-data-button.php';
    require_once $src_path . 'data/class-product-table-data-categories.php';
    require_once $src_path . 'data/class-product-table-data-custom-field.php';
    require_once $src_path . 'data/class-product-table-data-custom-taxonomy.php';
    require_once $src_path . 'data/class-product-table-data-date.php';
    require_once $src_path . 'data/class-product-table-data-description.php';
    require_once $src_path . 'data/class-product-table-data-dimensions.php';
    require_once $src_path . 'data/class-product-table-data-hidden-filter.php';
    require_once $src_path . 'data/class-product-table-data-id.php';
    require_once $src_path . 'data/class-product-table-data-image.php';
    require_once $src_path . 'data/class-product-table-data-name.php';
    require_once $src_path . 'data/class-product-table-data-price.php';
    require_once $src_path . 'data/class-product-table-data-reviews.php';
    require_once $src_path . 'data/class-product-table-data-short-description.php';
    require_once $src_path . 'data/class-product-table-data-sku.php';
    require_once $src_path . 'data/class-product-table-data-stock.php';
    require_once $src_path . 'data/class-product-table-data-tags.php';
    require_once $src_path . 'data/class-product-table-data-weight.php';
    require_once $src_path . 'data/class-wc-product-table-data-factory.php';
}

// Admin
if ( Util::is_admin() ) {
    require_once $lib_path . 'class-wc-settings-additional-field-types.php';
    require_once $lib_path . 'class-wc-settings-plugin-promo.php';
}
