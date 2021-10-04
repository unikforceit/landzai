<?php
if ( landzai_theme_option('sidebar') ) {
	do_action('landzai_sidebar');
} else {
	if ( is_active_sidebar('sidebar-1')){
		echo '<div class="blog-sidebar">';
		dynamic_sidebar('sidebar-1');
		echo '</div>';
	}
}
?>

