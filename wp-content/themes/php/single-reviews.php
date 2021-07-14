<!doctype html>
<html class="no-js" lang="ja">
<?php get_template_part('head'); ?>

<body id="reviews">
    <?php get_header(); ?>
    <!-- .content -->
    <main class="content">
        <div class="cols ptb50 sm-ptb30 z2">
            <div class="col-12">
                <!-- .contentTtl -->
                <div class="contentTtl"><span class="d-ib js-scroll">CAMERA / FILM REVIEW</span></div>
            </div>
        </div>
        <div class="cols">
            <div class="col-12">
                <div class="cols nega gutter-50 gutter-sm-30">
                    <!-- .mainbar -->
                    <div class="mainbar col-8 col-sm-12">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <article class="article articleReview">
                                    <figure class="article-eyeCatch js-scroll">
                                        <?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'fill'); ?>
                                        <img class="img-rspsv-full" src="<?php echo $imgset[0]; ?>" alt="アイキャッチ画像">
                                    </figure>
                                    <?php $categorys = get_the_terms($post->ID, 'reviews-cat');
                                    foreach ($categorys as $category) { ?>
                                        <div class="article-category article-category-<?php echo $category->slug; ?> mt30"><?php echo $category->name; ?></div>
                                    <?php } ?>
                                    <h1 class="article-ttl"><span class="d-b js-scroll"><?php the_title(); ?></span></h1>
                                    <ul class="article-tags mt30 js-scroll">
                                        <?php $categories = get_the_terms($post->ID, 'post-tag');
                                        if ($categories) {
                                            foreach ($categories as $category) { ?>
                                                <li><a href="<?php echo home_url(); ?>/?s=<?php echo $category->name; ?>&type=post" class="article-tags-item hov"><?php echo $category->name; ?></a></li>
                                        <?php }
                                        } ?>
                                    </ul>
                                    <!-- .article-sentence -->
                                    <div class="article-sentence pt30 sm-pt20">
                                        <?php the_content(); ?>
                                    </div>
                                </article>
                                <?php if (get_field('addBtn')) { ?>
                                    <div class="pt60 sm-pt30 ta-c">
                                        <?php $rows = get_field('addBtn'); ?>
                                        <?php foreach ($rows as $row) { ?>
                                            <div class="pt30">
                                                <span class="d-ib js-scroll">
                                                    <!-- .article-externalLink -->
                                                    <a href="<?php echo $row['link']; ?>" class="article-externalLink hov" target="_blank" rel="noopener"><?php echo $row['text']; ?></a>
                                                </span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <?php if (get_field('author')) { ?>
                                    <!-- .profileBlock -->
                                    <div class="profileBlock pt90 sm-pt60">
                                        <?php $rows = get_field('author'); ?>
                                        <?php foreach ($rows as $row) { ?>
                                            <section class="profileBlock-item">
                                                <figure class="profileBlock-item-thumb">
                                                    <?php $imgsrc = $row['pic']; ?>
                                                    <?php $imgset = wp_get_attachment_image_src($imgsrc, 'size300300'); ?>
                                                    <img class="img-rspsv-full" src="<?php echo $imgset[0]; ?>" width="150" height="150" alt="サムネイル">
                                                </figure>
                                                <div class="profileBlock-item-info">
                                                    <div class="profileBlock-item-label"><?php echo $row['label']; ?></div>
                                                    <h2 class="profileBlock-item-name"><?php echo $row['name']; ?></h2>
                                                    <p class="profileBlock-item-text"><?php echo $row['text']; ?></p>
                                                    <?php if ($row['twitterLink'] || $row['instagramLink']) { ?>
                                                        <ul class="profileBlock-item-snsBtn">
                                                            <?php if ($row['twitterLink']) { ?>
                                                                <li><a href="<?php echo $row['twitterLink']; ?>" target="_blank" rel="noopener" class="hov"><img src="<?php echo home_url(); ?>/img/common/icon-twitter-b.png" width="20" height="17" alt="Twitter"></a></li>
                                                            <?php } ?>
                                                            <?php if ($row['instagramLink']) { ?>
                                                                <li><a href="<?php echo $row['instagramLink']; ?>" target="_blank" rel="noopener" class="hov"><img src="<?php echo home_url(); ?>/img/common/icon-instagram-b.png" width="20" height="22" alt="Instagram"></a></li>
                                                            <?php } ?>
                                                        </ul>
                                                    <?php } ?>
                                                </div>
                                            </section>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <!-- .article-pager -->
                                <div class="article-pager mt100 sm-mt70">
                                    <?php
                                    $prevpost = get_adjacent_post(false, '', true);
                                    $nextpost = get_adjacent_post(false, '', false);
                                    ?>
                                    <div class="cols nega gutter-30 gutter-sm-10">
                                        <div class="col-4 col-sm-3">
                                            <?php if ($prevpost) { ?>
                                                <span class="d-b js-scroll">
                                                    <a href="<?php echo get_permalink($prevpost->ID) ?>" class="article-pager-item hov">PREV</a>
                                                </span>
                                            <?php } ?>
                                        </div>
                                        <div class="col-4 col-sm-6">
                                            <span class="d-b js-scroll">
                                                <a href="<?php echo home_url(); ?>/review" class="article-pager-item hov">ALL VIEW</a>
                                            </span>
                                        </div>
                                        <div class="col-4 col-sm-3">
                                            <?php if ($nextpost) { ?>
                                                <span class="d-b js-scroll">
                                                    <a href="<?php echo get_permalink($nextpost->ID) ?>" class="article-pager-item hov">NEXT</a>
                                                </span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                        <?php endif; ?>
                    </div>
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </main>
    <?php get_footer(); ?>
</body>

</html>