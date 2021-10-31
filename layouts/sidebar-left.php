<?php

if ( landzai_theme_option('sidebar_left')) {
	do_action('landzai_sidebar_left');
} else {
	if ( is_active_sidebar('sidebar-2')){
		echo '<div class="blog-sidebar">';
		dynamic_sidebar('sidebar-2');
		echo '</div>';
	}
}