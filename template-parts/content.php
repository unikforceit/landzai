<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>
<div id="post-<?php the_ID(); ?>" <?php post_class('col-lg-6 col-md-6'); ?>>
    <div class="single-blog">
        <?php if ( has_post_thumbnail()) : ?>
            <div class="blog-img">
                <a href="<?php echo esc_url( get_permalink() )?>"><?php the_post_thumbnail('full'); ?></a>
            </div>
        <?php endif; ?>
        <div class="blog-info">
            <h3 class="blog-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            <ul class="blog-meta">
                <li><a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('j'))?>"><i class="far fa-calendar"></i> <?php the_time('j F, Y');?></a></li>
                <li><a href="#"><i class="far fa-clock"></i> <?php echo display_read_time();?> Min To Read</a></li>
            </ul>
            <div class="blog-cotent"><?php the_excerpt();?></div>
            <a href="<?php the_permalink();?>" class="blog-btn"><?php echo __('Read More', 'landzai')?></a>
        </div>
    </div>
</div>