<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
get_header();
if ( is_active_sidebar( 'sidebar-2' ) ) {
    $main = 'col-lg-8';
    $sidebar = 'col-lg-4';
} else {
    $main = 'col-lg-12';
    $sidebar = 'col-lg-12';
}
 ?>
    <!-- Service Details -->
    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="<?php echo esc_attr($main);?>">
                    <?php if ( have_posts() ) :

                        /* Start the Loop */
                        while ( have_posts() ) : the_post();

                            the_content();

                        endwhile;

                    endif; ?>
                </div>
                <div class="<?php echo esc_attr($sidebar);?>">
                    <?php get_template_part( 'layouts/sidebar', 'right' ); ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer();