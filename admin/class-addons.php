<?php
add_action( 'admin_menu', 'wiz_snb__add_admin_menu' );
//add_action( 'admin_init', 'wiz_snb__settings_init' );


function wiz_snb__add_admin_menu(  ) { 

	add_submenu_page( 'edit.php?post_type=notification_bar', 'Addons', 'Addons', 'manage_options', 'scheduled_notification_bar', 'wiz_snb__options_page' );

}


function wiz_snb__options_page(  ) { 

		?>
		
			<style>
            .left-side {
                width: 75%;
                margin-right:3%;
                float:left;            
            }
           
            .product-wrap, .bundle-section {
            	width:100%;
                display: flex;
                flex-wrap: wrap;
                float:left;
            }
            .bundle-section {
            	width:98.5%;
                margin:1%;
                float:left;    
                background-color: #5a94d0;
            }
            .sidebar {
            	display:block;
                width:20%;
                border-left:1px solid #d4cfcf;
                float: right;
    			padding-left: calc(2% - 1px);
            }
            .notify-bar-addon {
                width: 23%;
                margin: calc(1% - 6px);
    			border: 1px solid #d4cfcf;
                padding: 5px;
            }
            .notify-bar-addon img {
                height: auto;
                width: 100%;
                display: block;
            }
            .bundles.first {
            	width:30%;
                margin-right:2%;
				background: #fff;
            }
            .bundles.second {
            	width: 64%;
                margin-left:2%;
                margin-right:1%;
            }
            .bundles.first img {
                width: 100%;
                height: auto;
                display: block;
            }
            .bundles.second h1, .bundles.second h2, .bundles.second h3, .bundles.second h4, .bundles.second p {
            	color:#fff;
            }
            small {
                font-size: 0.5em;
            }
            .notify-bar-addon h3 {
                min-height: 36px;
            }
            a.button {
                display: block;
                width: 100%;
                text-align: center;
            }
            @media only screen and (max-width:900px){
            	.left-side, .sidebar, .bundles.first, .bundles.second {
                	width:100%;
                    margin-right:0;
                    margin-left:0;
                    padding-left:0;
                    border-left:none;
                }
                .notify-bar-addon {
                	width:48%;
                }
            }
            </style>
            <?php echo __( '<h2>Scheduled Notification Bar Upgrade and Extensions</h2>', 'wiz_plugins' ); ?>
            <?php echo __( '<h3>Extend the power of Scheduled Notification Bar with these extensions</h3>', 'wiz_plugins' ); ?>
           <div class="notification-addons"> 
            <div class="left-side">
            	<div class="product-wrap">
            	
                	<div class="notify-bar-addon">
                		<?php echo '<img style="" src="' . plugins_url( 'admin/images/timer.png', dirname(__FILE__) ) . '">'; ?>
            	        <br>
        	            <?php echo __( '<h3>Scheduled Notification Bar Premium</h3>', 'wiz_plugins' ); ?>
    	                <?php echo __( 'Publish and schedule more notification bars at a time and enable the ability to extend it\'s functionality with any of our addons', 'wiz_plugins' );?>
                        <?php echo __( '<h3>From <em>US$29.99</em></h3>', 'wiz_plugins' ); ?>
                        <?php echo __( '<em>*Premium version</em>', 'wiz_plugins' );?>
                        <?php echo __( '<a target="_blank" class="button" href="https://wizplugins.com/shop/scheduled-notification-bar-plugin-for-wordpress/">Buy Now</a>', 'wiz_plugins' );?>
	               	</div>
                
            		<div class="notify-bar-addon">
            	    	<?php echo '<img style="" src="' . plugins_url( 'admin/images/countdown.jpg', dirname(__FILE__) ) . '">'; ?>
        	            <br>
    	                <?php echo __( '<h3>Scheduled Notification Bar Timer</h3>', 'wiz_plugins' ); ?>
                        <?php echo __( 'Add a countdown timer to create urgency. Set the bar to instantly hide (removed delay with cron cron) or display a custom message', 'wiz_plugins' );?>
                        <?php echo __( '<h3>From <em>US$19.99</em></h3>', 'wiz_plugins' ); ?>
                        <?php echo __( '<em>*Requires premium version</em>', 'wiz_plugins' );?>
                        <?php echo __( '<a target="_blank" class="button" href="https://wizplugins.com/shop/scheduled-notification-bar-plugin-countdown-timer-extension/">Buy Now</a>', 'wiz_plugins' );?>
	               	</div>
                
                	<div class="notify-bar-addon">
            	    	<?php echo '<img style="" src="' . plugins_url( 'admin/images/mail.png', dirname(__FILE__) ) . '">'; ?>
        	            <br>
    	                <?php echo __( '<h3>Scheduled Notification Bar Mailchimp</h3>', 'wiz_plugins' ); ?>
                        <?php echo __( 'Connect with Mailchimp to add a newsletter signup form directly to your notification bar. Hide the bar on success or display a custom message', 'wiz_plugins' );?>
                        <?php echo __( '<h3>From <em>US$19.99</em></h3>', 'wiz_plugins' ); ?>
                        <?php echo __( '<em>*Requires premium version</em>', 'wiz_plugins' );?>
                        <?php echo __( '<a target="_blank" class="button" href="https://wizplugins.com/shop/scheduled-notification-bar-plugin-mailchimp-extension/">Buy Now</a>', 'wiz_plugins' );?>
	               	</div>
                
                	<div class="notify-bar-addon">
            	    	<?php echo '<img style="" src="' . plugins_url( 'admin/images/html.png', dirname(__FILE__) ) . '">'; ?>
        	            <br>
    	                <?php echo __( '<h3>Scheduled Notification Bar HTML/Shortcode</h3>', 'wiz_plugins' ); ?>
                        <?php echo __( 'Add custom HTML or shortcodes to your notification bar. Perfect for custom forms from other newsletter providers, or anything HTML', 'wiz_plugins' );?>
                        <?php echo __( '<h3>From <em>US$19.99</em></h3>', 'wiz_plugins' ); ?>
                        <?php echo __( '<em>*Requires premium version</em>', 'wiz_plugins' );?>
                        <?php echo __( '<a target="_blank" class="button" href="https://wizplugins.com/shop/scheduled-notification-bar-plugin-html-shortcode-extension/">Buy Now</a>', 'wiz_plugins' );?>
	               	</div>
           		</div> 
                
                <div class="bundle-section">
                  	<div class="bundles first">
                    	<?php echo '<img style="" src="' . plugins_url( 'admin/images/bundle-icon.jpeg', dirname(__FILE__) ) . '">'; ?>
                    </div>
                    <div class="bundles second">
                    	<?php echo __( '<h1>Bundle and Save <small>From </small><em> US$69.99</em></h1>', 'wiz_plugins' ); ?>
                        <?php echo __( '<h3>One purchase and you get the lot</h3>', 'wiz_plugins' ); ?>
                        <?php echo __( '<h4>Scheduled Notification Bar Premium</h4>', 'wiz_plugins' ); ?>
                        <?php echo __( '<h4>Scheduled Notification Bar Timer</h4>', 'wiz_plugins' ); ?>
                        <?php echo __( '<h4>Scheduled Notification Bar HTML and Shortcodes</h4>', 'wiz_plugins' ); ?>
                        <?php echo __( '<h4>Scheduled Notification Bar Mailchimp Extension</h4>', 'wiz_plugins' ); ?>
                        <br>
                        <a target="_blank" href="https://wizplugins.com/shop/scheduled-notification-bar-plugin-bundle-for-wordpress/"><?php echo '<img style="max-width:100%;height:auto;" src="' . plugins_url( 'admin/images/buyer.png', dirname(__FILE__) ) . '">'; ?></a>
                        <?php echo __( '<p>*Opens in a new tab at Freemius</p>', 'wiz_plugins' ); ?>
                    </div>
            	</div>
                
            </div>
            
            <div class="sidebar">
                	<?php echo '<img style="max-width:100%;height:auto;" src="' . plugins_url( 'admin/images/wiz-logo.png', dirname(__FILE__) ) . '">'; ?>
                    <br>
                    <?php echo __( '<h2>More than Just a notification bar</h2>', 'wiz_plugins' ); ?>
                    <?php echo __( 'Browse our rannge of plugins to enhance and extend your WordPress website', 'wiz_plugins' );?>
                    <br>
                    <hr>
                    <?php echo __( '<h3>Ultimate Bulk no-index no-follow</h3>', 'wiz_plugins' );?>
                    <?php echo __( 'The ultimate tool to quickly deindex content from search engines and accellerate any thin content penalties. Integrates with most SEO plugins', 'wiz_plugins' );?>
                    <br>
                    <?php echo __( '<a target="_blank" href="https://wizplugins.com/product/ultimate-bulk-seo-noindex-nofollow-premium/">View &rarr;</a>', 'wiz_plugins' );?>
                    <br>
                    <hr>
                    <?php echo __( '<h3>Backorder alert for WooCommerce</h3>', 'wiz_plugins' );?>
                    <?php echo __( 'Keep your buyer in the loop and notify them before they can add to cart the item is on backorder. Store their acknowledgment on their order', 'wiz_plugins' );?>
                    <br>
                    <?php echo __( '<a target="_blank" href="https://wizplugins.com/product/backorder-alert-for-woocommerce/">View &rarr;</a>', 'wiz_plugins' );?>
                    <br>
                    <hr>
                    <?php echo __( '<h3>Perfect Woo Shop Display</h3>', 'wiz_plugins' );?>
                    <?php echo __( 'Struggling with your shop page layout lining up perfectly? This plugin will come to the rescue creating a perfectly aligned shop layout', 'wiz_plugins' );?>
                    <br>
                    <?php echo __( '<a target="_blank" href="https://wizplugins.com/product/perfect-woo-shop-display/">View &rarr;</a>', 'wiz_plugins' );?>
                    <br>
                    <hr>
                    <?php echo __( '<h3>Variation attributes for shop page</h3>', 'wiz_plugins' );?>
                    <?php echo __( 'Show the variation attributes on your shop page allowing your customers to see at a glance if a certain variation is available', 'wiz_plugins' );?>
                    <br>
                    <?php echo __( '<a target="_blank" href="https://wizplugins.com/product/woo-variation-attributes-for-shop-page/">View &rarr;</a>', 'wiz_plugins' );?>
                    <br>
                    <hr>
                    <?php echo __( '<h3>Focus on reviews for WooCommerce</h3>', 'wiz_plugins' );?>
                    <?php echo __( 'Reviews sell, so why not take advantage of them? Set the review tab as the default open tab and attract the positive social influence to help you sell more', 'wiz_plugins' );?>
                    <br>
                    <?php echo __( '<a target="_blank" href="https://wizplugins.com/product/focus-on-reviews-for-woocommerce/">View &rarr;</a>', 'wiz_plugins' );?>
                    <br>
                    <hr>
                    <?php echo __( '<h3>Sticky add to cart for WooCommerce</h3>', 'wiz_plugins' );?>
                    <?php echo __( 'Keep the action in view at all times  and display a sticky add to cart bar on your product page. Configure different options for mobile and desktop', 'wiz_plugins' );?>
                    <br>
                    <?php echo __( '<a target="_blank" href="https://wizplugins.com/product/sticky-add-to-cart-for-woo/">View &rarr;</a>', 'wiz_plugins' );?>
                    <br>
                    <hr>
        	</div>

		</div>
		<?php

}
