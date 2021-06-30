//スムーズスクロール
(function ($) {
	//プラグイン定義
	$.fn.scroller = function (options) {
		var defaults = {
			pc: 100,
			tb: 100,
			sp: 60
		};
		var setting = $.extend(defaults, options);

		//スムーズスクロール
		$('a[href^=#]').click(function () {
			var w = $(window).width();
			if (w > 1000) {
				var headersize = defaults.pc;
			} else if (w > 767) {
				var headersize = defaults.tb;
			} else {
				var headersize = defaults.sp;
			}

			var href = $(this).attr("href");
			var target = $(href == "#" || href == "" ? 'html' : href);
			var position = target.offset().top - headersize;
			jQuery('body,html').animate({
				scrollTop: position
			}, 800, 'swing');
			return false;
		});

		//ページ間スムーススクロール
		var url = jQuery(location).attr('href');
		if (url.indexOf("#") == -1) {} else {
			var w = $(window).width();
			if (w > 1000) {
				var headersize = defaults.pc;
			} else if (w > 767) {
				var headersize = defaults.tb;
			} else {
				var headersize = defaults.sp;
			}
			var url_sp = url.split("#");
			var hash = '#' + url_sp[url_sp.length - 1];
			var tgt = $(hash);
			var pos = tgt.offset().top - headersize;
			$("html, body").delay(500).animate({
				scrollTop: pos
			}, 600, "swing");
		}
		//メソッドチェーン対応(thisを返す)
		return (this);
	};
})(jQuery);