<!doctype html>
<html class="no-js" lang="ja">
<?php get_template_part('head'); ?>

<body id="specials">
    <?php get_header(); ?>
    <!-- .content -->
    <main class="content">
        <div class="cols ptb50 sm-ptb30 z2">
            <div class="col-12">
                <!-- .contentTtl -->
                <div class="contentTtl"><span class="d-ib js-scroll">SPECIAL CONTENTS</span></div>
            </div>
        </div>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <!-- .article -->
                <article class="article">
                    <div class="cols">
                        <div class="col-12">
                            <article class="js-scroll">
                                <!-- .specialBnr -->
                                <div class="specialBnr">
                                    <div class="specialBnr-inner">
                                        <span class="specialBnr-label">SPECIAL CONTENTS</span>
                                        <div class="specialBnr-info">
                                            <h2 class="specialBnr-ttl"><?php the_title(); ?></h2>
                                            <p class="specialBnr-caption"><?php the_field('caption'); ?></p>
                                        </div>
                                        <?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'size1160450'); ?>
                                        <img class="specialBnr-thumb" src="<?php echo $imgset[0]; ?>" width="1160" height="450" alt="サムネイル">
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="cols pt30">
                        <div class="col-12">
                            <time class="article-date js-scroll"><?php the_time("Y" . ".m" . ".d"); ?></time>
                            <ul class="article-tags mt20 js-scroll">
                                <?php $categories = get_the_terms($post->ID, 'post-tag');
                                if ($categories) {
                                    foreach ($categories as $category) { ?>
                                        <li><a href="<?php echo home_url(); ?>/?s=<?php echo $category->name; ?>&type=post" class="article-tags-item hov"><?php echo $category->name; ?></a></li>
                                <?php }
                                } ?>
                            </ul>
                            <p class="article-read mt60 js-scroll"><?php the_field('read'); ?></p>
                            <?php if (get_field('author')) { ?>
                                <!-- .profileBlock -->
                                <div class="profileBlock mt90 md-mt70 sm-mt60">
                                    <?php $rows = get_field('author'); ?>
                                    <?php foreach ($rows as $row) { ?>
                                        <section class="profileBlock-item js-scroll">
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
                            <!-- .article-sentence -->
                            <div class="article-sentence mt30 sm-mt20">
                                <?php the_content(); ?>
                            </div>
                            <!-- .article-pager -->
                            <?php
                            $prevpost = get_adjacent_post(false, '', true);
                            $nextpost = get_adjacent_post(false, '', false);
                            ?>
                            <div class="article-pager mt100 sm-mt70">
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
                                            <a href="<?php echo home_url(); ?>/special" class="article-pager-item hov">ALL VIEW</a>
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
                        </div>
                    </div>
                    <div class="cols pt90 sm-pt60">
                        <div class="col-12">
                            <!-- .relatedFeed -->
                            <div class="relatedFeed pt60 sm-pt30">
                                <div class="relatedFeed-ttl pb40 sm-pb20"><span class="d-ib js-scroll">関連記事</span></div>
                                <!-- .feedSpecial -->
                                <div class="feedSpecial cols nega gutter-60 gutter-md-30 gutter-sm-20">
                                    <?php $args = array(
                                        'post_type' => 'specials',
                                        'posts_per_page' => 3,
                                    ); ?>
                                    <?php $loop = new WP_Query($args); ?>
                                    <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
                                            <article class="col-4 col-md-6">
                                                <a href="<?php the_permalink(); ?>" class="feedSpecial-item hov">
                                                    <figure class="feedSpecial-thumb js-scroll">
                                                        <?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'size560400'); ?>
                                                        <img class="img-rspsv-full" src="<?php echo $imgset[0]; ?>" width="280" height="200" alt="サムネイル">
                                                    </figure>
                                                    <h2 class="feedSpecial-ttl js-scroll"><?php the_title(); ?></h2>
                                                    <p class="feedSpecial-caption js-scroll"><?php the_field('caption'); ?></p>
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
                </article>
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
                <div class="cols pt60 sm-pt30">
                    <div class="col-12">
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
                                <a href="<?php echo home_url(); ?>/tag" class="btn-block-txt hov">ALL VIEW</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cols jc-c pt60">
                    <div class="col-12">
                        <div class="cols jc-c nega gutter-10 mt-10">
                            <div class="col-3 col-md-6 col-sm-10 pt10"><a href="" class="d-b hov js-scroll"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA1.jpg" width="232" height="92" alt="人気連載 さらお、カメラ買う。"></a></div>
                            <div class="col-3 col-md-6 col-sm-10 pt10"><a href="" class="d-b hov js-scroll"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA2.jpg" width="232" height="92" alt="#超えるぞ2021 フォトコンテスト"></a></div>
                            <div class="col-3 col-md-6 col-sm-10 pt10"><a href="" class="d-b hov js-scroll"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA3.jpg" width="232" height="92" alt="Artist Interview"></a></div>
                            <div class="col-3 col-md-6 col-sm-10 pt10"><a href="" class="d-b hov js-scroll"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA4.jpg" width="232" height="92" alt="新商品ができました！"></a></div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
    </main>
    <?php get_footer(); ?>
</body>

</html>