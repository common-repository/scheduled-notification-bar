<?php


// Code for themes
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

// Code for plugins
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'wiz_notify_bar_flush_rewrites' );
function wiz_notify_bar_flush_rewrites() {
	// call your CPT registration function here (it should also be hooked into 'init')
	myplugin_custom_post_types_registration();
	flush_rewrite_rules();
}