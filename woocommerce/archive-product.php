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
?>
    <!-- shope-page-area start here  -->
    <section class="shope-page-area section">
        <div class="container">
            <div class="shope-toolbar">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="shope-toolbar-lsft d-flex align-items-center">
                            <div class="shope-search">
                                <?php echo do_shortcode('[yith_woocommerce_ajax_search]');?>
                            </div>
                            <div class="shop-result-count">
                                <p>Showing 1–12 of 100 results</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="shope-toolbar-right d-flex ">
                            <div class="product-view-mode">
                                <a class="view-btn grid active" href="shop-grid.html"><i class="fas fa-th"></i></a>
                                <a class="view-btn list" href="shop-list.html"><i class="fas fa-list"></i></a>
                            </div>
                            <div class="shop-filter">
                                <ul class="filter-list">
                                    <li class="filter-button">
                                        <a href="#">Filter <i class="fas fa-filter"></i></a>
                                        <ul class="sub-filter-list">
                                            <li><a href="#">Sort by Latest</a></li>
                                            <li><a href="#">Sort by Popularity</a></li>
                                            <li><a href="#">Sort by Rating</a></li>
                                            <li><a href="#">Sort by Featured</a></li>
                                            <li><a href="#">Price: Low to high</a></li>
                                            <li><a href="#">Price: High to low</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-list">
                <div class="row">
                    <?php if (have_posts()) :

                        /* Start the Loop */
                        while (have_posts()) : the_post();

                            get_template_part('woocommerce/template-part/product', 'loop');

                        endwhile;
                    else :

                        get_template_part('woocommerce/template-part/product', 'none');

                    endif; ?>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php landzai_product_pagination();?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shope-page-area start here  -->
<?php get_footer(); ?>