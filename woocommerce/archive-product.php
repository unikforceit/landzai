<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

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
                                <form>
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" id="search" name="search"
                                               placeholder="Search"/>
                                        <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
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
                            <?php echo do_shortcode('[woocommerce_product_filter]');?>
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
                    <?php
                    if (woocommerce_product_loop()) {

                        woocommerce_product_loop_start();

                        if ( wc_get_loop_prop( 'total' ) ) {
                            while ( have_posts() ) {
                                the_post();

                                /**
                                 * Hook: woocommerce_shop_loop.
                                 */
                                do_action( 'woocommerce_shop_loop' );

                                wc_get_template_part( 'content', 'product' );
                            }
                        }

                        woocommerce_product_loop_end();

                    } else {

                        esc_attr_e('Not Found', 'landzai');
                    } ?>
                <div class="row">
                    <div class="col-lg-12">
                        <?php landzai_product_pagination();?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shope-page-area start here  -->
<?php
get_footer();