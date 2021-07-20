<?php

//==============================================
//	基本設定
//==============================================

//admin barを消す
function disable_admin_bar()
{
	return false;
}
add_filter('show_admin_bar', 'disable_admin_bar');

//自動でアップグレード無効化
add_filter('automatic_updater_disabled', '__return_true');

//headから情報を消す
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

//管理画面上で、選択したカテゴリが上に表示される現象を削除
function solecolor_wp_terms_checklist_args($args, $post_id)
{
	if ($args['checked_ontop'] !== false) {
		$args['checked_ontop'] = false;
	}
	return $args;
}
add_filter('wp_terms_checklist_args', 'solecolor_wp_terms_checklist_args', 10, 2);


//ダッシュボードの表示を消す。
function example_remove_dashboard_widgets()
{
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']);
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');


//ダッシュボードに表示を追加。
function my_dashboard_setup()
{
	global $wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']);
	wp_add_dashboard_widget('welcome', 'ようこそ', 'welcome_widget');
}
function welcome_widget()
{
	echo 'ダッシュボードへようこそ！左のメニューから記事を更新してください。';
}
add_action('wp_dashboard_setup', 'my_dashboard_setup');


//4.2から標準搭載のtwemoji.jsのjsとcssを無効化
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles', 10);

//セルフピンバックを送らない
function no_self_ping(&$links)
{
	$home = home_url();
	foreach ($links as $l => $link)
		if (0 === strpos($link, $home))
			unset($links[$l]);
}
add_action('pre_ping', 'no_self_ping');


//エディター拡張関係
//ビジュアルエディタボタン拡張
function ilc_mce_buttons($buttons)
{
	array_push($buttons, "backcolor", "copy", "cut", "paste", "fontsizeselect");
	return $buttons;
}
add_filter("mce_buttons", "ilc_mce_buttons");
//エディターの設定
function change_editor_font()
{
	echo "<style type='text/css'>
	#wp-content-wrap textarea#content.wp-editor-area {
	  font-family: \"ヒラギノ角ゴ Pro W3\",
		\"Hiragino Kaku Gothic Pro\",
		Osaka,
		\"ＭＳ Ｐゴシック\",
		sans-serif;
	  font-size:14px;
	  color:#333;
	}
	</style>";
}
add_action("admin_print_styles", "change_editor_font");


//投稿詳細ページのみ、パーマリンクをリライトする。
function add_article_post_permalink($permalink)
{
	$permalink = '/posts' . $permalink;
	return $permalink;
}
add_filter('pre_post_link', 'add_article_post_permalink');
function add_article_post_rewrite_rules($post_rewrite)
{
	$return_rule = array();
	foreach ($post_rewrite as $regex => $rewrite) {
		$return_rule['posts/' . $regex] = $rewrite;
	}
	return $return_rule;
}
add_filter('post_rewrite_rules', 'add_article_post_rewrite_rules');

//ページネーション
function pagination($pages = '')
{
	global $paged; //今のページ番号
	if (empty($paged)) $paged = 1;
	if ($pages == '') {
		global $wp_query;
		$posts_query = $wp_query->query_vars;
		$posts_1page = $posts_query['posts_per_page'];
		$pages = $wp_query->max_num_pages;
		if (!$pages) {
			$pages = 1; //全ページ番号
		}
	}

	if (1 != $pages) { //ページネーションが必要な場合
		echo '<!-- .feedPagenation -->';

		echo '<div class="feedPagenation">';

		// mainNav
		echo '<div class="feedPagenation-mainNav">';
		if ($paged < $pages) {
			echo '<div><a class="nextBtn" href="' . get_pagenum_link($paged + 1) . '">次の' . $posts_1page . '件を見る</a></div>';
		}
		echo '<ul>';
		if ($paged > 1) {
			echo '<li><a href="' . get_pagenum_link($paged - 1) . '">◀</a></li>';
		} else {
			echo '<li><a class="null" href="' . get_pagenum_link($paged - 1) . '">◀</a></li>';
		}
		if ($paged <= 5) {
			for ($i = 1; $i <= $paged - 1; $i++) {
				echo '<li><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
			}
		} else {
			echo '<li><a href="' . get_pagenum_link(1) . '">1</a></li>';
			echo '<li class="elps">...</li>';
			echo '<li><a href="' . get_pagenum_link($paged - 2) . '">' . ($paged - 2) . '</a></li>';
			echo '<li><a href="' . get_pagenum_link($paged - 1) . '">' . ($paged - 1) . '</a></li>';
		}
		echo '<li><a class="act" href="' . get_pagenum_link($paged) . '">' . $paged . '</a></li>';
		if (($pages - $paged) <= 4) {
			for ($i = $paged + 1; $i <= $pages; $i++) {
				echo '<li><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
			}
		} else {
			echo '<li><a href="' . get_pagenum_link($paged + 1) . '">' . ($paged + 1) . '</a></li>';
			echo '<li><a href="' . get_pagenum_link($paged + 2) . '">' . ($paged + 2) . '</a></li>';
			echo '<li class="elps">...</li>';
			echo '<li><a href="' . get_pagenum_link($pages) . '">' . $pages . '</a></li>';
		}
		if ($paged < $pages) {
			echo '<li><a href="' . get_pagenum_link($paged + 1) . '">▶</a></li>';
		} else {
			echo '<li><a class="null" href="' . get_pagenum_link($paged + 1) . '">▶</a></li>';
		}
		echo '</ul>';
		echo "</div>";

		// subNav
		echo '<div class="feedPagenation-subNav">';
		echo '<p class="pageNum">' . $paged . 'ページ目（全' . $pages . 'ページ中）</p>';
		echo '<ul>';
		if ($paged > 1) {
			echo '<li><a href="' . get_pagenum_link(1) . '">|&lt;</a></li>';
			echo '<li><a href="' . get_pagenum_link($paged - 1) . '">&lt; 前のページ</a></li>';
		} else {
			echo '<li><a class="null" href="' . get_pagenum_link(1) . '">|&lt;</a></li>';
			echo '<li><a class="null" href="' . get_pagenum_link($paged - 1) . '">&lt; 前のページ</a></li>';
		}
		if ($paged < $pages) {
			echo '<li><a href="' . get_pagenum_link($paged + 1) . '">次のページ &gt;</a></li>';
			echo '<li><a href="' . get_pagenum_link($pages) . '">&gt;|</a></li>';
		} else {
			echo '<li><a class="null" href="' . get_pagenum_link($paged + 1) . '">次のページ &gt;</a></li>';
			echo '<li><a class="null" href="' . get_pagenum_link($pages) . '">&gt;|</a></li>';
		}
		echo '</ul>';
		echo '</div>';

		echo "</div>";
	}
}

if (!current_user_can('level_10')) {

	// バージョンアップを消す
	add_filter('pre_site_transient_update_core', '__return_zero');
	remove_action('wp_version_check', 'wp_version_check');
	remove_action('admin_init', '_maybe_update_core');

	// フッターのバージョン情報を非表示
	function remove_footer_version()
	{
		remove_filter('update_footer', 'core_update_footer');
	}
	add_action('admin_menu', 'remove_footer_version');

	// プラグインの更新を消す
	add_action('admin_menu', 'remove_counts');
	function remove_counts()
	{
		global $menu, $submenu;
		$menu[65][0] = 'プラグイン';
		$submenu['index.php'][10][0] = '更新';
	}

	// 管理画面に独自CSSの使用
	function admin_css()
	{
		echo '<link rel="stylesheet" type="text/css" href="' . site_url() . '/css/_admin.css">';
	}
	add_action('login_head', 'admin_css');
	add_action('admin_head', 'admin_css');

	// 管理バーの項目を非表示
	function remove_admin_bar_menu($wp_admin_bar)
	{
		$wp_admin_bar->remove_menu('wp-logo'); // WordPressシンボルマーク
		$wp_admin_bar->remove_menu('my-account'); // マイアカウント
		$wp_admin_bar->remove_menu('comments'); // コメント
		$wp_admin_bar->remove_menu('new-content'); // 新規
	}
	add_action('admin_bar_menu', 'remove_admin_bar_menu', 201);

	// 管理バーのヘルプメニューを非表示にする
	function my_admin_head()
	{
		echo '<style type="text/css">#contextual-help-link-wrap{display:none;}</style>';
	}
	add_action('admin_head', 'my_admin_head');

	// 管理バーにログアウトを追加
	function add_new_item_in_admin_bar()
	{
		global $wp_admin_bar;
		$wp_admin_bar->add_menu(array(
			'id' => 'new_item_in_admin_bar',
			'title' => __('ログアウト'),
			'href' => wp_logout_url()
		));
	}
	add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');

	// フッターにwordpressの表記をしない。
	function custom_admin_footer()
	{
		echo '';
	}
	add_filter('admin_footer_text', 'custom_admin_footer');

	// パーマリンクを表示しない。
	function my_return_false()
	{
		return false;
	}
	add_filter('get_sample_permalink_html', 'my_return_false');
}

//==============================================
//	任意設定(全ユーザー)
//==============================================

// 投稿の名称変更
function customize_menu()
{
	global $menu;
	global $submenu;
	add_menu_page('トップのスライド', 'トップのスライド', 'publish_pages', 'post.php?post=71&action=edit', '', '', '4.5');
	add_menu_page('記事ランキング', '記事ランキング', 'publish_pages', 'post.php?post=10&action=edit', '', '', '7.5');
	$menu[5][0] = 'お知らせ';
	$submenu['edit.php'][5][0] = 'お知らせ';
	$submenu['edit.php'][10][0] = 'お知らせを追加する';
}
add_action('admin_menu', 'customize_menu');

// 投稿一覧ページのカラムを削除
function custom_columns($columns)
{
	//unset($columns['cb']); // チェックボックス
	//unset($columns['title']); // タイトル
	//unset($columns['author']); // 作成者
	//unset($columns['categories']); // カテゴリー
	unset($columns['tags']); // タグ
	unset($columns['comments']); // コメント
	//unset($columns['date']); // 日付
	return $columns;
}
add_filter('manage_posts_columns', 'custom_columns');

//==============================================
//	任意設定(編集者用)
//==============================================

if (!current_user_can('level_10')) {

	// ユーザーのメニューを消す		
	function remove_menus()
	{
		global $menu;
		//unset($menu[2]);//ダッシュボード
		unset($menu[4]); //メニューの線1
		//unset($menu[5]);//投稿
		remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category'); // 投稿 -> カテゴリ
		remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag'); // 投稿 -> タグ
		//remove_menu_page('edit.php?post_type=excursions');
		remove_submenu_page('edit.php?post_type=magazines', 'edit-tags.php?taxonomy=magazines-cat&amp;post_type=magazines');
		remove_submenu_page('edit.php?post_type=reviews', 'edit-tags.php?taxonomy=reviews-cat&amp;post_type=reviews');
		unset($menu[10]); //メディア
		unset($menu[15]); //リンク
		unset($menu[20]); //ページ
		unset($menu[25]); //コメント
		unset($menu[59]); //メニューの線2
		unset($menu[60]); //テーマ
		unset($menu[65]); //プラグイン
		unset($menu[70]); //プロフィール
		unset($menu[75]); //ツール
		unset($menu[80]); //設定
		unset($menu[90]); //メニューの線3
	}
	add_action('admin_menu', 'remove_menus');

	// 標準投稿の詳細ページから不要な機能を削除
	function remove_post_supports()
	{
		//remove_post_type_support( 'post', 'title' ); // タイトル
		//remove_post_type_support( 'post', 'editor' ); // 本文欄
		remove_post_type_support('post', 'author'); // 作成者
		//remove_post_type_support( 'post', 'thumbnail' ); // アイキャッチ
		remove_post_type_support('post', 'excerpt'); // 抜粋
		remove_post_type_support('post', 'trackbacks'); // トラックバック
		remove_post_type_support('post', 'custom-fields'); // カスタムフィールド
		remove_post_type_support('post', 'comments'); // コメント
		remove_post_type_support('post', 'revisions'); // リビジョン
		remove_post_type_support('post', 'page-attributes'); // ページ属性
		remove_post_type_support('post', 'post-formats'); // 投稿フォーマット

		//unregister_taxonomy_for_object_type( 'category', 'post' ); // カテゴリ
		unregister_taxonomy_for_object_type('post_tag', 'post'); // タグ
	}
	add_action('init', 'remove_post_supports');
}

//==============================================
//	オプション設定
//==============================================

// アイキャッチを使えるようにする。
add_theme_support('post-thumbnails');

// 画像サイズ登録
//add_image_size('fixwidth', 固定する値, 9999)
//add_image_size('fixheight', 9999, 固定する値)
add_image_size('size560720', 560, 720, true); // 通常サムネイル（×2）
add_image_size('size1160450', 1160, 450, true); // 特集大サムネイル
add_image_size('size300300', 300, 300, true); // 記事関係者サムネイル（×2）
add_image_size('size320350', 320, 350, true); // 人気記事ランキングサムネイル

/*-------------------------------
	デフォルトのタグタイプ
-------------------------------*/
register_taxonomy(
	'post-tag',
	'posts',
	array(
		'hierarchical' => false,
		'update_count_callback' => '_update_post_term_count',
		'label' => 'タグ',
		'singular_label' => 'タグ',
		'public' => true,
		'show_ui' => true
	)
);

/*-------------------------------
	特集
-------------------------------*/
function specials_cpt()
{
	$labels = array(
		'name' => _x('特集', 'post type general name'),
		'singular_name' => _x('特集', 'post type singular name'),
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'specials', 'with_front' => 1),
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => 4,
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies' => array('post-tag', 'posts'),
	);
	register_post_type('specials', $args);
}
add_action('init', 'specials_cpt');

//投稿タイプのパーマリンク書き換え
//※※この設定をした後、必ず管理画面より「パーマリンク設定」を更新すること※※
add_action('init', 'myposttype_rewritespecials');
function myposttype_rewritespecials()
{
	global $wp_rewrite;
	$queryarg = 'post_type=specials&p=';
	$wp_rewrite->add_rewrite_tag('%specials_id%', '([^/]+)', $queryarg);
	$wp_rewrite->add_permastruct('specials', '/specials/%specials_id%', false);
}
add_filter('post_type_link', 'myposttype_permalinkspecials', 1, 3);
function myposttype_permalinkspecials($post_link, $id = 0, $leavename)
{
	global $wp_rewrite;
	$post = &get_post($id);
	if (is_wp_error($post))
		return $post;
	$newlink = $wp_rewrite->get_extra_permastruct($post->post_type);
	$newlink = str_replace('%' . $post->post_type . '_id%', $post->ID, $newlink);
	$newlink = home_url(user_trailingslashit($newlink));
	return $newlink;
}

/*-------------------------------
	マガジン
-------------------------------*/
function magazines_cpt()
{
	$labels = array(
		'name' => _x('マガジン', 'post type general name'),
		'singular_name' => _x('マガジン', 'post type singular name'),
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'magazines', 'with_front' => 1),
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => 4,
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies' => array('post-tag', 'posts'),
	);
	register_post_type('magazines', $args);
}
add_action('init', 'magazines_cpt');

//投稿タイプのパーマリンク書き換え
//※※この設定をした後、必ず管理画面より「パーマリンク設定」を更新すること※※
add_action('init', 'myposttype_rewritemagazines');
function myposttype_rewritemagazines()
{
	global $wp_rewrite;
	$queryarg = 'post_type=magazines&p=';
	$wp_rewrite->add_rewrite_tag('%magazines_id%', '([^/]+)', $queryarg);
	$wp_rewrite->add_permastruct('magazines', '/magazines/%magazines_id%', false);
}
add_filter('post_type_link', 'myposttype_permalinkmagazines', 1, 3);
function myposttype_permalinkmagazines($post_link, $id = 0, $leavename)
{
	global $wp_rewrite;
	$post = &get_post($id);
	if (is_wp_error($post))
		return $post;
	$newlink = $wp_rewrite->get_extra_permastruct($post->post_type);
	$newlink = str_replace('%' . $post->post_type . '_id%', $post->ID, $newlink);
	$newlink = home_url(user_trailingslashit($newlink));
	return $newlink;
}

//カスタムタクソノミー、カテゴリタイプの登録
register_taxonomy(
	'magazines-cat',
	'magazines',
	array(
		'hierarchical' => true,
		'update_count_callback' => '_update_post_term_count',
		'label' => 'カテゴリー',
		'singular_label' => 'カテゴリー',
		'public' => true,
		'show_ui' => true
	)
);

//管理画面の一覧ページに、タクソノミーの列を追加
function show_cat_magazines($defaults)
{
	$defaults['magazines-cat'] = 'カテゴリー';
	return $defaults;
}
add_filter('manage_magazines_posts_columns', 'show_cat_magazines', 5, 1);

function show_cat_area_magazines($column_name, $id)
{
	if ($column_name == 'magazines-cat') {
		$terms = $terms = get_the_terms($id, 'magazines-cat');
		$cnt = 0;
		if ($terms) {
			foreach ($terms as $var) {
				echo $cnt != 0 ? ", " : "";
				echo "<a href=\"" . get_admin_url() . "edit.php?magazines-cat=" . $var->slug . "&post_type=magazines" . "\">" . $var->name . "</a>";
				++$cnt;
			}
		}
	}
}
add_action('manage_magazines_posts_custom_column', 'show_cat_area_magazines', 5, 2);

/*-------------------------------
	機材レビュー
-------------------------------*/
function reviews_cpt()
{
	$labels = array(
		'name' => _x('機材レビュー', 'post type general name'),
		'singular_name' => _x('機材レビュー', 'post type singular name'),
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'reviews', 'with_front' => 1),
		'capability_type' => 'post',
		'hierarchical' => true,
		'menu_position' => 4,
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies' => array('post-tag', 'posts'),
	);
	register_post_type('reviews', $args);
}
add_action('init', 'reviews_cpt');

//投稿タイプのパーマリンク書き換え
//※※この設定をした後、必ず管理画面より「パーマリンク設定」を更新すること※※
add_action('init', 'myposttype_rewritereviews');
function myposttype_rewritereviews()
{
	global $wp_rewrite;
	$queryarg = 'post_type=reviews&p=';
	$wp_rewrite->add_rewrite_tag('%reviews_id%', '([^/]+)', $queryarg);
	$wp_rewrite->add_permastruct('reviews', '/reviews/%reviews_id%', false);
}
add_filter('post_type_link', 'myposttype_permalinkreviews', 1, 3);
function myposttype_permalinkreviews($post_link, $id = 0, $leavename)
{
	global $wp_rewrite;
	$post = &get_post($id);
	if (is_wp_error($post))
		return $post;
	$newlink = $wp_rewrite->get_extra_permastruct($post->post_type);
	$newlink = str_replace('%' . $post->post_type . '_id%', $post->ID, $newlink);
	$newlink = home_url(user_trailingslashit($newlink));
	return $newlink;
}

//カスタムタクソノミー、カテゴリタイプの登録
register_taxonomy(
	'reviews-cat',
	'reviews',
	array(
		'hierarchical' => true,
		'update_count_callback' => '_update_post_term_count',
		'label' => 'カテゴリー',
		'singular_label' => 'カテゴリー',
		'public' => true,
		'show_ui' => true
	)
);

//管理画面の一覧ページに、タクソノミーの列を追加
function show_cat_reviews($defaults)
{
	$defaults['reviews-cat'] = 'カテゴリー';
	return $defaults;
}
add_filter('manage_reviews_posts_columns', 'show_cat_reviews', 5, 1);

function show_cat_area_reviews($column_name, $id)
{
	if ($column_name == 'reviews-cat') {
		$terms = $terms = get_the_terms($id, 'reviews-cat');
		$cnt = 0;
		if ($terms) {
			foreach ($terms as $var) {
				echo $cnt != 0 ? ", " : "";
				echo "<a href=\"" . get_admin_url() . "edit.php?reviews-cat=" . $var->slug . "&post_type=reviews" . "\">" . $var->name . "</a>";
				++$cnt;
			}
		}
	}
}
add_action('manage_reviews_posts_custom_column', 'show_cat_area_reviews', 5, 2);

/*-------------------------------
	サイト内検索のカスタマイズ
-------------------------------*/
function custom_search($search, $wp_query)
{
	global $wpdb;

	//検索ページ以外だったら終了
	if (!$wp_query->is_search)
		return $search;

	if (!isset($wp_query->query_vars))
		return $search;

	// タグ名・カテゴリ名・カスタムフィールド も検索対象にする
	$search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
	if (count($search_words) > 0) {
		$search = '';
		foreach ($search_words as $word) {
			if (!empty($word)) {
				$search_word = $wpdb->escape("%{$word}%");
				$search .= " AND (
						{$wpdb->posts}.post_title LIKE '{$search_word}'
						OR {$wpdb->posts}.post_content LIKE '{$search_word}'
						OR {$wpdb->posts}.ID IN (
							SELECT distinct r.object_id
							FROM {$wpdb->term_relationships} AS r
							INNER JOIN {$wpdb->term_taxonomy} AS tt ON r.term_taxonomy_id = tt.term_taxonomy_id
							INNER JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id
							WHERE t.name LIKE '{$search_word}'
						OR t.slug LIKE '{$search_word}'
						OR tt.description LIKE '{$search_word}'
						)
						OR {$wpdb->posts}.ID IN (
							SELECT distinct p.post_id
							FROM {$wpdb->postmeta} AS p
							WHERE p.meta_value LIKE '{$search_word}'
						)
				) ";
			}
		}
	}

	return $search;
}
add_filter('posts_search', 'custom_search', 10, 2);

// 各ポストの一覧ページにカスタムフィールドの列追加
/*
	function manage_■■ポストのスラッグ■■_columns($columns) {
		$columns['■■フィールドスラッグ■■'] = "■■フィールド名■■";
		return $columns;
	}
	function add_column_■■ポストのスラッグ■■($column_name, $post_id) {
		if( $column_name == '■■フィールドスラッグ■■' ) {
			$stitle = get_post_meta($post_id, '■■フィールドスラッグ■■', true);
		}
		if ( isset($stitle) && $stitle ) {
			echo attribute_escape($stitle);
		} else {
			echo __('None');
		}
	}
	add_filter( 'manage_edit-■■ポストのスラッグ■■_columns', 'manage_■■ポストのスラッグ■■_columns' );
	add_action( 'manage_■■ポストのスラッグ■■_posts_custom_column', 'add_column_■■ポストのスラッグ■■', 10, 2 );
	*/


//タクソノミーページでのループの表示件数変更
/*
	add_action('pre_get_posts', 'my_pre_get_posts');
	function my_pre_get_posts($query) {
		if (!is_admin() && $query->is_main_query() && is_category()) {
			$query->set('posts_per_page', 10);
		}elseif(!is_admin() && $query->is_main_query() && is_tax("galleries-cat")) {
			$query->set('posts_per_page', 10);
			$query->set('order', 'ASC'); //カスタムタクソノミー＋並び替え機能時にこれがないと、順にならない
			$query->set('orderby', 'menu_order'); //カスタムタクソノミー＋並び替え機能時にこれがないと、順にならない
		}
	}
	*/

// 管理画面：カスタムポストの順番を変える
/*
add_action( 'pre_get_posts', 'custom_post_sort' );
function custom_post_sort( $query ) {
	if(is_admin() && (isset($query->query_vars['post_type']) && !isset($_GET["orderby"]) && $query->query_vars['post_type'] != 'post' ) ) {
	$query->set('orderby', 'date');
    $query->set('order', 'DESC');
	}
}
*/

//「ここにタイトルを入力」をカスタマイズ
/* 
	function change_default_title( $title ) {
	$screen = get_current_screen();
	if ( $screen->post_type == 'post' ) {
		  $title = 'ブログのタイトルを入力';
	}elseif ( $screen->post_type == 'trials' ) {
		   $title = '◯年◯月◯日(◯)｜場所（残席）を入力';
	}
	  return $title;
	}
	add_filter( 'enter_title_here', 'change_default_title' );
*/



//任意のユーザー名の時にメニューを制御
/*
	global $current_user;
	get_currentuserinfo();
	if ($current_user->user_login == "blogger" ) {
		function remove_menus2 () {
			global $menu;
			remove_menu_page('admin.php?page=iqfm-edit');
		}
		add_action('admin_menu', 'remove_menus2');
		function my_admin_style() {
	  echo '<style>
	  //ここに独自CSSのスタイルを記述
	  </style>'.PHP_EOL;
	}add_action('admin_print_styles', 'my_admin_style');*/



//カスタムフィールドをサイト内検索の対象に含める
/*
	function search_custom_field_query( $search, $wp_query ) {
		if ( $wp_query->is_main_query() && $wp_query->is_search() && ! is_admin() ) {
			$q = $wp_query->query_vars;
			$n = !empty($q['exact']) ? '' : '%';

			$add_search = '';
			foreach( (array) $q['search_terms'] as $term ) {
				$term = esc_sql( like_escape( $term ) );
				$add_search = " OR ( pm.meta_key IN ( 'カスタムフィールド名' ) AND pm.meta_value LIKE '{$n}{$term}{$n}')";
			}
			$search = str_replace( ')))', ')' . $add_search . '))', $search );
		}
		return $search;
	}
	add_filter( 'posts_search', 'search_custom_field_query', 10, 2 );


	function search_custom_field_join( $join, $wp_query ) {
		global $wpdb;
		if ( $wp_query->is_main_query() && $wp_query->is_search() && ! is_admin() ) {
			$join .= " INNER JOIN {$wpdb->postmeta} AS pm ON pm.post_id = {$wpdb->posts}.ID";
		}
		return $join;
	}
	add_filter( 'posts_join', 'search_custom_field_join', 10, 2 );

	function search_custom_field_groupby( $groupby, $wp_query ) {
		global $wpdb;
		if ( $wp_query->is_main_query() && $wp_query->is_search() && ! is_admin() ) {
			$groupby = "{$wpdb->posts}.ID";
		}
		return $groupby;
	}
	add_filter( 'posts_groupby', 'search_custom_field_groupby', 10, 2 );
	*/

//各投稿タイプの「プレビュー」URLを変更
/*add_filter( 'preview_post_link', 'custom_seminar_change_preview_link');
function custom_seminar_change_preview_link($preview_link) {
	global $post_type;
	if($post_type == 'teachers'){
    	$preview_link = home_url().'/instructor';
    }elseif($post_type == 'voices'){
		$preview_link = home_url().'/voice';
	}elseif($post_type == 'studios'){
		$preview_link = home_url().'/studio';
	}
return $preview_link;
}*/

//--------------------------------------------------------------------
//　任意のユーザーのみ、ログイン直後に管理画面にリダイレクト
//--------------------------------------------------------------------
/*
if ( $current_user->user_login == "demo" ){
  add_action( 'admin_init', 'redirect_dashiboard' );
}
function redirect_dashiboard() {
  if (is_admin()){
    wp_redirect( home_url() );
  }
}*/

//投稿のカテゴリー選択を１つに制限＋カテゴリーのボックスに、メモを追記
/*
add_action( 'admin_print_footer_scripts', 'limit_category_select' );
function limit_category_select() {
  ?>
  <script type="text/javascript">
    jQuery(function($) {
      // 投稿画面のカテゴリー選択を制限
      var cat_checklist = $('.categorychecklist input[type=checkbox]');
      cat_checklist.click( function() {
          $(this).parents('.categorychecklist').find('input[type=checkbox]').attr('checked', false);
          $(this).attr('checked', true);
      });

      // クイック編集のカテゴリー選択を制限
      var quickedit_cat_checklist = $('.cat-checklist input[type=checkbox]');
      quickedit_cat_checklist.click( function() {
          $(this).parents('.cat-checklist').find('input[type=checkbox]').attr('checked', false);
          $(this).attr('checked', true);
      });

      $('.categorychecklist>li:first-child, .cat-checklist>li:first-child').before('<p style="padding-top:5px; color:red;">※カテゴリーは子カテゴリーに1つだけ選択してください</p>');
    });
*/

// 固定ページ＋投稿で、クラシックエディターを使用する
add_filter('use_block_editor_for_post_type', 'hide_block_editor', 10, 10);
function hide_block_editor($use_block_editor, $post_type)
{
	if ($post_type === 'post' || $post_type === 'page') return false;
	return $use_block_editor;
}
