// Common
$(window).on('load', function () {
	// .js-modalNavTrg：メインナビゲーションの表示/非表示
	$('.js-modalNavTrg').click(function () {
		$(this).toggleClass('active');
		$('.js-modalNav').fadeToggle(100);
	});
	if ($('.js-matchHeight').length) {
		// .js-matchHeight：高さを揃える
		$('.js-matchHeight').matchHeight();
	}
	// scroller：スムーススクロール
	$(window).scroller({
		pc: 80,//PC追従ヘッダーの高さ
		tb: 60,//タブレッド追従ヘッダーの高さ
		sp: 60//スマホ追従ヘッダーの高さ
	});
	// 読み込み時に画面内に入っていたら要素の順番にアニメーション表示
	$(function () {
		var Position = $(window).height() + $(window).scrollTop();//ウィンドウの高さ + スクロール量 を取得
		$('.js-scroll').each(function (i) {
			if (Position > $(this).offset().top) {
				$(this).delay(60 * i).queue(function () {
					$(this).addClass("on");
				});
			}
		});
	});
	// スクロールして画面内にきたらclass付与
	$(window).scroll(function () {
		var scrollPosition = $(window).height() + $(window).scrollTop();//ウィンドウの高さ + スクロール量 を取得
		$('.js-scroll').each(function () {
			if (scrollPosition - 100 > $(this).offset().top) {
				$(this).addClass("on");
			}
		});
	});
});

// Use [topContent]
if ($('.topContent').length) {
	// .heroSlideのタイトルの句読点を改行に変更
	// $(window).load(function () {
	// 	$('.heroSlide-item-ttl span:contains("、")').each(function () {
	// 		var txt = $(this).text();
	// 		$(this).html(
	// 			txt.replace(/、/g, '<br>')
	// 		);
	// 	});
	// });
	// .js-tabContents-trg
	$('.js-tabContents-trg').click(function () {
		var type = $(this).data('type');
		console.log(type);
		$('.js-tabContents-trg').removeClass('active');
		$(this).addClass('active');
		$('.js-tabContents').hide();
		$('.js-tabContents[data-type="' + type + '"]').fadeIn(100);
	})
	// .heroSlide
	let heroSlide = new Swiper('.heroSlide .swiper-container', {
		slidesPerView: 1,
		loop: true,
		pagination: {
			el: '.heroSlide .swiper-pagination',
			type: 'bullets',
			clickable: true,
		},
		autoplay: {
			delay: 6000,
		},
		breakpoints: {
			768: {
				slidesPerView: 2
			},
		},
	})
	// .rankingSlide
	let rankingSlide = new Swiper('.rankingSlide .swiper-container', {
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		autoplay: {
			delay: 6000,
		},
		spaceBetween: 30,
		breakpoints: {
			768: {
				spaceBetween: 50,
			},
		},
	})
	// .originalSlide
	let originalSlide = new Swiper('.originalSlide .swiper-container', {
		slidesPerView: 1,
		loop: true,
		pagination: {
			el: '.originalSlide .swiper-pagination',
			type: 'bullets',
			clickable: true,
		},
		autoplay: {
			delay: 6000,
		},
		spaceBetween: 30,
		breakpoints: {
			768: {
				slidesPerView: 3
			},
		},
	})
}

// Use [article-sentence]
if ($('.article-sentence').length) {
	// センテンス内の画像にLightbox用のaタグを付与
	$(window).load(function () {
		$('.article-sentence img').each(function () {
			var src = $(this).attr('src');
			$(this).wrap('<a href="' + src + '" data-lightbox="sentence">');
		});
	});
	// h2内にspanを入れる
	$('.article-sentence h2').each(function () {
		var txt = $(this).text();
		$(this).html('<span>' + txt + '</span>');
	});
}