<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
get_header();
?>
    <!-- blog area five start here  -->
    <section class="single-blog-page section">
        <div class="container">
                    <?php if ( have_posts() ) :

                        /* Start the Loop */
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/singlecontent');

                        endwhile;
                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif; ?>

        </div>
    </section>

<?php get_footer();?>