<!doctype html>
<html class="no-js" lang="ja">
<?php get_template_part('head'); ?>

<body id="new">
    <?php get_header(); ?>
    <!-- .content -->
    <main class="content">
        <div class="cols ptb50 sm-ptb30 z2">
            <div class="col-12">
                <!-- .contentTtl -->
                <div class="contentTtl"><span class="d-ib js-scroll">NEWS</span></div>
            </div>
        </div>
        <div class="cols">
            <div class="col-12">
                <div class="cols nega gutter-50 gutter-sm-30">
                    <!-- .mainbar -->
                    <div class="mainbar col-8 col-sm-12">
                        <div class="catCard js-scroll" style="background-image: url(<?php echo home_url(); ?>/img/common/catCard8.jpg);">お知らせ</div>
                        <?php $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 30,
                            'paged' => $paged,
                            'taxonomy' => '',
                        ); ?>
                        <?php query_posts($args); ?>
                        <!-- .feedNews -->
                        <div class="feedNews cols nega gutter-30 gutter-sm-20 pt50 sm-pt30">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                    <article class="col-12 col-sm-6">
                                        <a href="<?php the_permalink(); ?>" class="feedNews-item hov">
                                            <figure class="feedNews-thumb js-scroll">
                                                <?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'size560720'); ?>
                                                <img class="img-rspsv-full" src="<?php echo $imgset[0]; ?>" width="282" height="202" alt="サムネイル">
                                            </figure>
                                            <div class="feedNews-info">
                                                <div class="feedNews-subInfo">
                                                    <?php $categorys = get_the_category();
                                                    foreach ($categorys as $category) { ?>
                                                        <span class="feedNews-category js-scroll"><?php echo $category->name; ?></span>
                                                    <?php } ?>
                                                    <span class="feedNews-date js-scroll"><?php the_time("Y" . ".m" . ".d"); ?></span>
                                                </div>
                                                <h3 class="feedNews-ttl js-scroll"><?php the_title(); ?></h3>
                                            </div>
                                        </a>
                                    </article>
                                <?php endwhile; ?>
                            <?php else : ?>
                            <?php endif; ?>
                        </div>
                        <div class="mt60 sm-mt30">
                            <?php if (function_exists('pagination') && $wp_query->max_num_pages > 1) { ?>
                                <?php pagination($additional_loop->max_num_pages); ?>
                            <?php } ?>
                        </div>
                        <?php wp_reset_query(); ?>
                    </div>
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </main>
    <?php get_footer(); ?>
</body>

</html>