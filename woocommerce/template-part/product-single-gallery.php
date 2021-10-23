<?php
global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
$attachment_ids = $product->get_gallery_image_ids();
?>
<div class="col-lg-6 col-md-6">
    <div class="product-slier-big-image">
        <div class="product-priview-slide product-gallery-slider">
            <?php foreach( $attachment_ids as $attachment_id ) {
                ?>
                <a href="<?php echo wp_get_attachment_image_url($attachment_id);?>" data-fancybox="gallery">
                    <img class="product-image" src="<?php echo wp_get_attachment_image_url($attachment_id);?>" alt="image-<?php echo esc_attr($attachment_id);?>"/>
                </a>
            <?php }?>
        </div>
    </div>
    <div class="product-thumbnail-image">
        <ul class="product-thumb-silide">
            <?php  foreach($attachment_ids as $attachment_id) {
                ?>
                <li>
                    <img src="<?php echo wp_get_attachment_image_url($attachment_id);?>" alt="cart<?php echo esc_attr($attachment_id);?>"/>
                </li>
            <?php }?>
        </ul>
    </div>
</div>
