<?php
function landzai_product_pagination()
{

    if (is_singular())
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);

    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<nav class="product-pagination">
                            <ul class="pagination-area">' . "\n";

    /** Previous Post Link */
    if (get_previous_posts_link())
        printf('<li>%s</li>' . "\n", get_previous_posts_link('<i class="fas fa-angle-left"></i>'));

    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links))
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array)$links as $link) {
        $class = $paged == $link ? ' class="current"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="current"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** Next Post Link */
    if (get_next_posts_link())
        printf('<li>%s</li>' . "\n", get_next_posts_link('<i class="fas fa-angle-right"></i>'));

    echo '</ul></nav>' . "\n";

}

/**
 * Sale price
 */
function landzai_sale_price()
{
    $currency = get_woocommerce_currency_symbol();
    $price = get_post_meta(get_the_ID(), '_sale_price', true);
    return $currency . $price;
}

/**
 * Regular price
 */
function landzai_reg_price()
{
    $currency = get_woocommerce_currency_symbol();
    $price = get_post_meta(get_the_ID(), '_regular_price', true);
    return $currency . $price;
}

add_filter('woocommerce_get_script_data', 'change_js_view_cart_button', 10, 2);
function change_js_view_cart_button($params, $handle)
{
    if ('wc-add-to-cart' !== $handle) return $params;

    // Changing "view_cart" button text and URL
    $params['i18n_view_cart'] = esc_attr__("Checkout", "landzai"); // Text
    $params['cart_url'] = esc_url(wc_get_checkout_url()); // URL

    return $params;
}