<!doctype html>
<html class="no-js" lang="ja">
<?php get_template_part('head'); ?>

<body id="special">
    <?php get_header(); ?>
    <!-- .content -->
    <main class="content">
        <div class="cols ptb50 sm-ptb30 z2">
            <div class="col-12">
                <!-- .contentTtl -->
                <div class="contentTtl"><span class="d-ib js-scroll">SPECIAL CONTENTS</span></div>
            </div>
        </div>
        <div class="cols">
            <div class="col-12">
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
        <div class="cols pt90 sm-pt60">
            <div class="col-12">
                <!-- .feedSpecial -->
                <div class="feedSpecial cols nega gutter-60 gutter-md-30 gutter-sm-20">
                    <?php $args = array(
                        'post_type' => 'specials',
                        'posts_per_page' => -1,
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
        <div class="cols jc-c pt120 sm-pt60">
            <div class="col-8 col-md-10 col-sm-12">
                <!-- .search -->
                <form class="search js-scroll" action="<?php echo home_url(); ?>/" method="get">
                    <input name="s" type="search" placeholder="キーワード検索" value="<?php if (is_search()) {
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
        <!--<div class="cols jc-c pt60 js-scroll">
            <div class="col-12">
                <div class="cols jc-c nega gutter-10 mt-10">
                    <div class="col-3 col-md-6 col-sm-10 pt10"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA1.jpg" width="232" height="92" alt="人気連載 さらお、カメラ買う。"></a></div>
                    <div class="col-3 col-md-6 col-sm-10 pt10"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA2.jpg" width="232" height="92" alt="#超えるぞ2021 フォトコンテスト"></a></div>
                    <div class="col-3 col-md-6 col-sm-10 pt10"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA3.jpg" width="232" height="92" alt="Artist Interview"></a></div>
                    <div class="col-3 col-md-6 col-sm-10 pt10"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA4.jpg" width="232" height="92" alt="新商品ができました！"></a></div>
                </div>
            </div>
        </div>-->
    </main>
    <?php get_footer(); ?>
</body>

</html>