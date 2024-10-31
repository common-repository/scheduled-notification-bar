<?php

if ( !function_exists( 'wiz_notification_bar' ) ) {
    // Register Custom Post Type
    function wiz_notification_bar()
    {
        $labels = array(
            'name'                  => _x( 'Notification Bars', 'Post Type General Name', 'wiz_plugins' ),
            'singular_name'         => _x( 'Notification Bar', 'Post Type Singular Name', 'wiz_plugins' ),
            'menu_name'             => __( 'Notification Bar', 'wiz_plugins' ),
            'name_admin_bar'        => __( 'Notification Bar', 'wiz_plugins' ),
            'archives'              => __( 'Notification Bar Archives', 'wiz_plugins' ),
            'attributes'            => __( 'Notification Bar Attributes', 'wiz_plugins' ),
            'parent_item_colon'     => __( 'Parent Notification Bar:', 'wiz_plugins' ),
            'all_items'             => __( 'All Notification Bar', 'wiz_plugins' ),
            'add_new_item'          => __( 'Add New Notification Bar', 'wiz_plugins' ),
            'add_new'               => __( 'Add New Notification', 'wiz_plugins' ),
            'new_item'              => __( 'New Notification Bar', 'wiz_plugins' ),
            'edit_item'             => __( 'Edit Notification Bar', 'wiz_plugins' ),
            'update_item'           => __( 'Update Notification Bar', 'wiz_plugins' ),
            'view_item'             => __( 'View Notification Bar', 'wiz_plugins' ),
            'view_items'            => __( 'View Notsification Bar', 'wiz_plugins' ),
            'search_items'          => __( 'Search Notification Bar', 'wiz_plugins' ),
            'not_found'             => __( 'Not found', 'wiz_plugins' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'wiz_plugins' ),
            'featured_image'        => __( 'Featured Image', 'wiz_plugins' ),
            'set_featured_image'    => __( 'Set featured image', 'wiz_plugins' ),
            'remove_featured_image' => __( 'Remove featured image', 'wiz_plugins' ),
            'use_featured_image'    => __( 'Use as featured image', 'wiz_plugins' ),
            'insert_into_item'      => __( 'Insert into Notification Bar', 'wiz_plugins' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'wiz_plugins' ),
            'items_list'            => __( 'Notification Bars list', 'wiz_plugins' ),
            'items_list_navigation' => __( 'Notsification Bar list navigation', 'wiz_plugins' ),
            'filter_items_list'     => __( 'Filter Notification Bars list', 'wiz_plugins' ),
        );
        $args = array(
            'label'               => __( 'Notification Bar', 'wiz_plugins' ),
            'description'         => __( 'Display notification bars', 'wiz_plugins' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'revisions' ),
            'taxonomies'          => array(),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 80,
            'menu_icon'           => 'dashicons-bell',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => true,
            'query_var'           => true,
            'capability_type'     => 'page',
        );
        register_post_type( 'notification_bar', $args );
    }
    
    add_action( 'init', 'wiz_notification_bar', 0 );
}

add_action( 'admin_head', 'wiz_notify_limit_posts' );
function wiz_notify_limit_posts()
{
    $count_published_bars = wp_count_posts( 'notification_bar' )->publish;
    $count_draft_bars = wp_count_posts( 'notification_bar' )->draft;
    $count_scheduled_bars = wp_count_posts( 'notification_bar' )->future;
    $max_published_bars = 1;
    //the number of max published posts
    $max_draft_bars = 1;
    //the number of max published posts
    $max_scheduled_bars = 1;
    //the number of max published posts
    
    if ( $count_published_bars >= $max_published_bars || $count_draft_bars >= $max_draft_bars || $count_scheduled_bars >= $max_scheduled_bars ) {
        global  $pagenow ;
        if ( !empty($pagenow) && ('post-new.php' === $pagenow && $_GET['post_type'] == 'notification_bar') ) {
            ?>
			<style>
				#publishing-action, #minor-publishing { display: none; }
				#my-div{display:block}
			</style>
			<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery("<div id='wiz-exceed-upgrade'></div>").insertAfter('#major-publishing-actions');
				jQuery('#minor-publishing').html('<p></p>');
				jQuery("#wiz-exceed-upgrade").html("You have reached the publication limit for the free version. To schedule multiple notification bars please <a target='_blank' href='https://wizplugins.com/product/scheduled-notification-bar-plugin-for-wordpress/?swcfpc=1'>upgrade to pro</a>"); // message is displayed instead of the publish button
			});
			</script>
				<?php 
        }
        
        if ( 'edit.php?post_type=notification_bar' === $pagenow && isset( $_GET['post'] ) && 'post' === get_post_type( $_GET['notification_bar'] ) ) {
            //	if (!empty($pagenow) && 'edit.php?post_type=notification_bar' === $pagenow ) {
            ?>
			<style>
				a.page-title-action { display: none; }
				#my-div{display:block}
			</style>
<?php 
        }
    
    }

}

/**
 * 
 * redirect user to post view screen if limit of notification bars has been reached
 * http://demo.swiftdesigns.com.au/wp-admin/post-new.php?post_type=notification_bar
 */
add_action( 'admin_head', 'wiz_redirec_bar_exceed' );
function wiz_redirec_bar_exceed()
{
    $count_published_bars = wp_count_posts( 'notification_bar' )->publish;
    $count_draft_bars = wp_count_posts( 'notification_bar' )->draft;
    $count_scheduled_bars = wp_count_posts( 'notification_bar' )->future;
    $max_published_bars = 1;
    //the number of max published posts
    $max_draft_bars = 1;
    //the number of max published posts
    $max_scheduled_bars = 1;
    //the number of max published posts
    
    if ( $count_published_bars >= 1 || $count_draft_bars >= 1 || $count_scheduled_bars >= 1 ) {
        global  $pagenow ;
        if ( $pagenow == 'post-new.php' && get_post_type() == 'notification_bar' ) {
            header( "Location: edit.php?post_type=notification_bar" );
        }
    }

}

/**
 * 
 * Prevent edit post lino on post view screen if limit of notification bars has been exceeded
 * http://demo.swiftdesigns.com.au/wp-admin/post-new.php?post_type=notification_bar
 */
add_action( 'admin_head', 'wiz_disable_edit_post_exceed' );
function wiz_disable_edit_post_exceed()
{
    $count_published_bars = wp_count_posts( 'notification_bar' )->publish;
    $count_draft_bars = wp_count_posts( 'notification_bar' )->draft;
    $count_scheduled_bars = wp_count_posts( 'notification_bar' )->future;
    $max_published_bars = 2;
    //the number of max published posts
    $max_draft_bars = 2;
    //the number of max published posts
    $max_scheduled_bars = 2;
    //the number of max published posts
    
    if ( $count_published_bars >= $max_published_bars || $count_draft_bars >= $max_draft_bars || $count_scheduled_bars >= $max_scheduled_bars ) {
        global  $pagenow ;
        $screen = get_current_screen();
        if ( $pagenow == 'edit.php' && get_post_type() == 'notification_bar' ) {
            ?>
				<style>
					.editinline {display:none;}
					span.edit{color:#f00;}
				</style>
				<script type="text/javascript">
				jQuery(document).ready(function(){
					jQuery("<div id='wiz-exceed-upgrade'></div>").insertAfter('#major-publishing-actions');
					jQuery('#minor-publishing').html('<p></p>');
					jQuery("span.edit").html("Delete a notification bar to edit"); // message is displayed instead of the publish button
				});
				</script>
				<?php 
        }
    }

}

/**
 * 
 * Notification message limit hit
 * 
 */
add_action( 'admin_notices', 'wiz_upgrade_bar_notice' );
function wiz_upgrade_bar_notice()
{
    $count_published_bars = wp_count_posts( 'notification_bar' )->publish;
    $count_draft_bars = wp_count_posts( 'notification_bar' )->draft;
    $count_scheduled_bars = wp_count_posts( 'notification_bar' )->future;
    $max_published_bars = 1;
    //the number of max published posts
    $max_draft_bars = 1;
    //the number of max published posts
    $max_scheduled_bars = 1;
    //the number of max published posts
    
    if ( $count_published_bars >= $max_published_bars || $count_draft_bars >= $max_draft_bars || $count_scheduled_bars >= $max_scheduled_bars ) {
        global  $pagenow ;
        if ( $pagenow == 'edit.php' && get_post_type() == 'notification_bar' || $pagenow == 'post-new.php' && get_post_type() == 'notification_bar' ) {
            echo  '<div class="notice notice-error is-dismissible">
					 <p>Oops! You have hit your limit for notification bars. Please delete existing notification bars to create new ones or upgrade now for unlimited notification bars. <a href="https://wizplugins.com/shop/scheduled-notification-bar-plugin-for-wordpress/" target="_blank"><button class="button button-primary">Upgrade Now! &nbsp;➜</button></a></p>

				 </div>' ;
        }
    }

}
