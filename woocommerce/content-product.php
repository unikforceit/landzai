<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
$grid = wc_get_loop_prop('columns');
?>
<div <?php wc_product_class("col-lg-$grid col-md-6 col-sm-6", $product); ?>>
    <div class="single-grid-product">
        <div class="product-thumbnail">
            <?php the_post_thumbnail('full');?>
            <a class="wishList" href="#"><i class="fas fa-heart"></i></a>
            <div class="overlay-content">
                <?php woocommerce_template_loop_add_to_cart(['class'=> 'cart-btn']); ?>
            </div>
        </div>
        <div class="product-bottom">
            <div class="product-info">
                <h3 class="product-name"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                <div class="price-box">
                    <div class="price-sale">
                        <span class="special-price"><?php esc_html_e(landzai_price_currency().landzai_sale_price(), 'landzai');?></span>
                        <span class="old-price"><?php esc_html_e(landzai_price_currency().landzai_reg_price(), 'landzai');?></span>
                    </div>
                </div>
            </div>
            <div class="product-rating-area">
                <ul class="product-rating">
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star-half-alt"></i></li>
                </ul>
                <h4 class="rating-point">4.9 (50)</h4>
            </div>
        </div>
    </div>
</div>