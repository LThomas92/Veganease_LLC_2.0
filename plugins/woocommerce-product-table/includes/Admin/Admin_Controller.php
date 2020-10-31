<?php

namespace Barn2\Plugin\WC_Product_Table\Admin;

use Barn2\WPT_Lib\Util,
    Barn2\WPT_Lib\Plugin\Licensed_Plugin,
    Barn2\WPT_Lib\Registerable,
    Barn2\WPT_Lib\Service;

/**
 * Handles general admin functions, such as adding links to our settings page in the Plugins menu.
 *
 * @package   Barn2/woocommerce-product-table
 * @author    Barn2 Plugins <info@barn2.co.uk>
 * @license   GPL-3.0
 * @copyright Barn2 Media Ltd
 */
class Admin_Controller implements Registerable, Service {

    private $plugin;
    private $settings_page;
    private $tinymce;

    public function __construct( Licensed_Plugin $plugin ) {
        $this->plugin        = $plugin;
        $this->settings_page = new Settings_Page( $plugin );
        $this->tinymce       = new TinyMCE();
    }

    public function register() {
        $this->settings_page->register();
        $this->tinymce->register();

        \add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_scripts' ) );

        // Add settings link from Plugins page.
        \add_filter( 'plugin_action_links_' . $this->plugin->get_basename(), array( $this, 'plugin_page_action_links' ) );

        // Add documentation link to Plugins page.
        \add_filter( 'plugin_row_meta', array( $this, 'plugin_page_row_meta' ), 10, 2 );
    }

    public function plugin_page_action_links( $links ) {
        \array_unshift( $links, \sprintf( '<a href="%1$s">%2$s</a>', $this->plugin->get_settings_page_url(), __( 'Settings', 'woocommerce-product-table' ) ) );
        return $links;
    }

    public function plugin_page_row_meta( $links, $file ) {
        if ( $file !== $this->plugin->get_basename() ) {
            return $links;
        }

        $row_meta = array(
            'docs' => \sprintf(
                '<a href="%1$s" aria-label="%2$s" target="_blank">%3$s</a>',
                \esc_url( $this->plugin->get_documentation_url() ),
                \esc_attr__( 'View WooCommerce Product Table documentation', 'woocommerce-product-table' ),
                \esc_html__( 'Docs', 'woocommerce-product-table' )
            )
        );

        return \array_merge( $links, $row_meta );
    }

    public function register_admin_scripts( $hook_suffix ) {
        if ( 'woocommerce_page_wc-settings' !== $hook_suffix ) {
            return;
        }

        $suffix = Util::get_script_suffix();

        \wp_enqueue_style( 'wcpt-admin', \WCPT_Util::get_asset_url( "css/admin/wc-product-table-admin{$suffix}.css" ), array(), $this->plugin->get_version() );
        \wp_enqueue_script( 'wcpt-admin', \WCPT_Util::get_asset_url( "js/admin/wc-product-table-admin{$suffix}.js" ), array( 'jquery' ), $this->plugin->get_version(), true );
    }

}
