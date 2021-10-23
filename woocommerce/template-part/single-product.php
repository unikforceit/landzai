<?php
global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
$gallery = 'gallery';
$thumbnail = 'thumbnail';
$attachments = $product->get_gallery_image_ids();
$options = $attachments ? $gallery : $thumbnail;
?>
<div <?php wc_product_class('row', $product); ?>>
   <?php get_template_part('woocommerce/template-part/product-single', $options)?>
    <div class="col-lg-6 col-md-6">
        <div class="product-info">
            <h2 class="product-title"><?php the_title(); ?></h2>
            <div class="price-box">
                <div class="price-sale">
                    <?php woocommerce_template_single_price(); ?>
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
                <span class="rating-point">4.9 (50)</span>
            </div>
            <div class="product-description">
                <h3>Product Description</h3>
                <p><?php echo wp_kses_data($product->get_short_description()); ?></p>
            </div>
            <?php woocommerce_template_single_meta();?>
            <div class="product-size-area">
                <label>Size</label>
                <ul class="size-list">
                    <li class="active"><a href="#">S</a></li>
                    <li><a href="#">M</a></li>
                    <li><a href="#">L</a></li>
                    <li><a href="#">XL</a></li>
                    <li><a href="#">XXL</a></li>
                </ul>
            </div>
            <div class="product-color-area">
                <label>Color</label>
                <ul class="color-list">
                    <li><a href="#" style="background:#000000;"></a></li>
                    <li><a href="#" style="background:#2896F7;"></a></li>
                    <li class="active"><a href="#" style="background:#FF6C5A;"></a></li>
                    <li><a href="#" style="background:#0FBE7B;"></a></li>
                </ul>
            </div>
            <div class="quantity-box">
                <label>Quantity</label>
                <div class="quickview-cart-wrap d-flex align-items-center ">
                    <div class="quickview-quality">
                        <div class="cart-plus-minus">
                            <div class="dec qtybutton btn">-</div>
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                            <div class="inc qtybutton btn">+</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-cart-whishlist">
                <a href="<?php echo $product->add_to_cart_url() ?>" value="<?php echo esc_attr($product->get_id()); ?>"
                   class="ajax_add_to_cart add_to_cart_button add-cart-btn"
                   data-product_id="<?php echo get_the_ID(); ?>"
                   data-product_sku="<?php echo esc_attr($product->get_sku()) ?>"
                   aria-label="Add “<?php the_title_attribute() ?>” to your cart"> Add to Cart </a>
                <?php echo do_shortcode('[yith_wcwl_add_to_wishlist browse_wishlist_text="Wishlist" already_in_wishslist_text=" " label=" " icon="fas fa-heart" link_classes="favourite"]') ?>
            </div>
        </div>
    </div>
</div>