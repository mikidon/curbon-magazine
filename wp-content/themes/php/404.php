<!doctype html>
<html class="no-js" lang="ja">
<?php get_template_part('head'); ?>

<body id="error">
    <?php get_header(); ?>
    <!-- .content -->
    <main class="content">
        <div class="cols ptb50 sm-ptb30 z2 js-scroll">
            <div class="col-12">
                <!-- .contentTtl -->
                <div class="contentTtl">404 NOT FOUND</div>
            </div>
        </div>
        <div class="cols js-scroll">
            <div class="col-12 ta-c">
                <div class="bb-gray ptb120 sm-ptb60">
                    <p class="fw-b">ご覧いただいているURLにはページはありません。<br>
                        URLの入力間違いか、<br class="d-n sm-d-i">ページが移動している可能性があります。</p>
                    <div class="mt60 sm-mt30 ta-c">
                        <a href="<?php echo home_url(); ?>/" class="btn-round hov">BACK TO TOP</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cols jc-c pt120 sm-pt60 js-scroll">
            <div class="col-8 col-md-10 col-sm-12">
                <!-- .search -->
                <form class="search" action="<?php echo home_url(); ?>/" method="get">
                    <input name="s" type="search" placeholder="キーワード検索" value="<?php if (is_search()) {
                                                                                    the_search_query();
                                                                                } ?>" />
                    <input type="hidden" name="type" value="post">
                    <button type="submit"></button>
                </form>
            </div>
        </div>
        <div class="cols pt60 sm-pt30 js-scroll">
            <div class="col-12">
                <!-- .hotWords -->
                <div class="hotWords">
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
        <!--
        <div class="cols jc-c pt60 js-scroll">
            <div class="col-12">
                <div class="cols jc-c nega gutter-10 mt-10">
                    <div class="col-3 col-md-6 col-sm-10 pt10"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA1.jpg" width="232" height="92" alt="人気連載 さらお、カメラ買う。"></a></div>
                    <div class="col-3 col-md-6 col-sm-10 pt10"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA2.jpg" width="232" height="92" alt="#超えるぞ2021 フォトコンテスト"></a></div>
                    <div class="col-3 col-md-6 col-sm-10 pt10"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA3.jpg" width="232" height="92" alt="Artist Interview"></a></div>
                    <div class="col-3 col-md-6 col-sm-10 pt10"><a href="" class="hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA4.jpg" width="232" height="92" alt="新商品ができました！"></a></div>
                </div>
            </div>
        </div>
        -->
    </main>
    <?php get_footer(); ?>
</body>

</html>