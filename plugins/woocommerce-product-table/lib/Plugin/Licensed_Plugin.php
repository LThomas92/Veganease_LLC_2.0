<?php

namespace Barn2\WPT_Lib\Plugin;

/**
 * Extends the Plugin interface to add additional functions for licensed plugins.
 *
 * @package   Barn2/barn2-lib
 * @author    Barn2 Plugins <info@barn2.co.uk>
 * @license   GPL-3.0
 * @copyright Barn2 Media Ltd
 */
interface Licensed_Plugin extends Plugin {

    /**
     * Gets the item ID of this plugin.
     *
     * @var int
     */
    public function get_item_id();

    /**
     * Gets the plugin license object.
     *
     * @var Barn2\WPT_Lib\Plugin\License\License
     */
    public function get_license();

    /**
     * @var Barn2\WPT_Lib\Plugin\License\Admin\License_Setting
     */
    public function get_license_setting();

    /**
     * Gets the URL of the page where license settings are managed.
     *
     * @var string (URL)
     */
    public function get_license_page_url();

    /**
     * Get the legacy database prefix for the old license system.
     *
     * @var string
     */
    public function get_legacy_db_prefix();

}
