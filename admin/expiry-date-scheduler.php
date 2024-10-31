<?php

/**
 * Sets the notification bar to draft on time expiry
 */
 
/**
 * This function creates a daily cron schedule 
 */
// Custom Cron Schedules
add_filter('cron_schedules', 'wiz_notify_filter_cron_schedules');
function wiz_notify_filter_cron_schedules($schedules) {
    $schedules['wiz_bar_five_minutes'] = array(
        'interval' => 300, // seconds
        'display'  => __('Every 5 minutes') 
    );
    return $schedules;
}


add_action( 'wp', 'wiz_notify_delete_expired_bars' );
function wiz_notify_delete_expired_bars() {
	if ( wp_get_schedule('delete_expired_note') !== 'wiz_bar_five_minutes' ) {
            // Above statement will also be true if NO schedule exists, so here we check and unschedule if required
            if ( $time = wp_next_scheduled('delete_expired_note'))
                wp_unschedule_event($time, 'delete_expired_note');

            wp_schedule_event(time(),'wiz_bar_five_minutes','delete_expired_note');   
        }
}

/**
 * Callback for the setting notification bar post type to draft
 */

add_action( 'delete_expired_note', 'wiz_notify_delete_expired_bars_callback' );
function wiz_notify_delete_expired_bars_callback() {
   $args = array(
    'post_type' => 'notification_bar',
    'posts_per_page' => -1
);


/**
 * Run the query for the date
 */
$notification_bar = new WP_Query($args);
if ($notification_bar->have_posts()):
    while($notification_bar->have_posts()): $notification_bar->the_post();  
		// import the fields
		$Expiry_Date = get_post_meta( get_the_ID(), 'wiz_snb_expiry-date', true );
    	$Expiry_time = get_post_meta( get_the_ID(), 'wiz_snb_expiry-time', true );
		$Time_zone = get_post_meta( get_the_ID(), 'wiz_snb_time-zone', true );
//		$expire_date = get_post_meta( get_the_ID(), 'expires', true );
	
		// combine date and time
		$wiz_date_time_post_expire = $Expiry_Date . ' ' . $Expiry_time;
		
		// Convert time to countdown time and include timezone details
		$expire_bar_date_time = strtotime($wiz_date_time_post_expire) + (60*60* $Time_zone);
       // get the current date  
       $current_date = get_the_date();
       // convert convert expires date to the standard strtotime format
      // $wiz_expired_date_converter = strtotime($expire_date);
		$wiz_expired_date_converter = $expire_bar_date_time;
		$wiz_actual_date = time();
       // check if the converted expired date is less than the actual date today
        if ( $wiz_expired_date_converter <= $wiz_actual_date ) {
            //If the date is less than the actual date we set the post type of the notification bar to draft                 
			$wiz_notify_bar = array(
               'ID'     -> $_post->ID,
               'post_status'   =>  'draft'
                );
                wp_update_post($wiz_notify_bar);        
		
		}

    endwhile;
endif; 
}
