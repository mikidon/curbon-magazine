<!doctype html>
<html class="no-js" lang="ja">
<?php get_template_part('head'); ?>

<body id="ranking">
    <?php get_header(); ?>
    <!-- .content -->
    <main class="content">
        <div class="cols ptb50 sm-ptb30 z2 js-scroll">
            <div class="col-12">
                <!-- .contentTtl -->
                <div class="contentTtl">RANKING</div>
            </div>
        </div>
        <div class="cols js-scroll">
            <div class="col-12">
                <div class="cols nega gutter-50 gutter-sm-30">
                    <!-- .mainbar -->
                    <div class="mainbar col-8 col-sm-12">
                        <div class="catCard" style="background: url(<?php echo home_url(); ?>/img/common/catCard6.jpg);">いま人気の記事・おすすめの記事</div>
                        <!-- .feedRanking -->
                        <div class="feedRanking cols nega gutter-60 gutter-md-30 gutter-sm-20 pt60">
                            <?php $args = array(
                                'post_type' => 'page',
                                'pagename' => 'ranking',
                                'posts_per_page' => 1,
                            ); ?>
                            <?php $loop = new WP_Query($args); ?>
                            <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                                    <?php $rows = get_field('ranking'); ?>
                                    <?php foreach ($rows as $row) { ?>
                                        <?php $args2 = array(
                                            'post_type' => 'magazines',
                                            'posts_per_page' => 1,
                                            'post__in' => array($row['post']),
                                        ); ?>
                                        <?php $loop = new WP_Query($args2); ?>
                                        <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                                                <article class="col-6">
                                                    <a href="#" class="feedRanking-item hov">
                                                        <figure class="feedRanking-thumb">
                                                            <?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'size560400'); ?>
                                                            <img class="img-rspsv-full" src="<?php echo $imgset[0]; ?>" width="282" height="202" alt="サムネイル">
                                                        </figure>
                                                        <div class="feedRanking-subInfo">
                                                            <?php $categorys = get_the_terms($post->ID, 'magazines-cat');
                                                            foreach ($categorys as $category) { ?>
                                                                <span class="feedRanking-category"><?php echo $category->name; ?></span>
                                                            <?php } ?>
                                                            <span class="feedRanking-date"><?php the_time("Y" . ".m" . ".d"); ?></span>
                                                        </div>
                                                        <h2 class="feedRanking-ttl js-matchHeight"><?php the_title(); ?></h2>
                                                        <p class="feedRanking-text"><?php $inText = get_the_excerpt();
                                                                                    if (mb_strlen($inText) > 60) { ?><?php echo mb_substr($inText, 0, 60); ?>...<?php } else {
                                                                                                                                                                echo $inText;
                                                                                                                                                            } ?></p>
                                                    </a>
                                                </article>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                        <?php endif; ?>
                                        <?php wp_reset_postdata(); ?>
                                    <?php } ?>
                                <?php endwhile; ?>
                            <?php else : ?>
                            <?php endif; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                        <?php if (function_exists('pagination') && $wp_query->max_num_pages > 1) { ?>
                            <div class="mt60 sm-mt30">
                                <!-- .feedPagenation -->
                                <?php pagination($additional_loop->max_num_pages); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </main>
    <?php get_footer(); ?>
</body>

</html>