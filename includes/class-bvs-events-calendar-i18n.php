<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://reddes.bvsalud.org/
 * @since      1.0.0
 *
 * @package    BVS_Events_Calendar
 * @subpackage BVS_Events_Calendar/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    BVS_Events_Calendar
 * @subpackage BVS_Events_Calendar/includes
 * @author     BIREME/OPAS/OMS <bvs.technical.support@listas.bireme.br>
 */
class BVS_Events_Calendar_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bvs-events-calendar',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
