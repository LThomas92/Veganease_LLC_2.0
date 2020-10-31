<?php

namespace Barn2\WPT_Lib\Plugin;

/**
 * Basic interface implemented by all Barn2 plugins.
 *
 * @package   Barn2/barn2-lib
 * @author    Barn2 Plugins <info@barn2.co.uk>
 * @license   GPL-3.0
 * @copyright Barn2 Media Ltd
 * @version   1.0
 */
interface Plugin {

    public function get_name();

    public function get_version();

    public function get_file();

    public function get_basename();

    public function get_slug();

    public function get_dir_path();

    public function is_woocommerce();

    public function get_settings_page_url();

    public function get_documentation_url();

}
