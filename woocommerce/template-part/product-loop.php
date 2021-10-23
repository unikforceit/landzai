<?php
global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>
<div <?php wc_product_class( 'col-lg-4 col-md-6 col-sm-6', $product ); ?>>
    <div class="single-grid-product">
        <div class="product-thumbnail">
            <?php echo woocommerce_get_product_thumbnail('woocommerce_full_size');?>
            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist browse_wishlist_text="Wishlist" already_in_wishslist_text=" " label=" " icon="fas fa-heart" link_classes="wishList"]')?>
            <div class="overlay-content">
                <a href="<?php echo $product->add_to_cart_url() ?>" value="<?php echo esc_attr( $product->get_id() ); ?>" class="ajax_add_to_cart add_to_cart_button cart-btn" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="<?php echo esc_attr($product->get_sku()) ?>" aria-label="Add “<?php the_title_attribute() ?>” to your cart"> Add to Cart </a>
            </div>
        </div>
        <div class="product-bottom">
            <div class="product-info">
                <h3 class="product-name"><a href="<?php echo esc_url($product->get_permalink());?>"><?php the_title();?></a></h3>
                <div class="price-box">
                    <div class="price-sale">
                        <?php woocommerce_template_single_price();?>
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
