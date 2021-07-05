<!doctype html>
<html class="no-js" lang="ja">
<?php get_template_part('head'); ?>

<body id="tag">
    <?php get_header(); ?>
    <!-- .content -->
    <main class="content">
        <div class="cols ptb50 sm-ptb30 z2 js-scroll">
            <div class="col-12">
                <!-- .contentTtl -->
                <div class="contentTtl">Tags</div>
            </div>
        </div>
        <div class="cols js-scroll">
            <div class="col-12">
                <div class="cols nega gutter-50 gutter-sm-30">
                    <!-- .mainbar -->
                    <div class="mainbar col-8 col-sm-12">
                    <ul class="tags">
                        <?php $categories = get_terms('post-tag', 'orderby=count&hide_empty=1&order=DESC'); ?>
                        <?php if ($categories) {
                            foreach ($categories as $category) { ?>
                                <li><a href="<?php echo home_url(); ?>/?s=<?php echo $category->name; ?>&type=post" class="tags-item hov"><?php echo $category->name; ?></a></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                    </div>
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </main>
    <?php get_footer(); ?>
</body>

</html>