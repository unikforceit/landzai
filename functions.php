<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

if ( ! function_exists( 'landzai_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function landzai_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change 'landzai' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'landzai', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
 
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo');
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'landzai' ),
		) );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style'
		) );
        // Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'landzai_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );


        add_theme_support( 'woocommerce');
	}
endif;
add_action( 'after_setup_theme', 'landzai_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function landzai_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'landzai_content_width', 640 );
}
add_action( 'after_setup_theme', 'landzai_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function landzai_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'landzai' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'landzai' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'landzai' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'landzai' ),
		'before_widget' => '<div class="col-lg-2 col-md-6 col-sm-6"><div id="%1$s" class="single-widget %2$s">',
		'after_widget'  => '</div></div>',
		'before_title'  => ' <h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'landzai_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function landzai_scripts() {

	wp_enqueue_style('landzai-Rubik',  'https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap');
	wp_enqueue_style('landzai-Lato',  'https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap');
	wp_enqueue_style('landzai-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('landzai-flaticon', get_template_directory_uri() . '/assets/css/flaticon.css');
	wp_enqueue_style('landzai-library', get_template_directory_uri() . '/assets/css/library.css');
    wp_enqueue_style('landzai-main', get_template_directory_uri() . '/assets/css/landzai.css');
    wp_enqueue_style('landzai-responsive', get_template_directory_uri() . '/assets/css/responsive.css');
    wp_enqueue_style('landzai-default', get_template_directory_uri() . '/assets/css/default.css');
    wp_enqueue_style('landzai-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' ); 
	}
	wp_enqueue_script('landzai-bootstrap',get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), landzai_theme_version(), true);
	wp_enqueue_script('landzai-main',get_template_directory_uri() . '/assets/js/main.js', array('jquery'), landzai_theme_version(), true);
	wp_enqueue_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'landzai_scripts');

function landzai_admin_css() {
    wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/assets/css/admin.css' );
}
add_action( 'admin_enqueue_scripts', 'landzai_admin_css' );

function landzai_theme_version(){
    $landzaitheme = wp_get_theme();
    $landzai_version = esc_html($landzaitheme->get( 'Version' ));
    return $landzai_version;
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
/**
 * Functions which loaded from plugin.
 */
require get_template_directory() . '/inc/plug-dependent.php';

/**
 * Load plugin recommendation.
 */
 
require_once get_template_directory() . '/inc/plugin-recommendations.php';

