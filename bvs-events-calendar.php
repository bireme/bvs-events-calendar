<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://reddes.bvsalud.org/
 * @since             1.0.0
 * @package           BVS_Events_Calendar
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin BVS Agenda de Eventos
 * Plugin URI:        https://github.com/bireme/events-calendar
 * Description:       Plugin para publicação de agenda de eventos na BVS
 * Version:           1.1.0
 * Author:            BIREME/OPAS/OMS
 * Author URI:        http://reddes.bvsalud.org/
 * License:           LGPL
 * License URI:       http://www.gnu.org/licenses/lgpl.html
 * Text Domain:       bvs-events-calendar
 * Domain Path:       /languages
 * Network:           true
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

defined('GOOGLE_MAPS_APIKEY') or define('GOOGLE_MAPS_APIKEY', '');

if ( defined( 'POLYLANG_VERSION') ) {
    require_once( PLL_INC . '/api.php');
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bvs-events-calendar-activator.php
 */
function activate_bvs_events_calendar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bvs-events-calendar-activator.php';
	BVS_Events_Calendar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bvs-events-calendar-deactivator.php
 */
function deactivate_bvs_events_calendar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bvs-events-calendar-deactivator.php';
	BVS_Events_Calendar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bvs_events_calendar' );
register_deactivation_hook( __FILE__, 'deactivate_bvs_events_calendar' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bvs-events-calendar.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bvs_events_calendar() {

	$plugin = new BVS_Events_Calendar();
	$plugin->run();

}
run_bvs_events_calendar();
