<?php

namespace Barn2\Plugin\WC_Product_Table;

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

spl_autoload_register( [ __NAMESPACE__ . '\\Autoloader', 'load' ] );

/**
 * The plugin autoloader.
 *
 * @author    Barn2 Plugins <info@barn2.co.uk>
 * @license   GPL-3.0
 * @link      https://barn2.co.uk
 * @copyright Barn2 Plugins
 */
final class Autoloader {

    const SOURCE_PATHS = [
        'Barn2\\Plugin\\WC_Product_Table' => __DIR__ . '/includes',
        'Barn2\\WPT_Lib'                  => __DIR__ . '/lib',
        'WPTRT\\AdminNotices'             => __DIR__ . '/lib/vendor/admin-notices/src'
    ];

    public static function load( $class ) {
        $path      = '';
        $namespace = '';

        foreach ( self::SOURCE_PATHS as $src_namespace => $src_path ) {
            if ( 0 === \strpos( $class, $src_namespace ) ) {
                $path      = $src_path;
                $namespace = $src_namespace;
                break;
            }
        }

        // Bail if the class is not in our namespace.
        if ( ! $path ) {
            return;
        }

        // Strip namespace from class name.
        $class = \str_replace( $namespace, '', $class );

        // Build the filename - realpath returns false if the file doesn't exist.
        $file = \realpath( $path . '/' . \str_replace( '\\', '/', $class ) . '.php' );

        // If the file exists for the class name, load it.
        if ( $file ) {
            include_once $file;
        }
    }

}
