<?php
if ( landzai_theme_option('footer_widget') ) {
	do_action('footer_widget');
} else {
	if ( is_active_sidebar('footer')){
		echo '<div class="row">';
		dynamic_sidebar('footer');
		echo '</div>';
	}
}
?>

