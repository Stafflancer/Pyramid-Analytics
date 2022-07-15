<?php
defined('ABSPATH') || exit;

/**
 * Plugin Name: CAOS
 * Plugin URI: https://ffw.press/wordpress/caos/
 * Description: Completely optimize Google Analytics for your Wordpress Website - host analytics.js/gtag.js locally or use Minimal Analytics, bypass Ad Blockers in Stealth Mode, capture outbound links, and much more!
 * Version: 4.3.2
 * Author: Daan from FFW.Press
 * Author URI: https://ffw.press/
 * License: GPL2v2 or later
 * Text Domain: host-analyticsjs-local
 */

define('CAOS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('CAOS_PLUGIN_FILE', __FILE__);
define('CAOS_PLUGIN_BASENAME', plugin_basename(CAOS_PLUGIN_FILE));
define('CAOS_STATIC_VERSION', '4.3.2');
define('CAOS_DB_VERSION', '4.3.0');

/**
 * Takes care of loading classes on demand.
 *
 * @param $class
 *
 * @return mixed|void
 */
function caos_autoload($class)
{
    $path = explode('_', $class);

    if ($path[0] != 'CAOS') {
        return;
    }

    if (!class_exists('FFWP_Autoloader')) {
        require_once(CAOS_PLUGIN_DIR . 'ffwp-autoload.php');
    }

    $autoload = new FFWP_Autoloader($class);

    return include CAOS_PLUGIN_DIR . 'includes/' . $autoload->load();
}

spl_autoload_register('caos_autoload');

/**
 * All systems GO!!!
 *
 * @return CAOS
 */
function caos_init()
{
    static $caos = null;

    if ($caos === null) {
        $caos = new CAOS();
    }

    return $caos;
}

caos_init();
