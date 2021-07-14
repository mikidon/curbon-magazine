<!doctype html>
<html class="no-js" lang="ja">
<?php get_template_part('head'); ?>

<body id="review">
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
                        <div class="catCard js-scroll" style="background-image: url(<?php echo home_url(); ?>/img/common/catCard7.jpg);">機材レビュー</div>
                        <p class="ptb50 sm-ptb30 fw-b ta-c">豊富な作例から運命の<br class="d-n sm-d-i">カメラ・レンズ・フィルムを見つけよう</p>
                        <!-- .feedReview -->
                        <?php $args = array(
                            'post_type' => 'reviews',
                            'posts_per_page' => 8,
                            'paged' => $paged,
                        ); ?>
                        <?php query_posts($args); ?>
                        <div class="feedReview cols nega gutter-50 gutter-sm-20">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                    <article class="col-6">
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
                        </div>
                        <div class="mt60 sm-mt30">
                            <div class="mt60 sm-mt30">
                                <?php if (function_exists('pagination') && $wp_query->max_num_pages > 1) { ?>
                                    <?php pagination($additional_loop->max_num_pages); ?>
                                <?php } ?>
                            </div>
                        </div>
                        <?php wp_reset_query(); ?>
                    </div>
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </main>
    <?php get_footer(); ?>
</body>

</html>