<head>
    <meta charset="utf-8">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <link rel="stylesheet" href="<?php echo site_url(); ?>/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <script>
        (function(d) {
            var config = {
                    kitId: 'wsy7eha',
                    scriptTimeout: 3000,
                    async: true
                },
                h = d.documentElement,
                t = setTimeout(function() {
                    h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
                }, config.scriptTimeout),
                tk = d.createElement("script"),
                f = false,
                s = d.getElementsByTagName("script")[0],
                a;
            h.className += " wf-loading";
            tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
            tk.async = true;
            tk.onload = tk.onreadystatechange = function() {
                a = this.readyState;
                if (f || a && a != "complete" && a != "loaded") return;
                f = true;
                clearTimeout(t);
                try {
                    Typekit.load(config)
                } catch (e) {}
            };
            s.parentNode.insertBefore(tk, s)
        })(document);
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-7929883-16"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-7929883-16');
    </script>
</head>