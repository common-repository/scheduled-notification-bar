<?php

add_action('wp_footer', 'wiz_notify_sticky_position_bottom_spacing');
function wiz_notify_sticky_position_bottom_spacing(){
$Notification_bar_position = get_post_meta(get_the_ID() , 'wiz_snb_notification-bar-position', true);
$Make_sticky = get_post_meta(get_the_ID() , 'wiz_snb_make-sticky', true);

// If the bar is at the top and set to sticky run the following juery
//if ($Notification_bar_position == 'bottom' && $Make_sticky) {
	?>
<script>
 jQuery(document).ready(function() {
    var tmpBottomMax = -1;    
    jQuery('.wiz-notification-bar-outer.sticky-bottom').each(function() {
       // debugger;
        if(jQuery(this).height()>tmpBottomMax){
			tmpBottomMax =  jQuery(this).height(); 
        }                                      
    });
    jQuery("body").css("margin-bottom",tmpBottomMax+"px");    
 }); 
</script>
	<?php
//    }
}

/**
 *
 * Set the spacing of the notification bar if the position is sticky
 * This prevents the bar laying over other other elements
 *
 */
add_action('wp_footer', 'wiz_notify_sticky_position_spacing');
function wiz_notify_sticky_position_spacing(){
$Notification_bar_position = get_post_meta(get_the_ID() , 'wiz_snb_notification-bar-position', true);
$Make_sticky = get_post_meta(get_the_ID() , 'wiz_snb_make-sticky', true);

// If the bar is at the top and set to sticky run the following juery
if ($Notification_bar_position == 'top' && $Make_sticky) {
	?>
<script>
 jQuery(document).ready(function() {
    var tmpMax = -1;    
    jQuery('.wiz-notification-bar-outer.sticky-top').each(function() {
      //  debugger;
        if(jQuery(this).height()>tmpMax){
			tmpMax =  jQuery(this).height(); 
        }                                      
    });
    jQuery("body").css("margin-top",tmpMax+"px");    
 }); 
</script>
	<?php
    }
}








