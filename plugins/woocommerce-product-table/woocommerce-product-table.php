<?php

/**
 * The main plugin file for WooCommerce Product Table.
 *
 * This file is included during the WordPress bootstrap process if the plugin is active.
 *
 * @package   Barn2/woocommerce-product-table
 * @author    Barn2 Plugins <info@barn2.co.uk>
 * @license   GPL-3.0
 * @copyright Barn2 Media Ltd
 *
 * @wordpress-plugin
 * Plugin Name:     WooCommerce Product Table
 * Plugin URI:      https://barn2.co.uk/wordpress-plugins/woocommerce-product-table/
 * Description:     Display and purchase WooCommerce products from a searchable and sortable table. Filter by anything.
 * Version:         2.6.1
 * Author:          Barn2 Plugins
 * Author URI:      https://barn2.co.uk
 * Text Domain:     woocommerce-product-table
 * Domain Path:     /languages
 *
 * WC requires at least: 3.4
 * WC tested up to: 4.0
 *
 * Copyright:       Barn2 Media Ltd
 * License:         GNU General Public License v3.0
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.html
 */
namespace Barn2\Plugin\WC_Product_Table;

// Prevent direct file access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

const PLUGIN_FILE    = __FILE__;
const PLUGIN_VERSION = '2.6.1';

// Include autoloader.
require_once \plugin_dir_path( __FILE__ ) . 'autoloader.php';

// These files will be autoloaded but aren't yet.
require_once \plugin_dir_path( __FILE__ ) . 'manual-includes.php';

/**
 * Helper function to access the shared plugin instance.
 *
 * @return WC_Product_Table_Plugin The plugin instance.
 */
function wc_product_table() {
    return Plugin_Factory::create( PLUGIN_FILE, PLUGIN_VERSION );
}

// Load the plugin.
wc_product_table()->register();

