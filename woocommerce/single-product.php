<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
get_header();
?>
    <!-- single product page area start here  -->
    <section class="single-product-page section">
        <div class="container">
                <?php if (have_posts()) :

                    /* Start the Loop */
                    while (have_posts()) : the_post();

                        get_template_part('woocommerce/template-part/single', 'product');

                    endwhile;
                else :

                    get_template_part('woocommerce/template-part/single', 'none');

                endif; ?>
        </div>
    </section>
    <!-- single product page area end here  -->
    <!-- Related Products area start here  -->
    <section class="related-product-area section-top pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-title-five mb-45 text-center ">
                        <h2 class="title">Related Products</h2>
                        <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet,, lacus non
                            massa id amet tincidunt. Lacus ut integer blandit diam.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'         => 'outofstock',
                            'operator'      => 'NOT IN',
                        ),
                    ),
                );
                $loop = new WP_Query( $args );
                if ($loop->have_posts()) :

                    /* Start the Loop */
                    while ($loop->have_posts()) : $loop->the_post();

                        get_template_part('woocommerce/template-part/related', 'product');

                    endwhile;
                else :

                    get_template_part('woocommerce/template-part/single', 'none');

                endif; ?>
            </div>
        </div>
    </section>
    <!-- Related Products area end here  -->
<?php get_footer(); ?>