<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header();

$opt_404_page = landzai_theme_option('error_tmpl');
if ($opt_404_page){
    echo do_shortcode('[INSERT_ELEMENTOR id="' . $opt_404_page . '"]');
}else {
?>

    <div id="primary" class="container">
        <main id="main" class="fw-row">

            <section class="error-404 not-found">
                <header>
                    <h1><?php esc_html_e('Sorry the page you are looking does not exist', 'landzai'); ?></h1>
                </header><!-- .page-header -->

                <div class="blog-sidebar">
                    <div class="widget_search">
                        <?php the_widget('WP_Widget_Search'); ?>
                    </div>
                </div><!-- .page-content -->
            </section><!-- .error-404 -->

        </main><!-- #main -->
    </div><!-- #primary -->

    <?php }
    get_footer();