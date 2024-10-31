<?php

// bottom position
add_action( 'wp_footer', 'wiz_notify_snb_notification_at_bottom' );
function wiz_notify_snb_notification_at_bottom()
{
    $args = array(
        'post_type' => 'notification_bar',
    );
    $query = new WP_query( $args );
    
    if ( $query->have_posts() ) {
        ?>

        <?php 
        while ( $query->have_posts() ) {
            $query->the_post();
            /* start the loop */
            ?>

      <?php 
            $Notification_bar_position = get_post_meta( get_the_ID(), 'wiz_snb_notification-bar-position', true );
            
            if ( $Notification_bar_position == 'bottom' ) {
                ?> 
        <aside style="display:contents;" id="post-<?php 
                the_ID();
                ?>" <?php 
                post_class( 'wiz-notification-bar' );
                ?>>
            <?php 
                $Message = get_post_meta( get_the_ID(), 'wiz_snb_message', true );
                $Bold_message = get_post_meta( get_the_ID(), 'wiz_snb_bold-message', true );
                $Add_button = get_post_meta( get_the_ID(), 'wiz_snb_add-button', true );
                $Button_text = get_post_meta( get_the_ID(), 'wiz_snb_button-text', true );
                $Button_URL = get_post_meta( get_the_ID(), 'wiz_snb_button-url', true );
                $Button_text_color = get_post_meta( get_the_ID(), 'wiz_snb_button-text-color', true );
                $Button_background_color = get_post_meta( get_the_ID(), 'wiz_snb_button-background-color', true );
                $Align_button_to_right = get_post_meta( get_the_ID(), 'wiz_snb_align-button-to-right', true );
                $font_color = get_post_meta( get_the_ID(), 'wiz_snb_font-color', true );
                $Background_color = get_post_meta( get_the_ID(), 'wiz_snb_background-color', true );
                $Make_sticky = get_post_meta( get_the_ID(), 'wiz_snb_make-sticky', true );
                $Dismissable = get_post_meta( get_the_ID(), 'wiz_snb_dismissable', true );
                ?>
           <div class="wiz-notification-bar-outer bottom <?php 
                if ( $Notification_bar_position == 'bottom' && $Make_sticky ) {
                    echo  'sticky-bottom' ;
                }
                ?>" style="z-index:99999999;position:<?php 
                if ( $Make_sticky ) {
                    echo  'fixed' ;
                }
                ?>;<?php 
                
                if ( $Notification_bar_position == 'top' ) {
                    echo  'top:0' ;
                } else {
                    echo  'bottom:0' ;
                }
                
                ?>; background-color:<?php 
                echo  $Background_color ;
                ?>;width:100%;display:flex;left: 0;">
                <div class="wiz-notification-bar-inner" style="display:flex;margin:auto;">
                    <?php 
                if ( $Dismissable ) {
                    echo  '<span class="wiz-notice-close" style="color:' . $font_color . ';position: absolute;right: 20px;top: 20px;"><span class="dashicons dashicons-dismiss"></span></span>' ;
                }
                ?>
                   <p class="notify-block" style="color:<?php 
                echo  $font_color ;
                ?>;display: flex;justify-content: center;align-items: center;margin-top:1em;margin-bottom:1em;<?php 
                if ( $Bold_message ) {
                    echo  'font-weight:900' ;
                }
                ?>">
                        <?php 
                echo  '<span style="margin-left:10px;margin-right:10px;">' . $Message . '</span>' ;
                ?>
                       <?php 
                if ( $Add_button ) {
                    echo  '<a style="margin-left:10px;margin-right:10px;color:' . $Button_text_color . ';background-color:' . $Button_background_color ;
                }
                if ( $Align_button_to_right ) {
                    echo  ';position:absolute;right:50px;' ;
                }
                if ( $Add_button && $Button_URL && $Button_text ) {
                    echo  '" class="button wiz-notify-button" href="' . $Button_URL . '">' . $Button_text . '</a>' ;
                }
                ?>
                       <?php 
                ?>
                       <?php 
                ?>        
                        <?php 
                ?>
                       
                    </p>
                </div>
            </div>
            
      
<!-- .entry-content -->
            
        </aside>
      <?php 
            }
            
            ?>
       <?php 
        }
        /* end the loop*/
        ?>
     
        <?php 
        rewind_posts();
    }

}
