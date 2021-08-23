<!doctype html>
<html class="no-js" lang="ja">
<?php get_template_part('head'); ?>

<body id="magazines">
    <?php get_header(); ?>
    <!-- .content -->
    <main class="content">
        <div class="cols ptb50 sm-ptb30 z2">
            <div class="col-12">
                <!-- .contentTtl -->
                <div class="contentTtl"><span class="d-ib js-scroll">ENCOUNTER MAGAZINE</span></div>
            </div>
        </div>
        <div class="cols">
            <div class="col-12">
                <div class="cols nega gutter-50 gutter-sm-30">
                    <!-- .mainbar -->
                    <div class="mainbar col-8 col-sm-12">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <article class="article">
                                    <figure class="article-eyeCatch js-scroll">
                                        <?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'fill'); ?>
                                        <img class="img-rspsv-full" src="<?php echo $imgset[0]; ?>" alt="アイキャッチ画像">
                                    </figure>
                                    <div class="article-subInfo js-scroll">
                                        <?php $categorys = get_the_terms($post->ID, 'magazines-cat');
                                        foreach ($categorys as $category) { ?>
                                            <div class="article-category"><?php echo $category->name; ?></div>
                                        <?php } ?>
                                        <time class="article-date"><?php the_time("Y" . ".m" . ".d"); ?></time>
                                    </div>
                                    <h1 class="article-ttl mt30 js-scroll"><?php the_title(); ?></h1>
                                    <?php $categories = get_the_terms($post->ID, 'post-tag'); ?>
                                    <?php if ($categories) { ?>
                                        <ul class="article-tags mt30 js-scroll">
                                            <?php foreach ($categories as $category) { ?>
                                                <li><a href="<?php echo home_url(); ?>/?s=<?php echo $category->name; ?>&type=post" class="article-tags-item hov"><?php echo $category->name; ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
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
                                                <span class="js-scroll">
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
                                                <a href="<?php echo get_permalink($prevpost->ID) ?>" class="article-pager-item hov js-scroll">PREV</a>
                                            <?php } ?>
                                        </div>
                                        <div class="col-4 col-sm-6">
                                            <a href="<?php echo home_url(); ?>/magazine" class="article-pager-item hov js-scroll">ALL VIEW</a>
                                        </div>
                                        <div class="col-4 col-sm-3">
                                            <?php if ($nextpost) { ?>
                                                <a href="<?php echo get_permalink($nextpost->ID) ?>" class="article-pager-item hov js-scroll">NEXT</a>
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