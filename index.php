<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
get_header();
if (is_active_sidebar('sidebar-1')) {
    $main = 'col-lg-8';
    $sidebar = 'col-lg-4';
} else {
    $main = 'col-lg-12';
    $sidebar = 'col-lg-12';
}
?>
<!--- Blog Content --->
<section class="blog-area-five section">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($main); ?>">
                <div class="row">
                    <?php if (have_posts()) :

                        /* Start the Loop */
                        while (have_posts()) : the_post();

                            get_template_part('template-parts/content');

                        endwhile;
                    else :

                        get_template_part('template-parts/content', 'none');

                    endif; ?>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php landzai_pagination(); ?>
                    </div>
                </div>
            </div>
            <div class="<?php echo esc_attr($sidebar); ?>">
                <?php get_template_part('layouts/sidebar', 'right'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
