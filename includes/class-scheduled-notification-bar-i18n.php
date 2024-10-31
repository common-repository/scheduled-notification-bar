<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://wizplugins.com
 * @since      1.0.0
 *
 * @package    Scheduled_Notification_Bar
 * @subpackage Scheduled_Notification_Bar/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Scheduled_Notification_Bar
 * @subpackage Scheduled_Notification_Bar/includes
 * @author     John Cook <hello@swiftdesigns.com.au>
 */
class Scheduled_Notification_Bar_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'scheduled-notification-bar',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
