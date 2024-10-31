<?php

// Ensures dashicons are loading
function wiz_notify_load_dashicons(){
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'wiz_notify_load_dashicons');


