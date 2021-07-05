<!doctype html>
<html class="no-js" lang="ja">
<?php get_template_part('head'); ?>

<?php
$terms = get_the_terms($post->ID, 'magazines-cat');
$term = $terms[0]->name;
?>

<body id="magazine" class="magazines-cat-<?php echo $terms[0]->slug; ?>">
	<?php get_header(); ?>
	<!-- .content -->
	<main class="content">
		<div class="cols ptb50 sm-ptb30 js-scroll">
			<div class="col-12">
				<!-- .contentTtl -->
				<div class="contentTtl">CURBON MAGAZINE</div>
			</div>
		</div>
		<div class="cols js-scroll">
			<div class="col-12">
				<div class="cols nega gutter-50 gutter-sm-30">
					<!-- .mainbar -->
					<div class="mainbar col-8 col-sm-12">
						<!-- shame:最低1記事は各カテゴリに必要です -->
						<?php if ($term == '写真を学ぶ') { ?>
							<div class="catCard" style="background: url(<?php echo home_url(); ?>/img/common/catCard2.jpg);">写真を学ぶ</div>
						<?php } elseif ($term == '写真を仕事にする') { ?>
							<div class="catCard" style="background: url(<?php echo home_url(); ?>/img/common/catCard3.jpg);">写真を仕事にする</div>
						<?php } elseif ($term == 'おかいもの') { ?>
							<div class="catCard" style="background: url(<?php echo home_url(); ?>/img/common/catCard4.jpg);">おかいもの</div>
						<?php } elseif ($term == 'よみもの') { ?>
							<div class="catCard" style="background: url(<?php echo home_url(); ?>/img/common/catCard5.jpg);">よみもの</div>
						<?php } ?>
						<!-- .feedBasic -->
						<div class="feedBasic cols nega gutter-60 gutter-md-30 gutter-sm-20 pt60">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<article class="col-6">
										<a href="<?php the_permalink(); ?>" class="feedBasic-item hov">
											<figure class="feedBasic-thumb">
												<?php $imgset = wp_get_attachment_image_src(get_post_thumbnail_id(), 'size560400'); ?>
												<img class="img-rspsv-full" src="<?php echo $imgset[0]; ?>" width="280" height="200" alt="サムネイル">
											</figure>
											<div class="feedBasic-subInfo">
												<?php $categorys = get_the_terms($post->ID, 'magazines-cat');
												foreach ($categorys as $category) { ?>
													<span class="feedBasic-category"><?php echo $category->name; ?></span>
												<?php } ?>
												<span class="feedBasic-date"><?php the_time("Y" . ".m" . ".d"); ?></span>
											</div>
											<h2 class="feedBasic-ttl js-matchHeight"><?php the_title(); ?></h2>
											<p class="feedBasic-text"><?php $inText = get_the_excerpt();
																		if (mb_strlen($inText) > 60) { ?><?php echo mb_substr($inText, 0, 60); ?>...<?php } else {
																																					echo $inText;
																																				} ?></p>
										</a>
									</article>
								<?php endwhile; ?>
							<?php else : ?>
							<?php endif; ?>
						</div>
						<?php if (function_exists('pagination') && $wp_query->max_num_pages > 1) { ?>
							<div class="mt60 sm-mt30">
								<!-- .feedPagenation -->
								<?php pagination($additional_loop->max_num_pages); ?>
							</div>
						<?php } ?>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</main>
	<?php get_footer(); ?>
</body>

</html>