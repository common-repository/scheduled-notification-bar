<?php
add_action('wp_head', 'wiz_notify_custom_button_css');
function wiz_notify_custom_button_css(){
$Align_button_to_right = get_post_meta(get_the_ID() , 'wiz_snb_align-button-to-right', true);
if($Align_button_to_right){
?>
<style>
@media only screen and (max-width:768px){
	a.button.wiz-notify-button{
		position:relative !important;
        right:auto !important;
    }
}
</style>
<?php
	}
}