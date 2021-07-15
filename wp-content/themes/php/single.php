<!doctype html>
<html class="no-js" lang="ja">
<?php get_template_part('head'); ?>

<body id="news">
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
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <article class="article articleNews">
                                    <div class="article-uppInfo">
                                        <div class="article-subInfo">
                                            <?php
                                            $category = get_the_category();
                                            $cat = $category[0];
                                            ?>
                                            <div class="article-category js-scroll"><?php echo $cat->name; ?></div>
                                            <time class="article-date js-scroll"><?php the_time("Y" . ".m" . ".d"); ?></time>
                                        </div>
                                        <h1 class="article-ttl mt30 sm-mt20 js-scroll"><?php the_title(); ?></h1>
                                    </div>
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
                                                <a href="<?php echo home_url(); ?>/new" class="article-pager-item hov">ALL VIEW</a>
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