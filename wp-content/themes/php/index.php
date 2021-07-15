<!doctype html>
<html class="no-js" lang="ja">
<?php get_template_part('head'); ?>

<body id="top">
    <?php get_header(); ?>
    <!-- .content -->
    <main class="topContent content">
        <!-- .hero -->
        <div class="hero">
            <!-- .heroSlide -->
            <div class="heroSlide">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php $args = array(
                            'post_type' => 'page',
                            'pagename' => 'toppage-heroslide',
                            'posts_per_page' => 1,
                        ); ?>
                        <?php $loop = new WP_Query($args); ?>
                        <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                                <?php $rows = get_field('posts'); ?>
                                <?php foreach ($rows as $row) { ?>
                                    <?php $args2 = array(
                                        'post_type' => 'magazines',
                                        'posts_per_page' => 1,
                                        'post__in' => array($row['post']),
                                    ); ?>
                                    <?php $loop = new WP_Query($args2); ?>
                                    <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                                            <article class="swiper-slide js-scroll">
                                                <div class="heroSlide-wrap hov">
                                                    <?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'size700650'); ?>
                                                    <a href="<?php the_permalink(); ?>" class="heroSlide-item" style="background-image: url(<?php echo $imgset[0]; ?>);">
                                                        <div class="heroSlide-item-info">
                                                            <?php $categorys = get_the_terms($post->ID, 'magazines-cat');
                                                            foreach ($categorys as $category) { ?>
                                                                <span class="heroSlide-item-category"><?php echo $category->name; ?></span>
                                                            <?php } ?>
                                                            <h2 class="heroSlide-item-ttl"><span><?php the_title(); ?></span></h2>
                                                            <span class="heroSlide-item-btn">Read more</span>
                                                        </div>
                                                    </a>
                                                </div>
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
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <div class="cols jc-c pt70 md-pt60">
            <div class="col-11 col-sm-12">
                <?php $args = array(
                    'post_type' => 'specials',
                    'posts_per_page' => 1,
                ); ?>
                <?php $loop = new WP_Query($args); ?>
                <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                        <article class="js-scroll">
                            <!-- .specialBnr -->
                            <a href="<?php the_permalink(); ?>" class="specialBnr hov">
                                <div class="specialBnr-inner">
                                    <span class="specialBnr-label">SPECIAL CONTENTS</span>
                                    <div class="specialBnr-info">
                                        <h2 class="specialBnr-ttl"><?php the_title(); ?></h2>
                                        <p class="specialBnr-caption"><?php the_field('caption'); ?></p>
                                        <p class="specialBnr-read sm-d-n"><?php the_field('read_sub'); ?></p>
                                    </div>
                                    <span class="specialBnr-btn">Read more</span>
                                    <?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'size1160450'); ?>
                                    <img class="specialBnr-thumb" src="<?php echo $imgset[0]; ?>" width="1160" height="450" alt="サムネイル">
                                </div>
                            </a>
                            <p class="specialBnr-read d-n sm-d-b"><?php the_field('read_sub'); ?></p>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
        <div class="cols cols-wide pt120 md-pt100 sm-pt80">
            <div class="col-12">
                <!-- .tabContents -->
                <div class="tabContents">
                    <ul class="tabContents-nav">
                        <li>
                            <a href="javascript:void(0)" class="tabContents-nav-item hov"><span class="tabContents-nav-item-btn js-tabContents-trg js-scroll active" data-type="all">All</span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="tabContents-nav-item hov"><span class="tabContents-nav-item-btn js-tabContents-trg js-scroll" data-type="study">Learn</span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="tabContents-nav-item hov"><span class="tabContents-nav-item-btn js-tabContents-trg js-scroll" data-type="job">Work</span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="tabContents-nav-item hov"><span class="tabContents-nav-item-btn js-tabContents-trg js-scroll" data-type="shop">Shop</span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="tabContents-nav-item hov"><span class="tabContents-nav-item-btn js-tabContents-trg js-scroll" data-type="read">Gallery</span></a>
                        </li>
                    </ul>
                    <div class="tabContents-main js-scroll">
                        <!-- .data-type="all" -->
                        <div class="js-tabContents" data-type="all">
                            <div class="cols">
                                <div class="col-12">
                                    <!-- .feedBasic -->
                                    <div class="feedBasic cols nega gutter-60 gutter-md-30 gutter-sm-20">
                                        <?php $args = array(
                                            'post_type' => 'magazines',
                                            'posts_per_page' => 9,
                                        ); ?>
                                        <?php $loop = new WP_Query($args); ?>
                                        <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                                                <article class="col-4 col-md-6">
                                                    <a href="<?php the_permalink(); ?>" class="feedBasic-item hov">
                                                        <figure class="feedBasic-thumb js-scroll">
                                                            <?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'size560400'); ?>
                                                            <img class="img-rspsv-full" src="<?php echo $imgset[0]; ?>" width="280" height="200" alt="サムネイル">
                                                        </figure>
                                                        <div class="feedBasic-subInfo">
                                                            <?php $categorys = get_the_terms($post->ID, 'magazines-cat');
                                                            foreach ($categorys as $category) { ?>
                                                                <span class="feedBasic-category js-scroll"><?php echo $category->name; ?></span>
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
                                        <?php else : ?>
                                        <?php endif; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .data-type="study" -->
                        <div class="js-tabContents" data-type="study" style="display: none;">
                            <div class="cols">
                                <div class="col-12">
                                    <!-- .feedBasic -->
                                    <div class="feedBasic cols nega gutter-60 gutter-md-30 gutter-sm-20">
                                        <?php $args = array(
                                            'post_type' => 'magazines',
                                            'posts_per_page' => 9,
                                            'taxonomy' => 'magazines-cat',
                                            'term' => 'study',
                                        ); ?>
                                        <?php $loop = new WP_Query($args); ?>
                                        <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                                                <article class="col-4 col-md-6">
                                                    <a href="<?php the_permalink(); ?>" class="feedBasic-item hov">
                                                        <figure class="feedBasic-thumb js-scroll">
                                                            <?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'size560400'); ?>
                                                            <img class="img-rspsv-full" src="<?php echo $imgset[0]; ?>" width="280" height="200" alt="サムネイル">
                                                        </figure>
                                                        <div class="feedBasic-subInfo">
                                                            <?php $categorys = get_the_terms($post->ID, 'magazines-cat');
                                                            foreach ($categorys as $category) { ?>
                                                                <span class="feedBasic-category js-scroll"><?php echo $category->name; ?></span>
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
                                        <?php else : ?>
                                        <?php endif; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .data-type="job" -->
                        <div class="js-tabContents" data-type="job" style="display: none;">
                            <div class="cols">
                                <div class="col-12">
                                    <!-- .feedBasic -->
                                    <div class="feedBasic cols nega gutter-60 gutter-md-30 gutter-sm-20">
                                        <?php $args = array(
                                            'post_type' => 'magazines',
                                            'posts_per_page' => 9,
                                            'taxonomy' => 'magazines-cat',
                                            'term' => 'job',
                                        ); ?>
                                        <?php $loop = new WP_Query($args); ?>
                                        <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                                                <article class="col-4 col-md-6">
                                                    <a href="<?php the_permalink(); ?>" class="feedBasic-item hov">
                                                        <figure class="feedBasic-thumb js-scroll">
                                                            <?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'size560400'); ?>
                                                            <img class="img-rspsv-full" src="<?php echo $imgset[0]; ?>" width="280" height="200" alt="サムネイル">
                                                        </figure>
                                                        <div class="feedBasic-subInfo js-scroll">
                                                            <?php $categorys = get_the_terms($post->ID, 'magazines-cat');
                                                            foreach ($categorys as $category) { ?>
                                                                <span class="feedBasic-category"><?php echo $category->name; ?></span>
                                                            <?php } ?>
                                                            <span class="feedBasic-date"><?php the_time("Y" . ".m" . ".d"); ?></span>
                                                        </div>
                                                        <h2 class="feedBasic-ttl js-matchHeight js-scroll"><?php the_title(); ?></h2>
                                                        <p class="feedBasic-text js-scroll"><?php $inText = get_the_excerpt();
                                                                                            if (mb_strlen($inText) > 60) { ?><?php echo mb_substr($inText, 0, 60); ?>...<?php } else {
                                                                                                                                                                        echo $inText;
                                                                                                                                                                    } ?></p>
                                                    </a>
                                                </article>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                        <?php endif; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .data-type="shop" -->
                        <div class="js-tabContents" data-type="shop" style="display: none;">
                            <div class="cols">
                                <div class="col-12">
                                    <!-- .feedBasic -->
                                    <div class="feedBasic cols nega gutter-60 gutter-md-30 gutter-sm-20">
                                        <?php $args = array(
                                            'post_type' => 'magazines',
                                            'posts_per_page' => 9,
                                            'taxonomy' => 'magazines-cat',
                                            'term' => 'shop',
                                        ); ?>
                                        <?php $loop = new WP_Query($args); ?>
                                        <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                                                <article class="col-4 col-md-6">
                                                    <a href="<?php the_permalink(); ?>" class="feedBasic-item hov">
                                                        <figure class="feedBasic-thumb js-scroll">
                                                            <?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'size560400'); ?>
                                                            <img class="img-rspsv-full" src="<?php echo $imgset[0]; ?>" width="280" height="200" alt="サムネイル">
                                                        </figure>
                                                        <div class="feedBasic-subInfo js-scroll">
                                                            <?php $categorys = get_the_terms($post->ID, 'magazines-cat');
                                                            foreach ($categorys as $category) { ?>
                                                                <span class="feedBasic-category js-scroll"><?php echo $category->name; ?></span>
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
                                        <?php else : ?>
                                        <?php endif; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .data-type="read" -->
                        <div class="js-tabContents" data-type="read" style="display: none;">
                            <div class="cols">
                                <div class="col-12">
                                    <!-- .feedBasic -->
                                    <div class="feedBasic cols nega gutter-60 gutter-md-30 gutter-sm-20">
                                        <?php $args = array(
                                            'post_type' => 'magazines',
                                            'posts_per_page' => 9,
                                            'taxonomy' => 'magazines-cat',
                                            'term' => 'read',
                                        ); ?>
                                        <?php $loop = new WP_Query($args); ?>
                                        <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                                                <article class="col-4 col-md-6">
                                                    <a href="<?php the_permalink(); ?>" class="feedBasic-item hov">
                                                        <figure class="feedBasic-thumb js-scroll">
                                                            <?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'size560400'); ?>
                                                            <img class="img-rspsv-full" src="<?php echo $imgset[0]; ?>" width="280" height="200" alt="サムネイル">
                                                        </figure>
                                                        <div class="feedBasic-subInfo js-scroll">
                                                            <?php $categorys = get_the_terms($post->ID, 'magazines-cat');
                                                            foreach ($categorys as $category) { ?>
                                                                <span class="feedBasic-category js-scroll"><?php echo $category->name; ?></span>
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
                                        <?php else : ?>
                                        <?php endif; ?>
                                        <?php wp_reset_postdata(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt60 sm-mt30 ta-c">
                    <a href="<?php echo home_url(); ?>/magazine" class="btn-round js-scroll">MORE</a>
                </div>
            </div>
        </div>
        <!-- .ranking -->
        <section class="ranking cols-filld-full pt150 sm-pt120">
            <div class="col-4 col-sm-12">
                <div class="ranking-info">
                    <div>
                        <h2 class="ranking-ttl"><span class="d-ib js-scroll">RANKING</span></h2>
                        <div class="ranking-info-inner">
                            <p class="ranking-read js-scroll">いま人気の記事<br>
                                おすすめの記事はこちら</p>
                            <div class="ranking-btn js-scroll">
                                <a href="<?php echo home_url(); ?>/ranking" class="btn-block-black hov">ALL VIEW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 col-sm-12">
                <!-- .rankingSlide -->
                <div class="rankingSlide">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
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
                                                <article class="swiper-slide js-scroll">
                                                    <a href="<?php the_permalink(); ?>" class="rankingSlide-item hov">
                                                        <figure class="rankingSlide-thumb">
                                                            <?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'size560400'); ?>
                                                            <img class="img-rspsv-full" src="<?php echo $imgset[0]; ?>" width="320" height="350" alt="サムネイル">
                                                        </figure>
                                                        <div class="rankingSlide-info">
                                                            <h3 class="rankingSlide-ttl js-matchHeight"><?php the_title(); ?></h3>
                                                            <p class="rankingSlide-date"><?php the_time("Y" . ".m" . ".d"); ?></p>
                                                        </div>
                                                        <?php $categorys = get_the_terms($post->ID, 'magazines-cat');
                                                        foreach ($categorys as $category) { ?>
                                                            <span class="rankingSlide-category js-scroll"><?php echo $category->name; ?></span>
                                                        <?php } ?>
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
                    </div>
                    <div class="swiper-button-wrap">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </section>
        <div class="cols jc-c pt120 sm-pt60">
            <div class="col-8 col-md-10 col-sm-12">
                <!-- .search -->
                <form class="search js-scroll" action="<?php echo home_url(); ?>/" method="get">
                    <input name="s" type="search" placeholder="Search" value="<?php if (is_search()) {
                                                                                    the_search_query();
                                                                                } ?>" />
                    <input type="hidden" name="type" value="post">
                    <button type="submit"></button>
                </form>
            </div>
        </div>
        <div class="cols jc-c pt60">
            <div class="col-12 col-sm-11">
                <!-- .hotWords -->
                <div class="hotWords js-scroll">
                    <div class="hotWords-ttl">Hot word</div>
                    <ul class="hotWords-tags">
                        <?php $categories = get_terms('post-tag', 'orderby=count&hide_empty=1&order=DESC&number=20'); ?>
                        <?php if ($categories) {
                            foreach ($categories as $category) { ?>
                                <li><a href="<?php echo home_url(); ?>/?s=<?php echo $category->name; ?>&type=post" class="hotWords-tags-item hov"><?php echo $category->name; ?></a></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                    <div class="mt30 ta-r">
                        <a href="<?php echo home_url(); ?>/tag" class="btn-block-txt hov">MORE</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- .bnr -->
        <!--<div class="cols jc-c pt60 js-scroll">
            <div class="col-12">
                <div class="cols jc-c nega gutter-10 mt-10">
                    <div class="col-3 col-md-6 col-sm-10 pt10"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA1.jpg" width="232" height="92" alt=""></a></div>
                    <div class="col-3 col-md-6 col-sm-10 pt10"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA2.jpg" width="232" height="92" alt="#"></a></div>
                    <div class="col-3 col-md-6 col-sm-10 pt10"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA3.jpg" width="232" height="92" alt=""></a></div>
                    <div class="col-3 col-md-6 col-sm-10 pt10"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA4.jpg" width="232" height="92" alt=""></a></div>
                </div>
            </div>
        </div>-->
        <!-- .review -->
        <section class="review bgc-lightgray mt120 ptb80 sm-mt80 sm-ptb60">
            <div class="cols">
                <div class="col-12">
                    <div class="review-info">
                        <div class="col-12"></div>
                        <h2 class="review-ttl"><span class="d-ib js-scroll">REVIEW</span></h2>
                        <div class="review-info-inner">
                            <p class="review-read js-scroll">豊富な作例から<br class="d-n sm-d-i">運命のカメラ・レンズ・フィルムを見つけよう</p>
                            <div class="review-btn js-scroll">
                                <a href="<?php echo home_url(); ?>/review" class="btn-block-black hov">ALL VIEW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cols">
                <div class="col-12">
                    <!-- .feedReview -->
                    <div class="feedReview cols nega gutter-30 gutter-sm-20 pt60 sm-pt40">
                        <?php $args = array(
                            'post_type' => 'reviews',
                            'posts_per_page' => 8,
                        ); ?>
                        <?php $loop = new WP_Query($args); ?>
                        <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                                <article class="col-3 col-md-4 col-sm-6">
                                    <a href="<?php the_permalink(); ?>" class="feedReview-item hov">
                                        <figure class="feedReview-thumb js-scroll">
                                            <?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'size300300'); ?>
                                            <img class="img-rspsv-full" src="<?php echo $imgset[0]; ?>" width="217" height="217" alt="サムネイル">
                                            <?php $categorys = get_the_terms($post->ID, 'reviews-cat');
                                            foreach ($categorys as $category) { ?>
                                                <figcaption class="feedReview-category feedReview-category-<?php echo $category->slug; ?>"><?php echo $category->name; ?></figcaption>
                                            <?php } ?>
                                        </figure>
                                        <h3 class="feedReview-ttl js-scroll"><?php the_title(); ?></h3>
                                    </a>
                                </article>
                            <?php endwhile; ?>
                        <?php else : ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                    <div class="d-n sm-d-b pt40 ta-r">
                        <a href="<?php echo home_url(); ?>/review" class="btn-block-black hov js-scroll">ALL VIEW</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- .original -->
        <section class="original mt150 ptb100">
            <h2 class="original-ttl"><span class="d-ib js-scroll">GALLERY</span></h2>
            <div class="cols">
                <div class="col-12">
                    <p class="ta-c js-scroll">内容かたまり次第バナー・リンク設置</p>
                </div>
            </div>
        </section>
        <!-- .original -->
        <!--<section class="original mt150 ptb50 js-scroll">
            <h2 class="original-ttl">ORIGINAL CONTENTS</h2>
            <div class="cols">
                <div class="col-12">
                    <p class="fw-b ta-c">写真について学びたいひと、<br class="d-n sm-d-i">写真を仕事にしたいひとのための<br class="d-n sm-d-i">オリジナルコンテンツのご紹介。</p>
                    <div class="originalSlide mt45">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <article class="swiper-slide">
                                    <a href="#" class="originalSlide-item hov">
                                        <div class="originalSlide-item-info">
                                            <figure class="originalSlide-item-thumb"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/top/original-pic1.jpg" width="302" height="250" alt="サムネイル"></figure>
                                            <h2 class="originalSlide-item-ttl">
                                                <span class="originalSlide-item-ttl-upp">憧れの写真家に近づける</span>
                                                <span class="originalSlide-item-ttl-low">Lightroom プリセット</span>
                                            </h2>
                                        </div>
                                        <p class="originalSlide-item-text">人気写真家のライトルームプリセットで今までにない作品づくりを</p>
                                    </a>
                                </article>
                                <article class="swiper-slide">
                                    <a href="#" class="originalSlide-item hov">
                                        <div class="originalSlide-item-info">
                                            <figure class="originalSlide-item-thumb"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/top/original-pic2.jpg" width="302" height="250" alt="サムネイル"></figure>
                                            <h2 class="originalSlide-item-ttl">
                                                <span class="originalSlide-item-ttl-upp">いちからはじめる写真教室</span>
                                                <span class="originalSlide-item-ttl-low">CURBON photo college</span>
                                            </h2>
                                        </div>
                                        <p class="originalSlide-item-text">スキルも可能性も必ず伸びる本気の長期プログラム 第4期生募集開始！</p>
                                    </a>
                                </article>
                                <article class="swiper-slide">
                                    <a href="#" class="originalSlide-item hov">
                                        <div class="originalSlide-item-info">
                                            <figure class="originalSlide-item-thumb"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/top/original-pic3.jpg" width="302" height="250" alt="サムネイル"></figure>
                                            <h2 class="originalSlide-item-ttl">
                                                <span class="originalSlide-item-ttl-upp">写真を仕事に。法人向け撮影サービス。</span>
                                                <span class="originalSlide-item-ttl-low">Creators Base</span>
                                            </h2>
                                        </div>
                                        <p class="originalSlide-item-text">次世代を担う若手クリエイターから、SNSで数十万人のフォロワーを抱えるPROフォトグラファーまで。写真会社「CURBON」の全国ネットワークを活かしたサービス。</p>
                                    </a>
                                </article>
                            </div>
                            <div class="swiper-pagination mt50 sm-mt30"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>-->
        <!-- .topNews -->
        <section class="topNews pt130 sm-pt80">
            <div class="cols">
                <div class="col-12">
                    <div class="topNews-info">
                        <h2 class="topNews-ttl"><span class="d-ib js-scroll">NEWS</span></h2>
                        <div class="topNews-btn js-scroll">
                            <a href="<?php echo home_url(); ?>/new" class="btn-block-black hov">ALL VIEW</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cols">
                <div class="col-12">
                    <!-- .feedNewsTop -->
                    <div class="feedNewsTop">
                        <?php $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 4,
                        ); ?>
                        <?php $loop = new WP_Query($args); ?>
                        <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                                <article class="js-scroll">
                                    <a href="<?php the_permalink(); ?>" class="feedNewsTop-item hov">
                                        <div class="feedNewsTop-info">
                                            <span class="feedNewsTop-item-date"><?php the_time("Y" . ".m" . ".d"); ?></span>
                                            <?php $categorys = get_the_category();
                                            foreach ($categorys as $category) { ?>
                                                <span class="feedNewsTop-item-category"><?php echo $category->name; ?></span>
                                            <?php } ?>
                                        </div>
                                        <h3 class="feedNewsTop-item-ttl"><?php the_title(); ?></h3>
                                    </a>
                                </article>
                            <?php endwhile; ?>
                        <?php else : ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                    <div class="d-n sm-d-b pt25 ta-r">
                        <a href="<?php echo home_url(); ?>/new" class="btn-block-black hov js-scroll">ALL VIEW</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php get_footer(); ?>
</body>

</html>