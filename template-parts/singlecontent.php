<article id="post-<?php the_ID(); ?>" <?php post_class('landzai-blog-post-details'); ?>>
    <div class="single-post">
        <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail-image">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>
        <ul class="post-meta">
            <li><a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('j'))?>"><i class="far fa-calendar"></i> <?php the_time('j F, Y');?></a></li>
            <li><a href="#"><i class="far fa-clock"></i><?php echo display_read_time();?> <?php echo __('Min To Read', 'landzai')?></a></li>
            <li><a href="#comment"><i class="far fa-comment"></i><?php echo get_comments_number();?> <?php echo __('Comments', 'landzai')?></a></li>
            <li><?php echo like_it_button_html('');?></li>
        </ul>
        <h2 class="post-title"><?php the_title() ?></h2>
        <div class="single-blog-description">
            <?php the_content(); ?>
        </div>
        <div class="post-bottom">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <?php landzai_post_tag(); ?>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <?php landzai_post_share(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="post-pagination">
        <?php landzai_navigation(); ?>
    </div>
    <div class="comment-area">
        <?php
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        ?>
    </div>