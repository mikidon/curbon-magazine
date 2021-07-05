<!-- .sidebar -->
<aside class="sidebar col-4 col-sm-12 sm-mt60">
    <!-- .search -->
    <form class="search" action="<?php echo home_url(); ?>/" method="get">
        <input name="s" type="search" placeholder="キーワード検索" value="<?php if (is_search()) {
                                                                        the_search_query();
                                                                    } ?>" />
        <input type="hidden" name="type" value="post">
        <button type="submit"></button>
    </form>
    <!-- .hotWords -->
    <div class="hotWords mt30">
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
    <!-- .sidebar-nav -->
    <nav class="sidebar-nav mt30">
        <ul>
            <li><a href="<?php echo home_url(); ?>/ranking" class="sidebar-nav-item hov">人気ランキング</a></li>
            <li><a href="<?php echo home_url(); ?>/special" class="sidebar-nav-item hov">特集</a></li>
        </ul>
    </nav>
    <!-- .sidebar-nav -->
    <nav class="sidebar-nav mt30">
        <ul>
            <li><a href="<?php echo home_url(); ?>/magazine" class="sidebar-nav-item hov">記事一覧</a></li>
            <li><a href="<?php echo home_url(); ?>/magazines-cat/study" class="sidebar-nav-item hov">写真を学ぶ</a></li>
            <li><a href="<?php echo home_url(); ?>/magazines-cat/job" class="sidebar-nav-item hov">写真を仕事にする</a></li>
            <li><a href="<?php echo home_url(); ?>/magazines-cat/shop" class="sidebar-nav-item hov">おかいもの</a></li>
            <li><a href="<?php echo home_url(); ?>/magazines-cat/read" class="sidebar-nav-item hov">よみもの</a></li>
            <li><a href="<?php echo home_url(); ?>/review" class="sidebar-nav-item hov">機材レビュー</a></li>
        </ul>
    </nav>
    <!-- .sidebar-nav -->
    <nav class="sidebar-nav mt30">
        <ul>
            <li><a href="<?php echo home_url(); ?>/new" class="sidebar-nav-item hov">お知らせ</a></li>
        </ul>
    </nav>
    <!-- .sidebar-bnr -->
    <div class="sidebar-bnr mt30">
        <p class="ta-c fz90">バナーが入る予定</p>
        <!--<ul>
            <li><a href="" class="slidebar-bnr-item hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA1.jpg" width="232" height="92" alt="人気連載 さらお、カメラ買う。"></a></li>
            <li><a href="" class="slidebar-bnr-item hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA2.jpg" width="232" height="92" alt="#超えるぞ2021 フォトコンテスト"></a></li>
            <li><a href="" class="slidebar-bnr-item hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA3.jpg" width="232" height="92" alt="Artist Interview"></a></li>
            <li><a href="" class="slidebar-bnr-item hov"><img class="img-rspsv-full" src="<?php echo home_url(); ?>/img/common/bnrA4.jpg" width="232" height="92" alt="新商品ができました！"></a></li>
        </ul>-->
    </div>
</aside>