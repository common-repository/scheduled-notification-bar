<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wizplugins.com
 * @since             1.0.0
 * @package           Scheduled_Notification_Bar
 *
 * @wordpress-plugin
 * Plugin Name: Scheduled Notification Bar
 * Plugin URI:        https://wizplugins.com/product/scheduled-notification-bar/
 * Description:       Schedule a notification bar to display and hide at a specific time or day.
 * Version:           1.0.1
 * Author:            Wiz Plugins
 * Author URI:        https://wizplugins.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       scheduled-notification-bar
 * Domain Path:       /languages
 */

if ( !function_exists( 'schedulebar_fs' ) ) {
    // Create a helper function for easy SDK access.
    function schedulebar_fs()
    {
        global  $schedulebar_fs ;
        
        if ( !isset( $schedulebar_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $schedulebar_fs = fs_dynamic_init( array(
                'id'             => '8023',
                'slug'           => 'ScheduledNotificationBar',
                'type'           => 'plugin',
                'public_key'     => 'pk_01b4c2bb62b97294b27069cddc0ae',
                'is_premium'     => false,
                'premium_suffix' => 'Premium',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'first-path' => 'edit.php?post_type=notification_bar',
                'support'    => false,
            ),
                'is_live'        => true,
            ) );
        }
        
        return $schedulebar_fs;
    }
    
    // Init Freemius.
    schedulebar_fs();
    // Signal that SDK was initiated.
    do_action( 'schedulebar_fs_loaded' );
}

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SCHEDULED_NOTIFICATION_BAR_VERSION', '1.0.1' );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-scheduled-notification-bar-activator.php
 */
function activate_scheduled_notification_bar()
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-scheduled-notification-bar-activator.php';
    Scheduled_Notification_Bar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-scheduled-notification-bar-deactivator.php
 */
function deactivate_scheduled_notification_bar()
{
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-scheduled-notification-bar-deactivator.php';
    Scheduled_Notification_Bar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_scheduled_notification_bar' );
register_deactivation_hook( __FILE__, 'deactivate_scheduled_notification_bar' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-scheduled-notification-bar.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_scheduled_notification_bar()
{
    $plugin = new Scheduled_Notification_Bar();
    $plugin->run();
}

run_scheduled_notification_bar();
if ( !function_exists( 'schedulebar_fs_uninstall_cleanup' ) ) {
    /**
     * Plugin uninstall cleanup.
     *
     * @since 1.0.0
     */
    schedulebar_fs()->add_action( 'after_uninstall', 'schedulebar_fs_uninstall_cleanup' );
}