<?php
$arg = [
    'cat' => '<span class="niotitle">' . esc_html__('Category', 'landzai') . '</span>',
    'tag' => '<span  class="niotitle">' . esc_html__('Tag', 'landzai') . '</span>',
    'author' => '<span  class="niotitle">' . esc_html__('Author', 'landzai') . '</span>',
    'year' => '<span  class="niotitle">' . esc_html__('Year', 'landzai') . '</span>',
    'notfound' => '<span  class="niotitle">' . esc_html__('Not found', 'landzai') . '</span>',
    'search' => '<span  class="niotitle">' . esc_html__('Search for', 'landzai') . '</span>',
    'marchive' => '<span  class="niotitle">' . esc_html__('Monthly archive', 'landzai') . '</span>',
    'yarchive' => '<span  class="niotitle">' . esc_html__('Yearly archive', 'landzai') . '</span>',
];

if (is_home() && get_option('page_for_posts')) {
    $title = 'Blog';
} elseif (is_front_page()) {
    $title = 'Front Page';
} else {
    $title = get_the_title();
}
?>
<!-- header area start here  -->
<header class="header-v5 transparent-header header-md-none" id="sticky">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="brand-area text-left">
                    <?php landzai_logo(); ?>
                </div>
            </div>
            <div class="col-lg-10">
                <nav class="main-menu">
                    <?php
                    wp_nav_menu(array(
                        'container' => false,
                        'menu_id' => 'main-nav',
                        'theme_location' => 'primary',
                        'fallback_cb' => 'landzai_no_main_nav',
                        'items_wrap' => '<ul>%3$s</ul>',
                    ));
                    ?>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- header area end here  -->
<!-- mobile menu are start here  -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-6">
                <div class="logo-area">
                    <?php landzai_logo(); ?>
                </div>
            </div>
            <div class="col-6">
                <div class="menu-bar text-right">
                    <span class="fas fa-bars"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu">
        <nav>
            <?php
            wp_nav_menu(array(
                    'container' => false,
                    'menu_id' => 'm-main-nav',
                    'theme_location' => 'primary',
                    'fallback_cb' => 'landzai_no_main_nav',
                    'items_wrap' => '<ul>%3$s</ul>',
                )
            );
            ?>
        </nav>
    </div>
</div>
<div class="menu-overlay"></div>
<!-- mobile menu are end here  -->
<!-- breadcrumb ara start here  -->
<section class="breadcrumb-area"
         data-background="<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-wrap text-center">
                    <h2 class="page-title"><?php echo esc_html($title); ?></h2>
                    <?php landzai_unit_breadcumb(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb ara end here  -->