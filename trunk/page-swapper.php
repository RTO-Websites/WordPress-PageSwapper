<?php

use Inc\PageSwapper;
use Inc\PageSwapperActivator;
use Inc\PageSwapperDeactivator;
use MagicAdminPage\MagicAdminPage;

/**
 * @link              https://github.com/crazypsycho
 * @since             1.0.0
 * @package           PageSwapper
 *
 * @wordpress-plugin
 * Plugin Name:       PageSwapper
 * Plugin URI:        https://github.com/crazypsycho/WordPress-PageSwapper
 * Description:       Swap pages with transitions
 * Version:           1.2.0
 * Author:            Sascha Hennemann
 * Author URI:        https://github.com/crazypsycho
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       page-swapper
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}

/**
 * The class responsible for auto loading classes.
 */
require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/PageSwapperActivator.php
 */
function activatePageSwapper() {
    PageSwapperActivator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/PageSwapperDeactivator.php
 */
function deactivatePageSwapper() {
    PageSwapperDeactivator::deactivate();
}

register_activation_hook( __FILE__, 'activatePageSwapper' );
register_deactivation_hook( __FILE__, 'deactivatePageSwapper' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function runPageSwapper() {

    $plugin = new PageSwapper();
    $plugin->run();

}

runPageSwapper();
