<?php

// top
add_action('wp_footer', 'wiz_notify_dismiss_top_store');
function wiz_notify_dismiss_top_store(){
$Dismissable = get_post_meta(get_the_ID() , 'wiz_snb_dismissable', true);
	if($Dismissable){
		?>
        <script>
       jQuery('.wiz-notification-bar-outer.top .wiz-notice-close').click(function() { 
       		//var clickedBtnID = jQuery(this).parent().parent().parent().attr('id'); // stores the id of the clicked button id to clickedBtnID
            var clickedBtnID = 'haha';
            console.log(clickedBtnID);
       });
        
jQuery(document).ready(function($) {
    $(document).ready(function() {
        //Get current time
        var currentTime = new Date().getTime();
        //Add hours function
        Date.prototype.addHours = function(h) {
            this.setTime(this.getTime() + (h * 60 * 60 * 1000));
            return this;
        }
        //Get time after 24 hours
        var after24 = new Date().addHours(10).getTime();
        //Hide div click
        $('.wiz-notification-bar-outer.top .wiz-notice-close').click(function() {
            //Hide div
            var clickedBtnID = jQuery(this).parent().parent().parent().attr('id'); // stores the id of the clicked button id to clickedBtnID
            sessionStorage.setItem('divid', clickedBtnID);
            $('#' + clickedBtnID).hide();
            $("body").css("margin-top","0px");  // on click it sets the margin top to 0px
            //Set desired time till you want to hide that div
            sessionStorage.setItem('desiredTimeTop', after24);
        });
        //If desired time >= currentTime, based on that HIDE / SHOW
        if (sessionStorage.getItem('desiredTimeTop') >= currentTime) {
        	var x = sessionStorage.getItem("divid");
            $('#' + x).hide();
            $("body").css("margin-top","0px");  // on click it sets the margin top to 0px
        } else {
            $('.wiz-notification-bar-outer.bottom').show();
        }
    });
});



jQuery(document).on("click",".wiz-notification-bar-outer.top .wiz-notice-close", function () {
   var clickedBtnID = jQuery(this).parent().parent().parent().attr('id'); // or var clickedBtnID = this.id
   console.log('you clicked on button #' + clickedBtnID);
});
</script> 
    	<?php
	}
}




// bottom
add_action('wp_footer', 'wiz_notify_dismiss_bottom_store');
function wiz_notify_dismiss_bottom_store(){
$Dismissable = get_post_meta(get_the_ID() , 'wiz_snb_dismissable', true);
	if($Dismissable){
		?>
        <script>
jQuery(document).ready(function($) {
    $(document).ready(function() {
        //Get current time
        var currentTime = new Date().getTime();
        //Add hours function
        Date.prototype.addHours = function(h) {
            this.setTime(this.getTime() + (h * 60 * 60 * 1000));
            return this;
        }
        //Get time after 24 hours
        var after24 = new Date().addHours(10).getTime();
        //Hide div click
        $('.wiz-notification-bar-outer.bottom .wiz-notice-close').click(function() {
            //Hide div
            $(this).parent().parent().hide();
            $("body").css("margin-bottom","0px");  // on click it sets the margin top to 0px
            //Set desired time till you want to hide that div
            sessionStorage.setItem('desiredTimes', after24);
        });
        //If desired time >= currentTime, based on that HIDE / SHOW
        if (sessionStorage.getItem('desiredTimes') >= currentTime) {
            $('.wiz-notification-bar-outer.bottom').hide();
            $("body").css("margin-bottom","0px");  // on click it sets the margin top to 0px
        } else {
            $('.wiz-notification-bar-outer.bottom').show();
        }
    });
});
</script> 
    	<?php
	}
}
