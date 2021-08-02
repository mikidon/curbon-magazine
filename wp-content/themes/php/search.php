<!doctype html>
<html class="no-js" lang="ja">
<?php get_template_part('head'); ?>

<body id="search">
    <?php get_header(); ?>
    <!-- .content -->
    <main class="content">
        <div class="cols ptb50 sm-ptb30 z2">
            <div class="col-12">
                <!-- .contentTtl -->
                <div class="contentTtl"><span class="d-ib js-scroll">「<?php the_search_query(); ?>」の検索結果</span></div>
            </div>
        </div>
        <div class="cols">
            <div class="col-12">
                <div class="cols nega gutter-50 gutter-sm-30">
                    <!-- .mainbar -->
                    <div class="mainbar col-8 col-sm-12">
                        <?php if (have_posts()) : ?>
                            <!-- .feedBasic -->
                            <div class="feedBasic cols nega gutter-60 gutter-md-30 gutter-sm-20">
                                <?php while (have_posts()) : the_post(); ?>
                                    <article class="col-6">
                                        <a href="<?php the_permalink(); ?>" class="feedBasic-item hov">
                                            <figure class="feedBasic-thumb js-scroll">
                                                <?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'size560720'); ?>
                                                <img class="img-rspsv-full" src="<?php echo $imgset[0]; ?>" width="280" height="200" alt="サムネイル">
                                            </figure>
                                            <div class="feedBasic-subInfo">
                                                <?php if ($post->post_type == 'specials') { ?>
                                                    <!-- 特集カテゴリ -->
                                                    <span class="feedBasic-category js-scroll">特集</span>
                                                <?php } elseif ($post->post_type == 'magazines') { ?>
                                                    <!-- マガジンカテゴリ -->
                                                    <?php $categorys = get_the_terms($post->ID, 'magazines-cat');
                                                    foreach ($categorys as $category) { ?>
                                                        <span class="feedBasic-category js-scroll"><?php echo $category->name; ?></span>
                                                    <?php } ?>
                                                <?php } elseif ($post->post_type == 'reviews') { ?>
                                                    <!-- 機材レビューカテゴリ -->
                                                    <span class="feedBasic-category js-scroll">Review</span>
                                                <?php } elseif ($post->post_type == 'post') { ?>
                                                    <!-- お知らせカテゴリ -->
                                                    <span class="feedBasic-category js-scroll">News</span>
                                                <?php } ?>
                                                <span class="feedBasic-date js-scroll"><?php the_time("Y" . ".m" . ".d"); ?></span>
                                            </div>
                                            <h2 class="feedBasic-ttl js-matchHeight js-scroll"><?php the_title(); ?></h2>
                                            <p class="feedBasic-text js-scroll"><?php $inText = get_the_excerpt();
                                                                                if (mb_strlen($inText) > 60) { ?><?php echo mb_substr($inText, 0, 60); ?>...<?php } else {
                                                                                                                                                            echo $inText;
                                                                                                                                                        } ?></p>
                                        </a>
                                    </article>
                                <?php endwhile; ?>
                            </div>
                        <?php else : ?>
                            <div class="col-12 ta-c">
                                <p class="fw-b js-scroll">検索結果にヒットしませんでした。</p>
                                <div class="mt60 sm-mt30 ta-c">
                                    <a href="<?php echo home_url(); ?>/" class="btn-round js-scroll">BACK TO TOP</a>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="mt60 sm-mt30">
                            <?php if (function_exists('pagination') && $wp_query->max_num_pages > 1) { ?>
                                <?php pagination($additional_loop->max_num_pages); ?>
                            <?php } ?>
                        </div>
                    </div>
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </main>
    <?php get_footer(); ?>
</body>

</html>