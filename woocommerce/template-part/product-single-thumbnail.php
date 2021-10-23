<?php
global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
$attachment_ids = $product->get_image_id();

?>
<div class="col-lg-6 col-md-6">
    <div class="product-slier-big-image">
        <div class="product-priview-slide">
            <a href="<?php echo wp_get_attachment_image_url($attachment_ids);?>" class="product-image" data-fancybox="gallery">
                <?php echo woocommerce_get_product_thumbnail('woocommerce_full_size'); ?>
            </a>
        </div>
    </div>
</div>
