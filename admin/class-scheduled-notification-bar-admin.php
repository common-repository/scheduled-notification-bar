<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wizplugins.com
 * @since      1.0.0
 *
 * @package    Scheduled_Notification_Bar
 * @subpackage Scheduled_Notification_Bar/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Scheduled_Notification_Bar
 * @subpackage Scheduled_Notification_Bar/admin
 * @author     John Cook <hello@swiftdesigns.com.au>
 */
class Scheduled_Notification_Bar_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Scheduled_Notification_Bar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Scheduled_Notification_Bar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/scheduled-notification-bar-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Scheduled_Notification_Bar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Scheduled_Notification_Bar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/scheduled-notification-bar-admin.js', array( 'jquery' ), $this->version, false );

	}

}

include 'class-custom-post-type.php';

include 'expiry-date-scheduler.php';

include 'query-notification-bar.php';

include 'meta-boxes.php';

include 'class-addons.php';