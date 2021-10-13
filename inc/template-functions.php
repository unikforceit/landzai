<?php

add_filter( 'body_class', 'landzai_bodyclass_checker' );
function landzai_bodyclass_checker( $classes ) {
    $classes[] = 'checkerbody';
    return $classes;   
}

function landzai_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'landzai' ); ?></h2>
		<div class="nav-links"> 
			<?php 
				if ( $prev_link = get_previous_comments_link( esc_attr_( 'Older Comments', 'landzai' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_attr_( 'Newer Comments', 'landzai' )) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}

function landzai_comment_callback($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo esc_attr($tag);?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="article">
    <?php endif; ?>
  
        <div class="author-pic"><?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, 64 ); ?></div>
        <div class="details">
 		<div class="author-meta">
	        <?php printf( __( '<div class="name"><h4>%s</h4></div>','landzai' ), get_comment_author_link() ); ?>
	        <div class="date"><span><?php printf( __('%1$s','landzai'),get_comment_date()); ?></span></div>
		</div>
		    <?php if ( $comment->comment_approved == '0' ) : ?>
		         <em class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.','landzai' ); ?></em>
		    <?php endif; ?>    
	    	
	    	<?php comment_text(); ?>	        
		    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?> 
	   
	</div>
       
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
    }


function landzai_logo(){
    $custom_logo_id = get_theme_mod( 'custom_logo' );

    if ( $custom_logo_id ) {
        echo '<a class="logo" href='.esc_url( home_url( '/' ) ).' rel="home">'.wp_get_attachment_image( $custom_logo_id, 'full' ).'</a>';
    } else {
        echo '<a class="logo" href='.esc_url( home_url( '/' ) ).' rel="home">'.get_bloginfo( 'name' ).'</a>';
    }
}

function landzai_post_tag() {
	
	if ( 'post' == get_post_type() ) {
		
    $posttags = get_the_tags();
    $separator = ' ';
    $output = '';
    if ($posttags) {

        foreach($posttags as $tag) {
                $output .='<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>'.$separator;
        }
		$tags= trim($output, $separator);
		echo '<ul class="post-catagory d-flex">'.$tags.'</ul>';
    }
	}
}
function landzai_post_share() {
echo '<ul class="post-share d-flex justify-content-start justify-content-md-end">
                    <li><a href="#"><i class="fas fa-share-alt"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                </ul>';
}


function landzai_single_category($default = true) {
					
	if ( 'post' == get_post_type() ) {
		$categories = get_the_category();
		$separator = ', ';
		$output = '';
		if($categories){
			foreach($categories as $category) {
	
				$output .= '<a href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a>'.$separator;

			}
		$cat= trim($output, $separator);
		echo wp_kses_post($cat);
		}
	}

}

/*Filter searchform button markup*/
add_filter( 'get_search_form','landzai_modify_search_form');

function landzai_modify_search_form( $form ) {
    $form = '<form class="password-form" role="search" method="get" id="search-form" action="' .esc_url(home_url( '/' )) . '" >
    <div><label class="screen-reader-text" for="s">' . esc_attr__( 'Search for:','landzai' ) . '</label>
    <input type="text" placeholder="' . esc_attr__( 'Type and hit enter','landzai' ) . '" class="form-control" value="' . get_search_query() . '" name="s" id="s" />
    <button type="submit"><i class="dashicons dashicons-search"></i></button>
    </div>
    </form>';
 
    return $form;
}
 

/*Filter password form markup*/
add_filter( 'the_password_form', 'landzai_password_form' );
function landzai_password_form() {
	 global $post;
	 $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	 $o = '<form class="postpass-form" action="' .
    esc_url( site_url( 'wp-login.php?action=postpass',
                      'login_post' ) ) .
    '" method="post">
	 ' . esc_attr__( 'This post is password protected and this is what I want to say about that. To view it please enter your password below:','landzai') . '
	 <input class="post-pass" name="post_password" placeholder="' . esc_attr__( 'Type and hit enter','landzai' ) . '" id="' . $label . '" type="password" />
	 </form>
	 ';
	 return $o;
}

/*No main nav fallback*/
function landzai_no_main_nav( $args ) {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    extract( $args );

    $link = $link_before.'<a href="' .esc_url(admin_url( 'nav-menus.php' )). '">' . $before . esc_attr__('Please assign PRIMARY menu location','landzai') . $after . '</a>'. $link_after;

    if ( FALSE !== stripos( $items_wrap, '<ul' ) or FALSE !== stripos( $items_wrap, '<ol' ) ){
        $link = "<li>$link</li>";
    }

    $output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
    if ( ! empty ( $container ) ){
        $output  = "<$container class='$container_class' id='$container_id'>$output</$container>";
    }

    if ( $echo ){
        echo wp_kses_post($output);
    }

    return $output;
}

function landzai_navigation(){

	if ( landzai_theme_option('enb_single_nav') ) {

		do_action('landzai_single_navigation');

	} else { ?>
        <?php
        $prev = get_previous_post(true);
        $next = get_next_post(true);

        if ($prev) {?>
            <div class="pagination-item previous-page">
                <a href="<?php echo get_permalink( $prev->ID ); ?>">
                    <i class="pagination-arrow fas fa-long-arrow-alt-left"></i>
                    <h4 class="pagination-text">Previous Post</h4>
                    <h3 class="post-title"><?php echo get_the_title( $prev->ID ); ?></h3>
                </a>
            </div>
        <?php } if ($next) {?>
            <div class="pagination-item next-page">
                <a href="<?php echo get_permalink( $next->ID ); ?>">
                    <i class="pagination-arrow fas fa-long-arrow-alt-right"></i>
                    <h4 class="pagination-text">Next Post</h4>
                    <h3 class="post-title"><?php echo get_the_title( $next->ID ); ?></h3>
                </a>
            </div>
        <?php }?>

    <?php }
}
function landzai_product_pagination() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<nav class="product-pagination">
                            <ul class="pagination-area">' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('<i class="fas fa-angle-left"></i>') );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="current"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link('<i class="fas fa-angle-right"></i>') );

    echo ' </ul>
                        </nav>' . "\n";

}
/**
 * Price Currency  */

function landzai_price_currency()
{
    global $woocommerce;
    $currency = get_woocommerce_currency_symbol();
    return $currency;

}

/**
 * Sale price
 */
function landzai_sale_price()
{
    global $woocommerce;
    $price = get_post_meta(get_the_ID(), '_sale_price', true);
    return $price;
}

/**
 * Regular price
 */
function landzai_reg_price()
{
    global $woocommerce;
    $price = get_post_meta(get_the_ID(), '_regular_price', true);
    return $price;
}

function landzai_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="pagination-area">
								<ul class="page-pagination justify-content-start">' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('<i class="fas fa-arrow-left"></i>') );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link('<i class="fas fa-arrow-right"></i>') );

    echo '</ul></div>' . "\n";

}
function landzai_pagination(){

	if ( landzai_theme_option('enb_pagination') ) {

		do_action('landzai_pagination');

	} else {

        landzai_numeric_posts_nav();

	}
}

function landzai_share_tags(){

	if ( landzai_theme_option('enb_share_tag') ) {

		do_action('landzai_share_tags');

	} else {
		
		landzai_post_tag();
	}
}

function landzai_related_post(){

	if ( landzai_theme_option('enb_rpost') ) {

		do_action('landzai_related_post');

	}
 
}

function landzai_authorbox(){

	if ( landzai_theme_option('enb_authbox') ) {

		do_action('landzai_authorbox');
	}
 
}

function landzai_dynamic_header(){
    $header_switch = landzai_theme_meta('header_switch');
    $opt_header = landzai_theme_option('opt_header');
    $opt_page_header = landzai_theme_option('opt_page_header');

    if ($header_switch == '1'){
            do_action('landzai_header');
    }
    else{
        if (!is_page_template('theme-builder.php') && !empty($opt_page_header)) {
            echo do_shortcode('[INSERT_ELEMENTOR id="'.$opt_page_header.'"]');
        }
        elseif (is_page_template('theme-builder.php') && !empty($opt_header)) {
            echo do_shortcode('[INSERT_ELEMENTOR id="' . $opt_header . '"]');
        }else{
            get_template_part('template-parts/header','one');
        }
    }
}
function landzai_dynamic_footer(){
    $footer_switch = landzai_theme_meta('footer_switch');
    $opt_footer = landzai_theme_option('opt_footer');

    if ($footer_switch == '1'){
        do_action('landzai_footer');
    }
    else{
       if ($opt_footer) {
           echo do_shortcode('[INSERT_ELEMENTOR id="' . $opt_footer . '"]');
       }else{
           get_template_part('template-parts/footer','one');
       }
    }
}
add_action( 'wp_enqueue_scripts', 'pt_like_it_scripts' );
function pt_like_it_scripts() {
    if( is_single() ) {

        if (!wp_script_is( 'jquery', 'enqueued' )) {
            wp_enqueue_script( 'jquery' );// Comment this line if you theme has already loaded jQuery
        }
        wp_enqueue_script( 'like-it', get_template_directory_uri() .'/assets/js/like-it.js', array('jquery'), '1.0', true );

        wp_localize_script( 'like-it', 'likeit', array(
            'ajax_url' => admin_url( 'admin-ajax.php' )
        ));
    }
}
add_action( 'wp_ajax_nopriv_pt_like_it', 'pt_like_it' );
add_action( 'wp_ajax_pt_like_it', 'pt_like_it' );
function pt_like_it() {

    if ( ! wp_verify_nonce( $_REQUEST['nonce'], 'pt_like_it_nonce' ) || ! isset( $_REQUEST['nonce'] ) ) {
        exit( "No naughty business please" );
    }

    $likes = get_post_meta( $_REQUEST['post_id'], '_pt_likes', true );
    $likes = ( empty( $likes ) ) ? 0 : $likes;
    $new_likes = $likes + 1;

    update_post_meta( $_REQUEST['post_id'], '_pt_likes', $new_likes );

    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
        echo wp_kses_post($new_likes);
        die();
    }
    else {
        wp_redirect( get_permalink( $_REQUEST['post_id'] ) );
        exit();
    }
}
//add_filter( 'the_content', 'like_it_button_html', 99 );

function like_it_button_html( $content ) {
    global $post;
    $like_text = '';
    if ( is_single() ) {
        $nonce = wp_create_nonce( 'pt_like_it_nonce' );
        $link = admin_url('admin-ajax.php?action=pt_like_it&post_id='.$post->ID.'&nonce='.$nonce);
        $likes = get_post_meta( get_the_ID(), '_pt_likes', true );
        $likes = ( empty( $likes ) ) ? 0 : $likes;
        $like_text = '
                    <div class="pt-like-it">
                        <a class="like-button" href="'.$link.'" data-id="' . get_the_ID() . '" data-nonce="' . $nonce . '"><i class="far fa-heart"></i> <span id="like-count-'.get_the_ID().'" class="like-count">' . $likes . '</span> ' .
            __( 'Likes', 'landzai' ) .
            '</a>
                    </div>';
    }
    return $content . $like_text;
}

function display_read_time() {
    global $post;
    $content = get_post_field( 'post_content', $post->ID );
    $count_words = str_word_count( strip_tags( $content ) );

    $read_time = ceil($count_words / 250);

    return $read_time;
}